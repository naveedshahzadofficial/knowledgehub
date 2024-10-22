<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Form;
use App\Models\FormField;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class FormFieldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(Form $form)
    {
        if (request()->ajax()) {
            $query = FormField::query();
            return DataTables::of($query)
                ->addIndexColumn()
                ->editColumn('field_status', function (FormField $formField) {
                    return '<span class="btn btn-circle btn-sm border-0 active ' . ($formField->field_status ? 'btn-hover-success' : 'btn-hover-danger') . '">' . ($formField->field_status ? 'Active' : 'Inactive') . '</span>';
                })
                ->editColumn('is_required', function (FormField $formField) {
                    return '<span class="btn btn-circle btn-sm border-0 active ' . ($formField->is_required ? 'btn-hover-success' : 'btn-hover-danger') . '">' . ($formField->is_required ? 'Yes' : 'No') . '</span>';
                })
                ->addColumn('action', function(FormField $formField) use ($form) {
                    $actionBtn = '';
                    $actionBtn .= '<span onclick="toggleStatus(this); return false;"  data-href="' . route('admin.forms.form-fields.destroy', [$form, $formField]) . '" class="edit btn btn-custom-color text-center btn-circle btn-icon btn-xs">' . ($formField->field_status ? '<i class="fa fa-toggle-on text-white"></i>' : '<i class="fa fa-toggle-off text-danger"></i>') . '</span>';
                    $actionBtn .= '&nbsp;&nbsp;<a  href="' . route('admin.forms.form-fields.edit', [$form, $formField]) . '" class="edit btn btn-custom-color text-center btn-circle btn-icon btn-xs"><i class="flaticon-edit text-white"></i></a>';
                    $actionBtn .= '&nbsp;&nbsp;<a  href="' . route('admin.forms.form-fields.show', [$form, $formField]) . '" class="edit btn btn-custom-color text-center btn-circle btn-icon btn-xs"><i class="flaticon-eye text-white"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['is_required', 'field_status','action'])
                ->make(true);
        }

        return View('admin.forms.fields.index', compact('form'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function create(Form $form)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Form $form)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Form  $form
     * @param  \App\Models\FormField  $formField
     * @return \Illuminate\Http\Response
     */
    public function show(Form $form, FormField $formField)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Form  $form
     * @param  \App\Models\FormField  $formField
     * @return \Illuminate\Http\Response
     */
    public function edit(Form $form, FormField $formField)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Form  $form
     * @param  \App\Models\FormField  $formField
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Form $form, FormField $formField)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Form  $form
     * @param  \App\Models\FormField  $formField
     * @return \Illuminate\Http\Response
     */
    public function destroy(Form $form, FormField $formField)
    {
        //
    }
}
