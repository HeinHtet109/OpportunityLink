<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\JobCategory\StoreRequest;
use App\Http\Requests\Admin\JobCategory\UpdateRequest;
use App\Repositories\Interf\JobCategoryRepository;

class JobCategoryController extends Controller
{
    private JobCategoryRepository $repository;

    public function __construct(JobCategoryRepository $repository)
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
        $jobCategory = $this->repository->getBySlug($slug);

        $this->repository->update($jobCategory, $request->validated());

        return response()->json(['success' => 'Successfully Updated!']);
    }

    public function destroy($slug)
    {
        try {
            $this->repository->delete($slug);

            return response()->json(['success' => 'Successfully Deleted!']);
        } catch (\Throwable $th) {
            return response()->json(['error' => "This item can't be deleted!"], 422);
        }
    }
}
