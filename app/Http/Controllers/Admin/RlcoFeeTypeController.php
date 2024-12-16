<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RlcoVariableFeeRequest;
use App\Http\Requests\StoreRlcoFeeTypeRequest;
use App\Models\Rlco;
use App\Models\RlcoFeeType;
use App\Models\RlcoVariableFee;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class RlcoFeeTypeController extends Controller
{
    public function index(Rlco $rlco)
    {
        if (request()->ajax()) {
            $query = RlcoFeeType::query()
                ->where('rlco_id', $rlco->id);

            return DataTables::of($query)
                ->addIndexColumn()
                ->editColumn('status', function (RlcoFeeType $rlcoFeeType) {
                    return '<span class="btn btn-circle btn-sm border-0 active ' . ($rlcoFeeType->status ? 'btn-hover-success' : 'btn-hover-danger') . '">' . ($rlcoFeeType->status ? 'Active' : 'Inactive') . '</span>';
                })
                ->editColumn('applicable_to', function (RlcoFeeType $rlcoFeeType) {
                    return '<span class="btn btn-circle btn-sm border-0 active ' . ($rlcoFeeType->applicable_to ==1 ? 'btn-hover-success' : ($rlcoFeeType->applicable_to ==2?'btn-hover-warning':'btn-hover-danger')) . '">' . ($rlcoFeeType->applicable_to==1 ? 'First Fee' : ($rlcoFeeType->applicable_to==2?'Further Fee':'Both Fees')) . '</span>';
                })
                ->addColumn('action', function(RlcoFeeType $rlcoFeeType) use ($rlco) {
                    $actionBtn = '';
                    $actionBtn .= '<span onclick="toggleStatus(this); return false;"  data-href="' . route('admin.rlcos.rlco-fee-types.destroy', [$rlco, $rlcoFeeType]) . '" class="edit btn btn-custom-color text-center btn-circle btn-icon btn-xs">' . ($rlcoFeeType->status ? '<i class="fa fa-toggle-on text-white"></i>' : '<i class="fa fa-toggle-off text-danger"></i>') . '</span>';
                    $actionBtn .= '&nbsp;&nbsp;<a  href="' . route('admin.rlcos.rlco-fee-types.edit', [$rlco, $rlcoFeeType]) . '" class="edit btn btn-custom-color text-center btn-circle btn-icon btn-xs"><i class="flaticon-edit text-white"></i></a>';
                    $actionBtn .= '&nbsp;&nbsp;<a  href="' . route('admin.rlcos.rlco-fee-types.rlco-fee-rules.index', [$rlco, $rlcoFeeType]) . '" class="btn btn-custom-color text-center btn-circle btn-icon btn-xs"><i class="flaticon-list text-white"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['status','applicable_to','action'])
                ->make(true);
        }
        return View('admin.rlco.rlco-fee-types.index', compact('rlco'));
    }

    public function create(Rlco $rlco)
    {
        return View('admin.rlco.rlco-fee-types.create', compact('rlco'));
    }

    public function store(StoreRlcoFeeTypeRequest $request, Rlco $rlco)
    {
        $rlco->rlcoFeeTypes()->create($request->validated());
        session()->flash('success_message', 'Rlco variable fee type has been saved successfully.');
        return redirect()->route('admin.rlcos.rlco-fee-types.index', $rlco);
    }

    public function edit(Rlco $rlco, RlcoFeeType $rlcoFeeType)
    {
        return View('admin.rlco.rlco-fee-types.edit',compact('rlco', 'rlcoFeeType'));

    }

    public function update(StoreRlcoFeeTypeRequest $request, Rlco $rlco, RlcoFeeType $rlcoFeeType)
    {
        $rlcoFeeType->update($request->validated());
        session()->flash('success_message', 'Variable fee type has been updated successfully.');
        return redirect()->route('admin.rlcos.rlco-fee-types.index', $rlco);
    }

    public function destroy(Rlco $rlco, RlcoFeeType $rlcoFeeType)
    {
        if($rlcoFeeType->status)
            session()->flash('success_message', 'Variable fee type has been inactive successfully.');
        else
            session()->flash('success_message', 'Variable fee type has been active successfully.');
        $rlcoFeeType->update(['status'=>!$rlcoFeeType->status]);
        return redirect()->route('admin.rlcos.rlco-fee-types.index', $rlco);
    }
}
