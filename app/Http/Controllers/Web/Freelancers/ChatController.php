<?php

namespace App\Http\Controllers\Web\Freelancers;

use App\Events\SendMessage;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Freelancer\ChatSendRequest;
use App\Models\User;
use App\Notifications\ChatMessageNotification;
use App\Repositories\Interf\JobManagementRepository;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    private JobManagementRepository $jobManageRepo;

    public function __construct(JobManagementRepository $jobManageRepo)
    {
        $this->jobManageRepo = $jobManageRepo;
    }

    public function index($activeJob_id) {
        $activeJob = $this->jobManageRepo->getActiveJobData(['id','job_id','freelancer_id','employer_id', 'start_at', 'end_at', 'status'])->with(['job:title,id', 'employer:name,id,photo,phone,email'])->where('freelancer_id', request()->user()->id)->firstOrFail();
        // dd($activeJob);
        return view('web.freelancers.chat.index', compact('activeJob'));
    }

    public function SendMessage(ChatSendRequest $request) {
        // dd($request->validated());
        try {
            event(new SendMessage($request->validated()['message'], $request->validated()['receiver_id']));

            User::find($request->validated()['receiver_id'])->notify(new ChatMessageNotification($request->validated()['active_job_id'], EMPLOYER));
        } catch (\Throwable $th) {
            $activity = $this->jobManageRepo->activeJob_Activity_Store(array_merge($request->validated(), ['status' => FAILED]));

            return response()->json(['status' => 'Failed', 'data' => $activity], 422);
        }

        $activity = $this->jobManageRepo->activeJob_Activity_Store($request->validated());

        return response()->json(['status' => 'Success', 'data' => $activity]);
    }
}
