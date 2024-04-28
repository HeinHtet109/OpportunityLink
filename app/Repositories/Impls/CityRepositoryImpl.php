<?php

namespace App\Repositories\Impls;

use App\Http\Requests\Admin\City\StoreRequest;
use App\Models\AdminActivity;
use App\Models\City;
use App\Repositories\Interf\CityRepository;
use Yajra\DataTables\Facades\DataTables;

class CityRepositoryImpl implements CityRepository
{
    public function getData($fields)
    {
        return City::select($fields)->latest();
    }

    public function create(StoreRequest $request): City
    {
        $city = City::create($request->validated());
        AdminActivity::create([
            'admin_id' => request()->user()->id,
            'type' => ADD,
            'slug' => $city->slug,
            'route' => route('admin.city.index')
        ]);
        return $city;
    }

    public function update(City $city, $data): City
    {
        $city->update($data);
        AdminActivity::create([
            'admin_id' => request()->user()->id,
            'type' => MODIFY,
            'slug' => $city->slug,
            'route' => route('admin.city.index')
        ]);
        return $city;
    }

    public function getBySlug($slug)
    {
        return City::where('slug',$slug)->first();
    }

    public function delete(string $slug): void
    {
        $city = $this->getBySlug($slug);
        AdminActivity::create([
            'admin_id' => request()->user()->id,
            'type' => REMOVE,
            'slug' => $city->slug,
            'route' => route('admin.city.index')
        ]);
        $city->delete();
    }

    public function DataTable($countries)
    {
        if (request()->ajax()) {
            $data = City::query()->with('country:name,flag,id')->latest();
            return Datatables::eloquent($data)
                ->addIndexColumn()
                ->addColumn('action', function ($query) {
                    $delete_route = route('admin.city.destroy', $query->slug);
                    $edit_route = route('admin.city.update',$query->slug);
                    $params = $query;
                    $actionBtn = "<div class='flex items-center space-x-2'>";
                    $actionBtn .="<button type='button' onclick='openUpdateDrawer(this)' data-href='{$edit_route}' data-query='{$params}'
                                        class='inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 space-x-2'>
                                        <i class='fa fa-edit'></i>
                                        <span class='hidden lg:block'>Update</span>
                                    </button>";
                    $actionBtn .= "<button type='button' data-href='{$delete_route}' onclick='openDeleteDrawer(this)' class='inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900 space-x-2'><i class='fa fa-trash'></i> <span class='hidden lg:block'>Delete</span></button>";
                    $actionBtn .= "</div>";
                    return $actionBtn;
                })
                ->editColumn('country.name', function ($query) {
                    return "<span class='fi fi-{$query->country->flag} mr-2'></span>" . $query->country->name;
                })
                ->rawColumns(['action', 'country.name'])->toJson();
        }

        return view('admins.cities.index',compact('countries'));
    }
}
