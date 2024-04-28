<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\City\StoreRequest;
use App\Http\Requests\Admin\City\UpdateRequest;
use App\Repositories\Interf\CityRepository;
use App\Repositories\Interf\CountryRepository;

class CityController extends Controller
{
    private CityRepository $repository;
    private CountryRepository $country_repository;

    public function __construct(CityRepository $repository, CountryRepository $country_repository)
    {
        $this->repository = $repository;
        $this->country_repository = $country_repository;
    }

    public function index()
    {
        $countries = $this->country_repository->getData(['id', 'name'])->get();

        return $this->repository->DataTable($countries);
    }

    public function store(StoreRequest $request)
    {
        $this->repository->create($request);
        return response()->json(['success' => 'Successfully Added!']);
    }

    public function update(UpdateRequest $request, $slug)
    {
        $city = $this->repository->getBySlug($slug);

        $this->repository->update($city, $request->validated());

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
