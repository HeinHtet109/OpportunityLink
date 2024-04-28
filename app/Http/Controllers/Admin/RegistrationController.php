<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Registration\StoreRequest;
use App\Http\Requests\Admin\Registration\UpdateRequest;
use App\Repositories\Interf\RegistrationRepository;

class RegistrationController extends Controller
{
    private RegistrationRepository $repository;

    public function __construct(RegistrationRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        return $this->repository->DataTable();
    }

    public function store(StoreRequest $request)
    {
        $this->repository->create($request);
        return response()->json(['success' => 'Successfully Added!']);
    }

    public function update(UpdateRequest $request, $slug)
    {
        $admin = $this->repository->getBySlug($slug);
        $this->repository->update($admin, $request->validated());

        return response()->json(['success' => 'Successfully Updated!']);
    }

    public function destroy($slug)
    {
        if(!request()->user()->is_SuperAdmin()) {
            abort(404);
        }
        try {
            $this->repository->delete($slug);

            return response()->json(['success' => 'Successfully Deleted!']);
        } catch (\Throwable $th) {
            return response()->json(['error' => "This user can't be deleted!"], 422);
        }
    }

    public function activities()
    {
        if (!request()->user()->is_SuperAdmin()) {
            abort(404);
        }
        return $this->repository->Activities_DataTable();
    }
}
