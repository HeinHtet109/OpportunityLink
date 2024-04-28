<?php

namespace App\Repositories\Impls;

use App\Http\Requests\Admin\Country\StoreRequest;
use App\Models\AdminActivity;
use App\Models\Country;
use App\Repositories\Interf\CountryRepository;
use Yajra\DataTables\Facades\DataTables;

class CountryRepositoryImpl implements CountryRepository
{
    public function getData($fields)
    {
        return Country::select($fields)->latest();
    }

    public function create(StoreRequest $request): Country
    {
        $country = Country::create($request->validated());
        AdminActivity::create([
            'admin_id' => request()->user()->id,
            'type' => ADD,
            'slug' => $country->slug,
            'route' => route('admin.country.index')
        ]);
        return $country;
    }

    public function getBySlug($slug)
    {
        return Country::where('slug',$slug)->first();
    }

    public function delete(string $slug): void
    {
        $country = $this->getBySlug($slug);
        AdminActivity::create([
            'admin_id' => request()->user()->id,
            'type' => REMOVE,
            'slug' => $country->slug,
            'route' => route('admin.country.index')
        ]);
        $country->delete();
    }

    public function DataTable()
    {
        if (request()->ajax()) {
            $data = Country::query()->latest();
            return Datatables::eloquent($data)
                ->addIndexColumn()
                ->addColumn('action', function ($query) {
                    $delete_route = route('admin.country.destroy', $query->slug);
                    $actionBtn = "<button type='button' data-href='{$delete_route}' onclick='openDeleteDrawer(this)' class='inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900 space-x-2'><i class='fa fa-trash'></i> <span class='hidden lg:block'>Delete</span></button>";

                    return $actionBtn;
                })
                ->editColumn('flag', function ($query) {
                    return "<span class='fi fi-{$query->flag}'></span>";
                })
                ->rawColumns(['action', 'flag'])->toJson();
        }

        return view('admins.countries.index');
    }
}
