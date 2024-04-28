<?php

namespace App\Http\Controllers\Web\Freelancers;

use App\Http\Controllers\Controller;
use App\Repositories\Interf\JobCategoryRepository;
use App\Repositories\Interf\JobManagementRepository;
use Illuminate\Http\Request;

class ManageJobController extends Controller
{
    private JobCategoryRepository $jobCategoryRepo;
    private JobManagementRepository $jobManageRepo;

    public function __construct(JobCategoryRepository $jobCategoryRepo, JobManagementRepository $jobManageRepo)
    {
        $this->jobCategoryRepo = $jobCategoryRepo;
        $this->jobManageRepo = $jobManageRepo;
    }

    public function appliedJobIndex()
    {
        return $this->jobManageRepo->appliedJob_DataTable();
    }

    public function wishListedJobIndex()
    {
        return $this->jobManageRepo->wishListedJob_DataTable();
    }

    public function activeJobIndex()
    {
        return $this->jobManageRepo->activeJob_DataTable();
    }

    public function activeJobEnd(Request $request)
    {
        $request->validate([
            'activeJob_id' => 'required'
        ]);

        $this->jobManageRepo->activeJob_End($request->activeJob_id);

        return redirect()->back()->with('rating_status', true);
    }

    public function submitRating(Request $request)
    {
        $request->validate([
            'stars' => 'required|numeric|between:1,5'
        ]);

        $this->jobManageRepo->submitRating($request->all());

        return redirect()->route('web.freelancers.managejob.activeJob.index');
    }
}
