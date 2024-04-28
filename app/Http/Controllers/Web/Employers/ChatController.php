<?php

namespace App\Http\Controllers\Web\Employers;

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

    public function index($activeJob_id)
    {
        $activeJob = $this->jobManageRepo->getActiveJobData(['id', 'job_id', 'freelancer_id', 'employer_end', 'freelancer_end', 'employer_id', 'start_at', 'end_at', 'status'])->with(['job:title,id', 'freelancer:name,id,photo,phone,email'])->where('employer_id', request()->user()->id)->firstOrFail();
        // dd($activeJob);
        return view('web.employers.chat.index', compact('activeJob'));
    }

    public function SendMessage(ChatSendRequest $request)
    {
        try {
            event(new SendMessage($request->validated()['message'], $request->validated()['receiver_id']));

            User::find($request->validated()['receiver_id'])->notify(new ChatMessageNotification($request->validated()['active_job_id'], FREELANCER));
        } catch (\Throwable $th) {
            $activity = $this->jobManageRepo->activeJob_Activity_Store(array_merge($request->validated(), ['status' => FAILED]));

            return response()->json(['status' => 'Failed', 'data' => $activity], 422);
        }

        $activity = $this->jobManageRepo->activeJob_Activity_Store($request->validated());

        return response()->json(['status' => 'Success', 'data' => $activity]);
    }
}
