<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RlcoVariableFeeRequest;
use App\Http\Requests\StoreRlcoFeeRuleRequest;
use App\Http\Requests\StoreRlcoFeeTypeRequest;
use App\Models\Rlco;
use App\Models\RlcoFeeRule;
use App\Models\RlcoFeeType;
use App\Models\RlcoVariableFee;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class RlcoFeeRuleController extends Controller
{
    public function index(Rlco $rlco, RlcoFeeType $rlcoFeeType)
    {
        if (request()->ajax()) {
            $query = RlcoFeeRule::query()
                ->where('rlco_fee_type_id', $rlcoFeeType->id);

            return DataTables::of($query)
                ->addIndexColumn()
                ->editColumn('status', function (RlcoFeeRule $rlcoFeeRule) {
                    return '<span class="btn btn-circle btn-sm border-0 active ' . ($rlcoFeeRule->status ? 'btn-hover-success' : 'btn-hover-danger') . '">' . ($rlcoFeeRule->status ? 'Active' : 'Inactive') . '</span>';
                })
                ->addColumn('action', function(RlcoFeeRule $rlcoFeeRule) use ($rlco,$rlcoFeeType) {
                    $actionBtn = '';
                    $actionBtn .= '<span onclick="toggleStatus(this); return false;"  data-href="' . route('admin.rlcos.rlco-fee-types.rlco-fee-rules.destroy', [$rlco, $rlcoFeeType, $rlcoFeeRule]) . '" class="edit btn btn-custom-color text-center btn-circle btn-icon btn-xs">' . ($rlcoFeeRule->status ? '<i class="fa fa-toggle-on text-white"></i>' : '<i class="fa fa-toggle-off text-danger"></i>') . '</span>';
                    $actionBtn .= '&nbsp;&nbsp;<a  href="' . route('admin.rlcos.rlco-fee-types.rlco-fee-rules.edit', [$rlco, $rlcoFeeType, $rlcoFeeRule]) . '" class="edit btn btn-custom-color text-center btn-circle btn-icon btn-xs"><i class="flaticon-edit text-white"></i></a>';
                    $actionBtn .= '&nbsp;&nbsp;<a  href="' . route("admin.rlcos.rlco-fee-types.rlco-fee-rules.rlco-user-inputs.index", [$rlco,$rlcoFeeType,$rlcoFeeRule]) . '" class="edit btn btn-custom-color text-center btn-circle btn-icon btn-xs"><i class="flaticon-list text-white"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['status','action'])
                ->make(true);
        }
        return View('admin.rlco.rlco-fee-types.rlco-fee-rules.index', compact('rlco','rlcoFeeType'));
    }

    public function create(Rlco $rlco, RlcoFeeType $rlcoFeeType)
    {
        return View('admin.rlco.rlco-fee-types.rlco-fee-rules.create', compact('rlco','rlcoFeeType'));
    }

    public function store(StoreRlcoFeeRuleRequest $request, Rlco $rlco, RlcoFeeType $rlcoFeeType)
    {
        $rlcoFeeType->rlcoFeeRules()->create($request->validated());
        session()->flash('success_message', 'Rlco variable fee rule has been saved successfully.');
        return redirect()->route('admin.rlcos.rlco-fee-types.rlco-fee-rules.index', [$rlco,$rlcoFeeType]);
    }

    public function edit(Rlco $rlco, RlcoFeeType $rlcoFeeType, RlcoFeeRule $rlcoFeeRule)
    {
        return View('admin.rlco.rlco-fee-types.rlco-fee-rules.edit',compact('rlco', 'rlcoFeeType', 'rlcoFeeRule'));

    }

    public function update(StoreRlcoFeeRuleRequest $request, Rlco $rlco, RlcoFeeType $rlcoFeeType, RlcoFeeRule $rlcoFeeRule)
    {
        $rlcoFeeRule->update($request->validated());
        session()->flash('success_message', 'Variable fee type has been updated successfully.');
        return redirect()->route('admin.rlcos.rlco-fee-types.rlco-fee-rules.index', [$rlco,$rlcoFeeType]);
    }

    public function destroy(Rlco $rlco, RlcoFeeType $rlcoFeeType, RlcoFeeRule $rlcoFeeRule)
    {
        if($rlcoFeeRule->status)
            session()->flash('success_message', 'Variable fee rule has been inactive successfully.');
        else
            session()->flash('success_message', 'Variable fee rule has been active successfully.');
        $rlcoFeeRule->update(['status'=>!$rlcoFeeRule->status]);
        return redirect()->route('admin.rlcos.rlco-fee-types.rlco-fee-rules.index', [$rlco,$rlcoFeeType]);
    }
}
