<?php

namespace App\Repositories\Interf;

use App\Http\Requests\Web\Employer\EmployerProfileRequest;
use App\Http\Requests\Web\Freelancer\FreelancerProfileRequest;

interface UserRepository
{
    public function Freelancer_DataTable();
    public function Employer_DataTable();
    public function JobManagement_DataTable();
    public function Employer_CompanyProfile_Update(EmployerProfileRequest $request);
    public function Freelancer_ResumeProfile_Update(FreelancerProfileRequest $request);
}
