<?php

namespace App\Repositories\Impls;

use App\Http\Requests\Admin\JobCategory\StoreRequest;
use App\Models\AdminActivity;
use App\Models\JobCategory;
use App\Repositories\Interf\JobCategoryRepository;
use App\Traits\ImageTrait;
use Yajra\DataTables\Facades\DataTables;

class JobCategoryRepositoryImpl implements JobCategoryRepository
{
    use ImageTrait;

    public function getData($fields)
    {
        return JobCategory::select($fields)->latest();
    }

    public function create(StoreRequest $request): JobCategory
    {
        $jobCategory = JobCategory::create($request->validated());
        AdminActivity::create([
            'admin_id' => request()->user()->id,
            'type' => ADD,
            'slug' => $jobCategory->slug,
            'route' => route('admin.job-category.index')
        ]);
        return $jobCategory;
    }

    public function update(JobCategory $jobCategory, $data): JobCategory
    {
        $this->deleteImage($jobCategory->icon, ITEM_DEFAULT_IMG_PATH);
        $jobCategory->update($data);
        AdminActivity::create([
            'admin_id' => request()->user()->id,
            'type' => MODIFY,
            'slug' => $jobCategory->slug,
            'route' => route('admin.job-category.index')
        ]);
        return $jobCategory;
    }

    public function getBySlug($slug)
    {
        return JobCategory::where('slug',$slug)->first();
    }

    public function delete(string $slug): void
    {
        $jobCategory = $this->getBySlug($slug);
        $this->deleteImage($jobCategory->icon, ITEM_DEFAULT_IMG_PATH);
        AdminActivity::create([
            'admin_id' => request()->user()->id,
            'type' => REMOVE,
            'slug' => $jobCategory->slug,
            'route' => route('admin.job-category.index')
        ]);
        $jobCategory->delete();
    }

    public function DataTable()
    {
        if (request()->ajax()) {
            $data = JobCategory::query()->latest();
            return Datatables::eloquent($data)
                ->addIndexColumn()
                ->addColumn('action', function ($query) {
                    $delete_route = route('admin.job-category.destroy', $query->slug);
                    $edit_route = route('admin.job-category.update', $query->slug);
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
                ->editColumn('icon', function($query) {
                    return "<img src='{$query->icon}' width='50px' height='50px' class='rounded-full w-8 h-8'>";
                })
                ->rawColumns(['action', 'icon'])->toJson();
        }

        return view('admins.job-categories.index');
    }
}
