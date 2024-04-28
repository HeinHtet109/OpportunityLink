<?php

namespace App\Http\Controllers\Web\Employers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Employer\EmployerProfileRequest;
use App\Repositories\Interf\CityRepository;
use App\Repositories\Interf\UserRepository;
use Illuminate\Http\Request;

class ProfileManagementController extends Controller
{
    private CityRepository $cityRepo;
    private UserRepository $userRepo;

    public function __construct(CityRepository $cityRepo, UserRepository $userRepo)
    {
        $this->cityRepo = $cityRepo;
        $this->userRepo = $userRepo;
    }

    public function index() {
        $cities = $this->cityRepo->getData(['id', 'name'])->get();

        return view('web.employers.profile.index',compact('cities'));
    }

    public function updateProfile(EmployerProfileRequest $request)
    {
        $this->userRepo->Employer_CompanyProfile_Update($request);

        return redirect()->back()->with('status', 'Success');
    }
}
