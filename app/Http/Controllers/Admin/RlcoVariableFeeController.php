<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RlcoVariableFeeRequest;
use App\Models\Rlco;
use App\Models\RlcoVariableFee;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class RlcoVariableFeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Rlco  $rlco
     * @return \Illuminate\Http\Response
     */
    public function index(Rlco $rlco)
    {
        if (request()->ajax()) {
            $query = RlcoVariableFee::query()
                ->where('rlco_id', $rlco->id);

            return DataTables::of($query)
                ->addIndexColumn()
                ->editColumn('status', function (RlcoVariableFee $rlcoVariableFee) {
                    return '<span class="btn btn-circle btn-sm border-0 active ' . ($rlcoVariableFee->status ? 'btn-hover-success' : 'btn-hover-danger') . '">' . ($rlcoVariableFee->status ? 'Active' : 'Inactive') . '</span>';
                })
                ->addColumn('action', function(RlcoVariableFee $rlcoVariableFee) use ($rlco) {
                    $actionBtn = '';
                    $actionBtn .= '<span onclick="toggleStatus(this); return false;"  data-href="' . route('admin.rlcos.rlco-variable-fees.destroy', [$rlco, $rlcoVariableFee]) . '" class="edit btn btn-custom-color text-center btn-circle btn-icon btn-xs">' . ($rlcoVariableFee->status ? '<i class="fa fa-toggle-on text-white"></i>' : '<i class="fa fa-toggle-off text-danger"></i>') . '</span>';
                    $actionBtn .= '&nbsp;&nbsp;<a  href="' . route('admin.rlcos.rlco-variable-fees.edit', [$rlco, $rlcoVariableFee]) . '" class="edit btn btn-custom-color text-center btn-circle btn-icon btn-xs"><i class="flaticon-edit text-white"></i></a>';
                    $actionBtn .= '&nbsp;&nbsp;<a  href="' . route('admin.rlcos.rlco-variable-fees.show', [$rlco, $rlcoVariableFee]) . '" class="edit btn btn-custom-color text-center btn-circle btn-icon btn-xs"><i class="flaticon-eye text-white"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['status','action'])
                ->make(true);
        }

        return View('admin.rlco.rlco-variable-fees.index', compact('rlco'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Models\Rlco  $rlco
     * @return \Illuminate\Http\Response
     */
    public function create(Rlco $rlco)
    {
        return View('admin.rlco.rlco-variable-fees.create', compact('rlco'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rlco  $rlco
     * @return \Illuminate\Http\Response
     */
    public function store(RlcoVariableFeeRequest $request, Rlco $rlco)
    {
        $rlco->rlcoVariableFees()->create($request->validated());
        session()->flash('success_message', 'Rlco variable fee has been saved successfully.');
        return redirect()->route('admin.rlcos.rlco-variable-fees.index', $rlco);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rlco  $rlco
     * @param  \App\Models\RlcoVariableFee  $rlcoVariableFee
     * @return \Illuminate\Http\Response
     */
    public function show(Rlco $rlco, RlcoVariableFee $rlcoVariableFee)
    {
        return View('admin.rlco.rlco-variable-fees.show',compact('rlco', 'rlcoVariableFee'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rlco  $rlco
     * @param  \App\Models\RlcoVariableFee  $rlcoVariableFee
     * @return \Illuminate\Http\Response
     */
    public function edit(Rlco $rlco, RlcoVariableFee $rlcoVariableFee)
    {
        return View('admin.rlco.rlco-variable-fees.edit',compact('rlco', 'rlcoVariableFee'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rlco  $rlco
     * @param  \App\Models\RlcoVariableFee  $rlcoVariableFee
     * @return \Illuminate\Http\Response
     */
    public function update(RlcoVariableFeeRequest $request, Rlco $rlco, RlcoVariableFee $rlcoVariableFee)
    {
        $rlcoVariableFee->update($request->validated());
        session()->flash('success_message', 'Variable fee has been updated successfully.');
        return redirect()->route('admin.rlcos.rlco-variable-fees.index', $rlco);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rlco  $rlco
     * @param  \App\Models\RlcoVariableFee  $rlcoVariableFee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rlco $rlco, RlcoVariableFee $rlcoVariableFee)
    {
        if($rlcoVariableFee->status)
            session()->flash('success_message', 'Variable fee has been inactive successfully.');
        else
            session()->flash('success_message', 'Variable fee has been active successfully.');
        $rlcoVariableFee->update(['status'=>!$rlcoVariableFee->status]);
        return redirect()->route('admin.rlcos.rlco-variable-fees.index', $rlco);
    }
}
