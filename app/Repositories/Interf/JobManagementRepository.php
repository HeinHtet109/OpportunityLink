<?php

namespace App\Repositories\Interf;

use App\Http\Requests\Web\ApplyJobRequest;
use App\Http\Requests\Web\Employer\PostJobRequest;
use App\Models\JobActivityLog;
use App\Models\JobListing;
use Illuminate\Http\Request;

interface JobManagementRepository
{
    public function getData($fields);
    public function postJob(PostJobRequest $request);
    public function manageJob_DataTable();
    public function application_DataTable($job);
    public function application_Update($data);
    public function getBySlug($slug);
    public function updateJob(JobListing $job, $data): JobListing;
    public function delete(string $slug): void;
    public function applyJob($data);
    public function appliedJob_DataTable();
    public function addToWishList($data);
    public function wishListedJob_DataTable();
    public function activeJob_DataTable();
    public function E_activeJob_DataTable();
    public function getActiveJobData($fields);
    public function activeJob_Activity_Store($data): JobActivityLog;
    public function activeJob_End($activeJob_id);
    public function submitRating($data);
}
