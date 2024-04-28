<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Faq\StoreRequest;
use App\Http\Requests\Admin\Faq\UpdateRequest;
use App\Repositories\Interf\FaqRepository;

class FaqController extends Controller
{
    private FaqRepository $repository;

    public function __construct(FaqRepository $repository)
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
        $faq = $this->repository->getBySlug($slug);

        $this->repository->update($faq, $request->validated());

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
