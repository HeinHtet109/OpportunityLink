<?php

namespace App\Repositories\Interf;

use App\Http\Requests\Admin\Country\StoreRequest;
use App\Models\Country;

interface CountryRepository
{
    public function getData($fields);
    public function create(StoreRequest $request): Country;
    public function getBySlug($slug);
    public function delete(string $slug): void;
    public function DataTable();
}
