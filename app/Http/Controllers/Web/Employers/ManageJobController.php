<?php

namespace App\Http\Controllers\Web\Employers;

use App\Http\Controllers\Controller;
use App\Repositories\Interf\JobCategoryRepository;
use App\Repositories\Interf\JobManagementRepository;
use Illuminate\Http\Request;
use App\Http\Requests\Web\Employer\PostJobRequest;

class ManageJobController extends Controller
{
    private JobCategoryRepository $jobCategoryRepo;
    private JobManagementRepository $jobManageRepo;

    public function __construct(JobCategoryRepository $jobCategoryRepo,JobManagementRepository $jobManageRepo)
    {
        $this->jobCategoryRepo = $jobCategoryRepo;
        $this->jobManageRepo = $jobManageRepo;
    }

    public function postJobIndex() {
        $jobCategories = $this->jobCategoryRepo->getData(['name', 'id'])->get();

        return view('web.employers.manage-job.post-job',compact('jobCategories'));
    }

    public function postJob(PostJobRequest $request) {
        if(isset($request->user()->employerProfile) && $request->user()->employerProfile->status == ACTIVE){
            $newJob = $this->jobManageRepo->postJob($request);
        }else{
            return redirect()->back()->withErrors(['status' => "To post a new job, Please update and publish your company profile first!."]);
        }


        return redirect()->route('web.employers.managejob.manage-job.index');
    }

    public function manageJobIndex() {
        return $this->jobManageRepo->manageJob_DataTable();
    }

    public function applicationsIndex($slug) {
        $job = $this->jobManageRepo->getBySlug($slug);

        return $this->jobManageRepo->application_DataTable($job);
    }

    public function applicationsUpdate(Request $request) {
        $request->validate([
            'status' => 'required|in:confirm,reject'
        ]);

        $this->jobManageRepo->application_Update($request->all());

        return redirect()->back()->with('status', 'Successfully Updated');
    }

    public function manageJobUpdate(PostJobRequest $request, $slug) {
        $job = $this->jobManageRepo->getBySlug($slug);

        $this->jobManageRepo->updateJob($job, $request->validated());

        return response()->json(['success' => 'Successfully Updated!']);
    }

    public function manageJobDestroy($slug) {
        try {
            $this->jobManageRepo->delete($slug);

            return response()->json(['success' => 'Successfully Deleted!']);
        } catch (\Throwable $th) {
            return response()->json(['error' => "This item can't be deleted!"], 422);
        }
    }

    public function activeJobIndex()
    {
        return $this->jobManageRepo->E_activeJob_DataTable();
    }

    public function activeJobEnd(Request $request) {
        $request->validate([
            'activeJob_id' => 'required'
        ]);

        $this->jobManageRepo->activeJob_End($request->activeJob_id);

        return redirect()->back()->with('rating_status', true);
    }

    public function submitRating(Request $request) {
        $request->validate([
            'stars' => 'required|numeric|between:1,5'
        ]);

        $this->jobManageRepo->submitRating($request->all());

        return redirect()->route('web.employers.managejob.activeJob.index');
    }
}
