<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Interf\UserRepository;

class UserController extends Controller
{
    private UserRepository $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function freelancers() {
        return $this->repository->Freelancer_DataTable();
    }

    public function employers() {
        return $this->repository->Employer_DataTable();
    }
}
