<?php

namespace App\Repositories\Impls;

use App\Http\Requests\Web\Employer\EmployerProfileRequest;
use App\Http\Requests\Web\Freelancer\FreelancerProfileRequest;
use App\Models\EmployerProfile;
use App\Models\FreelancerProfile;
use App\Models\JobListing;
use App\Models\User;
use App\Repositories\Interf\UserRepository;
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;

class UserRepositoryImpl implements UserRepository
{
    public function Freelancer_DataTable()
    {
        if (request()->ajax()) {
            $data = User::query()->where('role', FREELANCER)->latest();
            return Datatables::eloquent($data)
                ->addIndexColumn()
                ->editColumn('photo', function ($query) {
                    return "<img src='{$query->photo}' width='50px' height='50px' class='rounded-full w-8 h-8'>";
                })
                ->rawColumns(['photo'])->toJson();
        }

        return view('admins.users.freelancer-index');
    }

    public function Employer_DataTable()
    {
        if (request()->ajax()) {
            $data = User::query()->where('role', EMPLOYER)->latest();
            return Datatables::eloquent($data)
                ->addIndexColumn()
                ->editColumn('photo', function ($query) {
                    return "<img src='{$query->photo}' width='50px' height='50px' class='rounded-full w-8 h-8'>";
                })
                ->rawColumns(['photo'])->toJson();
        }

        return view('admins.users.employer-index');
    }

    public function JobManagement_DataTable()
    {
        if (request()->ajax()) {
            $data = JobListing::query()->with(['jobCategory', 'employer', 'applicants'])->latest();
            return Datatables::eloquent($data)
                ->addColumn('applicant_count', function ($query) {
                    return $query->applicants->count();
                })
                ->addColumn('jobCategory', function ($query) {
                    return $query->jobCategory->name;
                })
                ->addColumn('employer_info', function ($query) {
                    return "<div class='flex items-center space-x-2'><img src='{$query->employer->photo}' class='w-8 h-8 rounded-full'/> <span class='font-mediumn'>{$query->employer->name}</span></div>";
                })
                ->editColumn('created_at', function ($query) {
                    return Carbon::parse($query->created_at)->format('d,M Y g:i A');
                })
                ->editColumn('status', function ($query) {
                    if ($query->status == EXPIRED) {
                        return "<span class='bg-red-500 px-3 py-1 rounded-lg text-xs text-white capitalize'>{$query->status}</span>";
                    } else {
                        return "<span class='bg-green-600 px-3 py-1 rounded-lg text-xs text-white capitalize'>{$query->status}</span>";
                    }
                })
                ->addIndexColumn()
                ->rawColumns(['employer_info', 'status'])
                ->toJson();
        }

        return view('admins.jobs.index');
    }

    public function Employer_CompanyProfile_Update(EmployerProfileRequest $request)
    {
        $profile = EmployerProfile::updateOrCreate(['user_id' => $request->user()->id], $request->validated());

        return $profile;
    }

    public function Freelancer_ResumeProfile_Update(FreelancerProfileRequest $request) {
        $profile = FreelancerProfile::updateOrCreate(['user_id' => $request->user()->id], $request->validated());

        return $profile;
    }
}
