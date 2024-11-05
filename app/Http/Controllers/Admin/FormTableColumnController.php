<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FormTableColumnRequest;
use App\Models\Form;
use App\Models\FormTableColumn;
use Illuminate\Http\Response;
use Yajra\DataTables\DataTables;

class FormTableColumnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     */
    public function index(Form $form)
    {
        if (request()->ajax()) {
            $query = FormTableColumn::query()
                ->where('form_id', $form->id);

            return DataTables::of($query)
                ->addIndexColumn()
                ->editColumn('column_status', function (FormTableColumn $formTableColumn) {
                    return '<span class="btn btn-circle btn-sm border-0 active ' . ($formTableColumn->column_status ? 'btn-hover-success' : 'btn-hover-danger') . '">' . ($formTableColumn->column_status ? 'Active' : 'Inactive') . '</span>';
                })
                ->addColumn('action', function(FormTableColumn $formTableColumn) use ($form) {
                    $actionBtn = '';
                    $actionBtn .= '<span onclick="toggleStatus(this); return false;"  data-href="' . route('admin.forms.form-table-columns.destroy', [$form, $formTableColumn]) . '" class="edit btn btn-custom-color text-center btn-circle btn-icon btn-xs">' . ($formTableColumn->column_status ? '<i class="fa fa-toggle-on text-white"></i>' : '<i class="fa fa-toggle-off text-danger"></i>') . '</span>';
                    $actionBtn .= '&nbsp;&nbsp;<a  href="' . route('admin.forms.form-table-columns.edit', [$form, $formTableColumn]) . '" class="edit btn btn-custom-color text-center btn-circle btn-icon btn-xs"><i class="flaticon-edit text-white"></i></a>';
                    $actionBtn .= '&nbsp;&nbsp;<a  href="' . route('admin.forms.form-table-columns.show', [$form, $formTableColumn]) . '" class="edit btn btn-custom-color text-center btn-circle btn-icon btn-xs"><i class="flaticon-eye text-white"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['column_status','action'])
                ->make(true);
        }

        return View('admin.forms.table-columns.index', compact('form'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     */
    public function create(Form $form)
    {
        return View('admin.forms.table-columns.create', compact('form'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param FormTableColumnRequest $request
     * @param Form $form
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(FormTableColumnRequest $request, Form $form)
    {
        $form->formTableColumns()->create($request->validated());
        session()->flash('success_message', 'Form Table Column has been saved successfully.');
        return redirect()->route('admin.forms.form-table-columns.index', $form);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Form  $form
     * @param  \App\Models\FormTableColumn  $formTableColumn
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     */
    public function show(Form $form, FormTableColumn $formTableColumn)
    {
        return View('admin.forms.table-columns.show',compact('form', 'formTableColumn'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Form  $form
     * @param  \App\Models\FormTableColumn  $formTableColumn
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     */
    public function edit(Form $form, FormTableColumn $formTableColumn)
    {
        return View('admin.forms.table-columns.edit',compact('form', 'formTableColumn'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param FormTableColumnRequest $request
     * @param Form $form
     * @param FormTableColumn $formTableColumn
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(FormTableColumnRequest $request, Form $form, FormTableColumn $formTableColumn)
    {
        $formTableColumn->update($request->validated());
        session()->flash('success_message', 'Form Table Column has been updated successfully.');
        return redirect()->route('admin.forms.form-table-columns.index', $form);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Form  $form
     * @param  \App\Models\FormTableColumn  $formTableColumn
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Form $form, FormTableColumn $formTableColumn)
    {
        if($formTableColumn->column_status)
            session()->flash('success_message', 'Form Table Column has been inactive successfully.');
        else
            session()->flash('success_message', 'Form Table Column has been active successfully.');
        $formTableColumn->update(['column_status'=>!$formTableColumn->column_status]);
        return redirect()->route('admin.forms.form-table-columns.index', $form);
    }
}
