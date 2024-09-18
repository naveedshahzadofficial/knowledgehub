<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Models\Admin;
use App\Models\Department;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\DataTables;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $query = Admin::with('roles', 'department');
            return DataTables::of($query)
                ->addIndexColumn()
                ->editColumn('full_name', function (Admin $admin){
                    return implode(' ', array_filter([$admin->first_name, $admin->middle_name, $admin->last_name]));
                })
                ->editColumn('role_names', function (Admin $admin){
                    return implode(', ', $admin->roles->pluck('name')->toArray());
                })
                ->editColumn('department_name', function (Admin $admin){
                    return optional($admin->department)->department_name ?? '';
                })
                ->editColumn('admin_status', function (Admin $admin){
                    return '<span onclick="toggleStatus(this); return false;" data-href="'.route('admin.admins.destroy',$admin).'"   class="btn btn-circle btn-sm border-0 cursor-move active '.($admin->admin_status==1?'btn-hover-success':'btn-hover-danger').'">'.$admin->getAdminStatus().'</span>';
                })
                ->addColumn('action', function(Admin $admin){
                    $actionBtn = '<a href="'.route('admin.admins.show',$admin).'" class="edit btn btn-custom-color text-center btn-circle btn-icon btn-xs"><i class="flaticon-eye text-white"></i></a>';
                    $actionBtn .= '&nbsp;&nbsp;<a href="'.route('admin.admins.edit',$admin).'" class="edit btn btn-custom-color text-center btn-circle btn-icon btn-xs"><i class="flaticon-edit text-white"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['full_name', 'role_names', 'department_name','admin_status','action'])
                ->make(true);
        }
        return View('admin.admins.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::active()->get();
        $roles = Role::get();
        return View('admin.admins.create', compact('departments', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AdminRequest $request
     * @return RedirectResponse
     */
    public function store(AdminRequest $request)
    {
        $admin = Admin::create($request->safe()->except('role_ids'));
        $admin->syncRoles(Role::whereIn('id', $request->input('role_ids'))->pluck('name'));
        session()->flash('success_message', 'Staff has been added successfully.');
        return redirect()->route('admin.admins.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Admin $admin
     * @return Application|Factory|View|Response
     */
    public function show(Admin $admin)
    {
        $admin->load('roles');
        return View('admin.admins.show',compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Admin $admin
     * @return Application|Factory|View|Response
     */
    public function edit(Admin $admin)
    {
        $admin->load('roles');
        $departments = Department::active()->get();
        $roles = Role::get();
        return View('admin.admins.edit',compact('admin', 'departments', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AdminRequest $request
     * @param Admin $admin
     * @return RedirectResponse
     */
    public function update(AdminRequest $request, Admin $admin): RedirectResponse
    {
        $data = $request->safe()->except('role_ids');
        if(!$request->input('password'))
            unset($data['password']);
        $admin->update($data);
        $admin->syncRoles(Role::whereIn('id', $request->input('role_ids'))->pluck('name'));
        session()->flash('success_message', 'Admin has been updated successfully.');
        return redirect()->route('admin.admins.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Admin $admin
     * @return RedirectResponse
     */
    public function destroy(Admin $admin)
    {
        $admin->delete();
        session()->flash('success_message', 'Admin has been deleted successfully.');
        return redirect()->route('admin.admins.index');
    }
}
