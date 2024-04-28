<?php

namespace App\Repositories\Interf;

use App\Http\Requests\Admin\JobCategory\StoreRequest;
use App\Models\JobCategory;

interface JobCategoryRepository
{
    public function getData($fields);
    public function create(StoreRequest $request): JobCategory;
    public function update(JobCategory $jobCategory, $data): JobCategory;
    public function getBySlug($slug);
    public function delete(string $slug): void;
    public function DataTable();
}
