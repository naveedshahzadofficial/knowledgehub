<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DepartmentRequest;
use App\Models\Category;
use App\Models\Department;
use App\Models\Province;
use App\Models\Scope;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View('admin.department.index');
    }

    public function indexAjax(Request $request): JsonResponse
    {
        $query = Department::with('parentDepartment', 'category', 'province');

        return DataTables::of($query)
            ->addIndexColumn()
            ->editColumn('department_status', function (Department $department){
                return '<span onclick="toggleStatus(this); return false;" data-href="'.route('admin.departments.destroy',$department).'"   class="btn btn-circle btn-sm border-0 cursor-move active '.($department->department_status==1?'btn-hover-success':'btn-hover-danger').'">'.$department->getDepartmentStatus().'</span>';
            })
            ->addColumn('action', function(Department $department){
                $actionBtn = '<a href="'.route('admin.departments.show',$department).'" class="edit btn btn-custom-color text-center btn-circle btn-icon btn-xs"><i class="flaticon-eye text-white"></i></a>';
                $actionBtn .= '&nbsp;&nbsp;<a href="'.route('admin.departments.edit',$department).'" class="edit btn btn-custom-color text-center btn-circle btn-icon btn-xs"><i class="flaticon-edit text-white"></i></a>';
                return $actionBtn;
            })
            ->rawColumns(['department_status','action'])
            ->make(true);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::active()->whereNull('department_id')->get();
        $categories = Category::active()->get();
        $provinces = Province::active()->get();
        $scopes = Scope::active()->get();
        return View('admin.department.create', compact('departments', 'categories', 'provinces', 'scopes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(DepartmentRequest $request)
    {
        Department::create($request->validated());
        session()->flash('success_message', 'Department has been added successfully.');
        return redirect()->route('admin.departments.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        $department->load('parentDepartment', 'category', 'province');
        return View('admin.department.show',compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        $departments = Department::active()->whereNull('department_id')->get();
        $categories = Category::active()->get();
        $provinces = Province::active()->get();
        $scopes = Scope::active()->get();
        return View('admin.department.edit', compact('departments', 'categories', 'provinces', 'scopes', 'department'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(DepartmentRequest $request, Department $department)
    {
        $department->update($request->validated());
        session()->flash('success_message', 'Department has been updated successfully.');
        return redirect()->route('admin.departments.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Department $department)
    {
        if($department->department_status)
            session()->flash('success_message', 'Department has been inactive successfully.');
        else
            session()->flash('success_message', 'Department has been active successfully.');

        $department->update(['department_status'=>!$department->department_status]);
        return redirect()->route('admin.departments.index');
    }
}
