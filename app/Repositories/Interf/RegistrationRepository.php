<?php

namespace App\Repositories\Interf;

use App\Http\Requests\Admin\Registration\StoreRequest;
use App\Models\Admin;

interface RegistrationRepository
{
    public function getData($fields);
    public function create(StoreRequest $request): Admin;
    public function update(Admin $admin, $data): Admin;
    public function getBySlug($slug);
    public function delete(string $slug): void;
    public function DataTable();
    public function Activities_DataTable();
}
