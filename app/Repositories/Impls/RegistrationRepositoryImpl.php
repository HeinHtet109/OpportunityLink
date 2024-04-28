<?php

namespace App\Repositories\Impls;

use App\Http\Requests\Admin\Registration\StoreRequest;
use App\Models\Admin;
use App\Models\AdminActivity;
use App\Repositories\Interf\RegistrationRepository;
use App\Traits\ImageTrait;
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;

class RegistrationRepositoryImpl implements RegistrationRepository
{
    use ImageTrait;

    public function getData($fields)
    {
        return Admin::select($fields)->latest();
    }

    public function create(StoreRequest $request): Admin
    {
        $admin = Admin::create($request->validated());
        AdminActivity::create([
            'admin_id' => request()->user()->id,
            'type' => ADD,
            'slug' => $admin->slug,
            'route' => route('admin.registration.index')
        ]);
        return $admin;
    }

    public function update(Admin $admin, $data): Admin
    {
        foreach ($data as $key => $value) {
            if (is_null($data[$key])) {
                unset($data[$key]);
            }
        }
        if (isset($data['photo'])) {
            $this->deleteImage($admin->photo);
        }
        $admin->update($data);
        AdminActivity::create([
            'admin_id' => request()->user()->id,
            'type' => MODIFY,
            'slug' => $admin->slug,
            'route' => route('admin.registration.index')
        ]);
        return $admin;
    }

    public function getBySlug($slug)
    {
        return Admin::where('slug', $slug)->first();
    }

    public function delete(string $slug): void
    {
        $admin = $this->getBySlug($slug);
        $this->deleteImage($admin->photo);
        AdminActivity::create([
            'admin_id' => request()->user()->id,
            'type' => REMOVE,
            'slug' => $admin->slug,
            'route' => route('admin.registration.index')
        ]);
        $admin->delete();
    }

    public function DataTable()
    {
        if (request()->ajax()) {
            if (request()->user()->is_SuperAdmin()) {
                $data = Admin::query()->latest();
            } else {
                $data = Admin::query()->where('default', false)->latest();
            }
            return Datatables::eloquent($data)
                ->addIndexColumn()
                ->addColumn('action', function ($query) {
                    if (request()->user()->is_SuperAdmin()) {
                        $delete_route = route('admin.registration.destroy', $query->slug);
                        $edit_route = route('admin.registration.update', $query->slug);
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
                    }

                    return null;
                })
                ->editColumn('photo', function ($query) {
                    return "<img src='{$query->photo}' width='50px' height='50px' class='rounded-full w-8 h-8'>";
                })
                ->rawColumns(['action', 'photo'])->toJson();
        }

        return view('admins.registration.index');
    }

    public function Activities_DataTable()
    {
        if (request()->ajax()) {
            $data = AdminActivity::query()->with(['admin:name,id'])->latest();
            return Datatables::eloquent($data)
                ->addIndexColumn()
                ->editColumn('type', function ($query) {
                    if ($query->type == MODIFY) {
                        return "<span class='bg-amber-600 px-3 py-1 rounded-lg text-xs text-white capitalize'>{$query->type}</span>";
                    } else if ($query->type == ADD) {
                        return "<span class='bg-green-600 px-3 py-1 rounded-lg text-xs text-white capitalize'>{$query->type}</span>";
                    } else {
                        return "<span class='bg-red-500 px-3 py-1 rounded-lg text-xs text-white capitalize'>{$query->type}</span>";
                    }
                })
                ->editColumn('route', function ($query) {
                    if ($query->route == route('admin.country.index')) {
                        return "<a href='{$query->route}' class='underline text-primary-700'>Changes on Country page (Name - {$query->slug})</a>";
                    } else if ($query->route == route('admin.city.index')) {
                        return "<a href='{$query->route}' class='underline text-primary-700'>Changes on City page (Name - {$query->slug})</a>";
                    } else if ($query->route == route('admin.faq.index')) {
                        return "<a href='{$query->route}' class='underline text-primary-700'>Changes on Question (Title - {$query->slug})</a>";
                    } else if ($query->route == route('admin.job-category.index')) {
                        return "<a href='{$query->route}' class='underline text-primary-700'>Changes on Job category page (Name - {$query->slug})</a>";
                    } else if ($query->route == route('admin.registration.index')) {
                        return "<a href='{$query->route}' class='underline text-primary-700'>Changes on Registration page (Name - {$query->slug})</a>";
                    }
                })
                ->editColumn('created_at', function ($query) {
                    return Carbon::parse($query->created_at)->format('d M, Y g:i A');
                })
                ->rawColumns(['type', 'route'])
                ->toJson();
        }

        return view('admins.activities.index');
    }
}
