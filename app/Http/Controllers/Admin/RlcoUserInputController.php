<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RlcoVariableFeeRequest;
use App\Http\Requests\StoreRlcoFeeRuleRequest;
use App\Http\Requests\StoreRlcoFeeTypeRequest;
use App\Http\Requests\StoreRlcoUserInputRequest;
use App\Models\Rlco;
use App\Models\RlcoFeeRule;
use App\Models\RlcoFeeType;
use App\Models\RlcoUserInput;
use App\Models\RlcoVariableFee;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class RlcoUserInputController extends Controller
{
    public function index(Rlco $rlco, RlcoFeeType $rlcoFeeType, RlcoFeeRule $rlcoFeeRule)
    {
        if (request()->ajax()) {
            $query = RlcoUserInput::query()
                ->where('rlco_fee_rule_id', $rlcoFeeRule->id);

            return DataTables::of($query)
                ->addIndexColumn()
                ->editColumn('status', function (RlcoUserInput $rlcoUserInput) {
                    return '<span class="btn btn-circle btn-sm border-0 active ' . ($rlcoUserInput->status ? 'btn-hover-success' : 'btn-hover-danger') . '">' . ($rlcoUserInput->status ? 'Active' : 'Inactive') . '</span>';
                })
                ->addColumn('action', function(RlcoUserInput $rlcoUserInput) use ($rlco,$rlcoFeeType,$rlcoFeeRule) {
                    $actionBtn = '';
                    $actionBtn .= '<span onclick="toggleStatus(this); return false;"  data-href="' . route('admin.rlcos.rlco-fee-types.rlco-fee-rules.rlco-user-inputs.destroy', [$rlco, $rlcoFeeType, $rlcoFeeRule,$rlcoUserInput]) . '" class="edit btn btn-custom-color text-center btn-circle btn-icon btn-xs">' . ($rlcoUserInput->status ? '<i class="fa fa-toggle-on text-white"></i>' : '<i class="fa fa-toggle-off text-danger"></i>') . '</span>';
                    $actionBtn .= '&nbsp;&nbsp;<a  href="' . route('admin.rlcos.rlco-fee-types.rlco-fee-rules.rlco-user-inputs.edit', [$rlco, $rlcoFeeType, $rlcoFeeRule,$rlcoUserInput]) . '" class="edit btn btn-custom-color text-center btn-circle btn-icon btn-xs"><i class="flaticon-edit text-white"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['status','action'])
                ->make(true);
        }
        return View('admin.rlco.rlco-fee-types.rlco-fee-rules.rlco-user-inputs.index', compact('rlco','rlcoFeeType','rlcoFeeRule'));
    }

    public function create(Rlco $rlco, RlcoFeeType $rlcoFeeType, RlcoFeeRule $rlcoFeeRule)
    {
        return View('admin.rlco.rlco-fee-types.rlco-fee-rules.rlco-user-inputs.create', compact('rlco','rlcoFeeType','rlcoFeeRule'));
    }

    public function store(StoreRlcoUserInputRequest $request, Rlco $rlco, RlcoFeeType $rlcoFeeType, RlcoFeeRule $rlcoFeeRule)
    {
        $rlcoFeeRule->rlcoUserInputs()->create($request->validated());
        session()->flash('success_message', 'Rlco variable fee inputs has been saved successfully.');
        return redirect()->route('admin.rlcos.rlco-fee-types.rlco-fee-rules.rlco-user-inputs.index', [$rlco,$rlcoFeeType,$rlcoFeeRule]);
    }

    public function edit(Rlco $rlco, RlcoFeeType $rlcoFeeType, RlcoFeeRule $rlcoFeeRule, RlcoUserInput $rlcoUserInput)
    {
        return View('admin.rlco.rlco-fee-types.rlco-fee-rules.rlco-user-inputs.edit',compact('rlco', 'rlcoFeeType', 'rlcoFeeRule','rlcoUserInput'));

    }

    public function update(StoreRlcoUserInputRequest $request, Rlco $rlco, RlcoFeeType $rlcoFeeType, RlcoFeeRule $rlcoFeeRule, RlcoUserInput $rlcoUserInput)
    {
        $rlcoUserInput->update($request->validated());
        session()->flash('success_message', 'Variable fee input has been updated successfully.');
        return redirect()->route('admin.rlcos.rlco-fee-types.rlco-fee-rules.rlco-user-inputs.index', [$rlco,$rlcoFeeType,$rlcoFeeRule]);
    }

    public function destroy(Rlco $rlco, RlcoFeeType $rlcoFeeType, RlcoFeeRule $rlcoFeeRule, RlcoUserInput $rlcoUserInput)
    {
        if($rlcoUserInput->status)
            session()->flash('success_message', 'Variable fee rule has been inactive successfully.');
        else
            session()->flash('success_message', 'Variable fee rule has been active successfully.');
        $rlcoUserInput->update(['status'=>!$rlcoUserInput->status]);
        return redirect()->route('admin.rlcos.rlco-fee-types.rlco-fee-rules.rlco-user-inputs.index', [$rlco,$rlcoFeeType,$rlcoFeeRule]);
    }
}
