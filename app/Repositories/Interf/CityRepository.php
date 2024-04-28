<?php

namespace App\Repositories\Interf;

use App\Http\Requests\Admin\City\StoreRequest;
use App\Models\City;

interface CityRepository
{
    public function getData($fields);
    public function create(StoreRequest $request): City;
    public function update(City $city,$data): City;
    public function getBySlug($slug);
    public function delete(string $slug): void;
    public function DataTable($countries);
}
