<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FormFieldRequest;
use App\Models\Form;
use App\Models\FormField;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class FormFieldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Form  $form
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(Form $form)
    {
        if (request()->ajax()) {
            $query = FormField::query()
                    ->where('form_id', $form->id);

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
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create(Form $form)
    {
        $field_types = ['text', 'number', 'date', 'textarea', 'select', 'radio', 'checkbox', 'file', 'email', 'password', 'hidden', 'url', 'phone', 'group'];
        return View('admin.forms.fields.create', compact('form', 'field_types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(FormFieldRequest $request, Form $form)
    {
        $form->formFields()->create($request->validated());
        session()->flash('success_message', 'Form Field has been saved successfully.');
        return redirect()->route('admin.forms.form-fields.index', $form);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Form  $form
     * @param  \App\Models\FormField  $formField
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Form $form, FormField $formField)
    {
        return View('admin.forms.fields.show',compact('form', 'formField'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Form  $form
     * @param  \App\Models\FormField  $formField
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Form $form, FormField $formField)
    {
        $field_types = ['text', 'number', 'date', 'textarea', 'select', 'radio', 'checkbox', 'file', 'email', 'password', 'hidden', 'url', 'phone', 'group'];
        return View('admin.forms.fields.edit',compact('form', 'formField', 'field_types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Form  $form
     * @param  \App\Models\FormField  $formField
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(FormFieldRequest $request, Form $form, FormField $formField)
    {
        $formField->update($request->validated());
        session()->flash('success_message', 'Form Field has been updated successfully.');
        return redirect()->route('admin.forms.form-fields.index', $form);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Form  $form
     * @param  \App\Models\FormField  $formField
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Form $form, FormField $formField)
    {
        if($formField->field_status)
            session()->flash('success_message', 'Form Field has been inactive successfully.');
        else
            session()->flash('success_message', 'Form Field has been active successfully.');
        $formField->update(['field_status'=>!$formField->field_status]);
        return redirect()->route('admin.forms.form-fields.index', $form);
    }
}
