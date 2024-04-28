<?php

namespace App\Repositories\Interf;

use App\Http\Requests\Admin\Faq\StoreRequest;
use App\Models\Faq;

interface FaqRepository
{
    public function getData($fields);
    public function create(StoreRequest $request): Faq;
    public function update(Faq $faq, $data): Faq;
    public function getBySlug($slug);
    public function delete(string $slug): void;
    public function DataTable();
}
