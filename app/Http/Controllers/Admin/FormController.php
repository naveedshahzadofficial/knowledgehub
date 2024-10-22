<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FormRequest;
use App\Models\Form;
use App\Models\Rlco;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\DataTables\DataTables;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = Form::query();
            return DataTables::of($query)
                ->addIndexColumn()
                ->editColumn('form_status', function (Form $form) {
                    return '<span class="btn btn-circle btn-sm border-0 active ' . ($form->form_status ? 'btn-hover-success' : 'btn-hover-danger') . '">' . ($form->form_status ? 'Active' : 'Inactive') . '</span>';
                })
                ->addColumn('action', function(Form $form){
                    $actionBtn = '';
                    $actionBtn .= '<span onclick="toggleStatus(this); return false;"  data-href="' . route('admin.forms.destroy', $form) . '" class="edit btn btn-custom-color text-center btn-circle btn-icon btn-xs">' . ($form->form_status ? '<i class="fa fa-toggle-on text-white"></i>' : '<i class="fa fa-toggle-off text-danger"></i>') . '</span>';
                    $actionBtn .= '&nbsp;&nbsp;<a  href="' . route('admin.forms.edit', $form) . '" class="edit btn btn-custom-color text-center btn-circle btn-icon btn-xs"><i class="flaticon-edit text-white"></i></a>';
                    $actionBtn .= '&nbsp;&nbsp;<a  href="' . route('admin.forms.form-fields.index', $form) . '" class="edit btn btn-custom-color text-center btn-circle btn-icon btn-xs" title="Form Fields"><i class="flaticon-notes text-white"></i></a>';
                    $actionBtn .= '&nbsp;&nbsp;<a  href="' . route('admin.forms.show', $form) . '" class="edit btn btn-custom-color text-center btn-circle btn-icon btn-xs"><i class="flaticon-eye text-white"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['form_status','action'])
                ->make(true);
        }
        return View('admin.forms.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        $rlcos = Rlco::active()->get();
        return View('admin.forms.create', compact('rlcos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param FormRequest $request
     * @return RedirectResponse
     */
    public function store(FormRequest $request)
    {
        $form = Form::create($request->safe()->except('rlco_ids'));
        $form->rlcos()->sync($request->input('rlco_ids'));
        session()->flash('success_message', 'Forms has been saved successfully.');
        return redirect()->route('admin.forms.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Form $form
     * @return Application|Factory|View|Response
     */
    public function show(Form $form)
    {
        $form->load('rlcos');
        return View('admin.forms.show',compact('form'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Form $form
     * @return Application|Factory|View
     */
    public function edit(Form $form)
    {
        $form->load('rlcos');
        $rlcos = Rlco::active()->get();
        return View('admin.forms.edit',compact('form', 'rlcos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Form $form
     * @return RedirectResponse
     */
    public function update(FormRequest $request, Form $form)
    {
        $form->update($request->safe()->except('rlco_ids'));
        $form->rlcos()->sync($request->input('rlco_ids'));
        session()->flash('success_message', 'Form has been updated successfully.');
        return redirect()->route('admin.forms.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Form $form
     * @return Response
     */
    public function destroy(Form $form)
    {
        if($form->form_status)
            session()->flash('success_message', 'Form has been inactive successfully.');
        else
            session()->flash('success_message', 'Form has been active successfully.');
        $form->update(['form_status'=>!$form->form_status]);
        return redirect()->route('admin.forms.index');
    }
}
