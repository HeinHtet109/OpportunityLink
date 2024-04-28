<?php

namespace App\Repositories\Impls;

use App\Http\Requests\Admin\Faq\StoreRequest;
use App\Models\AdminActivity;
use App\Models\Faq;
use App\Repositories\Interf\FaqRepository;
use Yajra\DataTables\Facades\DataTables;

class FaqRepositoryImpl implements FaqRepository
{
    public function getData($fields)
    {
        return Faq::select($fields)->latest();
    }

    public function create(StoreRequest $request): Faq
    {
        $faq = Faq::create($request->validated());
        AdminActivity::create([
            'admin_id' => request()->user()->id,
            'type' => ADD,
            'slug' => $faq->slug,
            'route' => route('admin.faq.index')
        ]);
        return $faq;
    }

    public function update(Faq $faq, $data): Faq
    {
        $faq->update($data);
        AdminActivity::create([
            'admin_id' => request()->user()->id,
            'type' => MODIFY,
            'slug' => $faq->slug,
            'route' => route('admin.faq.index')
        ]);
        return $faq;
    }

    public function getBySlug($slug)
    {
        return Faq::where('slug',$slug)->first();
    }

    public function delete(string $slug): void
    {
        $faq = $this->getBySlug($slug);
        AdminActivity::create([
            'admin_id' => request()->user()->id,
            'type' => REMOVE,
            'slug' => $faq->slug,
            'route' => route('admin.faq.index')
        ]);
        $faq->delete();
    }

    public function DataTable()
    {
        if (request()->ajax()) {
            $data = Faq::query()->latest();
            return Datatables::eloquent($data)
                ->addIndexColumn()
                ->addColumn('action', function ($query) {
                    $delete_route = route('admin.faq.destroy', $query->slug);
                    $edit_route = route('admin.faq.update', $query->slug);
                    $params = $query;
                    $actionBtn = "<div class='flex items-center space-x-2'>";
                    $actionBtn .= "<button type='button' onclick='openUpdateDrawer(this)' data-href='{$edit_route}' data-query='{$params}'
                                        class='inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 space-x-2'>
                                        <i class='fa fa-edit'></i>
                                        <span class='hidden lg:block'>Update</span>
                                    </button>";
                    $actionBtn .= "<button type='button' data-href='{$delete_route}' onclick='openDeleteDrawer(this)' class='inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900 space-x-2'><i class='fa fa-trash'></i> <span class='hidden lg:block'>Delete</span></button>";
                    $actionBtn .= "</div>";
                    return $actionBtn;
                })
                ->rawColumns(['action'])->toJson();
        }

        return view('admins.faqs.index');
    }
}
