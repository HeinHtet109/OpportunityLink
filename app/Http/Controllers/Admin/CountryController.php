<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CountryDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Country\StoreRequest;
use App\Repositories\Interf\CountryRepository;

class CountryController extends Controller
{
    private CountryRepository $repository;

    public function __construct(CountryRepository $repository)
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
        return response()->json(['success' => 'Successfully Created!']);
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
