<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FormTableRowRequest;
use App\Models\Form;
use App\Models\FormTableRow;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\DataTables\DataTables;

class FormTableRowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function index(Form $form)
    {
        if (request()->ajax()) {
            $query = FormTableRow::query()
                ->where('form_id', $form->id);

            return DataTables::of($query)
                ->addIndexColumn()
                ->editColumn('row_status', function (FormTableRow $formTableRow) {
                    return '<span class="btn btn-circle btn-sm border-0 active ' . ($formTableRow->row_status ? 'btn-hover-success' : 'btn-hover-danger') . '">' . ($formTableRow->row_status ? 'Active' : 'Inactive') . '</span>';
                })
                ->addColumn('action', function(FormTableRow $formTableRow) use ($form) {
                    $actionBtn = '';
                    $actionBtn .= '<span onclick="toggleStatus(this); return false;"  data-href="' . route('admin.forms.form-table-rows.destroy', [$form, $formTableRow]) . '" class="edit btn btn-custom-color text-center btn-circle btn-icon btn-xs">' . ($formTableRow->row_status ? '<i class="fa fa-toggle-on text-white"></i>' : '<i class="fa fa-toggle-off text-danger"></i>') . '</span>';
                    $actionBtn .= '&nbsp;&nbsp;<a  href="' . route('admin.forms.form-table-rows.edit', [$form, $formTableRow]) . '" class="edit btn btn-custom-color text-center btn-circle btn-icon btn-xs"><i class="flaticon-edit text-white"></i></a>';
                    $actionBtn .= '&nbsp;&nbsp;<a  href="' . route('admin.forms.form-table-rows.show', [$form, $formTableRow]) . '" class="edit btn btn-custom-color text-center btn-circle btn-icon btn-xs"><i class="flaticon-eye text-white"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['row_status','action'])
                ->make(true);
        }

        return View('admin.forms.table-rows.index', compact('form'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function create(Form $form)
    {
        return View('admin.forms.table-rows.create', compact('form'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param FormTableRowRequest $request
     * @param Form $form
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(FormTableRowRequest $request, Form $form)
    {
        $form->formTableRows()->create($request->validated());
        session()->flash('success_message', 'Form Table Row has been saved successfully.');
        return redirect()->route('admin.forms.form-table-rows.index', $form);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Form  $form
     * @param  \App\Models\FormTableRow  $formTableRow
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     */
    public function show(Form $form, FormTableRow $formTableRow)
    {
        return View('admin.forms.table-rows.show',compact('form', 'formTableRow'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Form  $form
     * @param  \App\Models\FormTableRow  $formTableRow
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     */
    public function edit(Form $form, FormTableRow $formTableRow)
    {
        return View('admin.forms.table-rows.edit',compact('form', 'formTableRow'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param FormTableRowRequest $request
     * @param Form $form
     * @param FormTableRow $formTableRow
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(FormTableRowRequest $request, Form $form, FormTableRow $formTableRow)
    {
        $formTableRow->update($request->validated());
        session()->flash('success_message', 'Form Table Row has been updated successfully.');
        return redirect()->route('admin.forms.form-table-rows.index', $form);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Form  $form
     * @param  \App\Models\FormTableRow  $formTableRow
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Form $form, FormTableRow $formTableRow)
    {
        if($formTableRow->row_status)
            session()->flash('success_message', 'Form Table Row has been inactive successfully.');
        else
            session()->flash('success_message', 'Form Table Row has been active successfully.');
        $formTableRow->update(['row_status'=>!$formTableRow->row_status]);
        return redirect()->route('admin.forms.form-table-rows.index', $form);
    }
}
