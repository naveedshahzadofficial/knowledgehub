<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\BusinessActivity;
use App\Models\BusinessCategory;
use App\Models\Department;
use App\Models\Rlco;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class RlcoController extends Controller
{

    public function index(): View
    {
        $data = [];
        $data['business_categories'] = BusinessCategory::where('category_status',1)->get();
        $data['departments'] = Department::where('department_status',1)->get();
        return view('admin.rlco.index')->with($data);
    }
    public function indexAjax(Request $request): JsonResponse
    {
        $department_id = isset($request->department_id) && !empty($request->department_id) ?$request->department_id: '';
        $registration_no = isset($request->registration_no) && !empty($request->registration_no) ?$request->registration_no: '';
        $business_category_id = isset($request->business_category_id) && !empty($request->business_category_id) ?$request->business_category_id: '';

        $query = Rlco::select("*")->with('department')
        ->when(auth()->user()->isDepartment(), function ($query) {
            $query->where('department_id', auth()->user()->department_id);
        })->when(auth()->user()->isDepartment() || auth()->user()->isSectoralMapper(), function ($query) {
                $query->where('rlco_status', 1);
            });
        if (!empty($registration_no)) {
            $query->where('rlco_no', 'like' ,"%$registration_no%");
        }
        if (!empty($department_id)) {
            $query->where('department_id', $department_id);
        }
        if (!empty($business_category_id)) {
            $query->where('business_category_id',  $business_category_id);
        }

        return DataTables::of($query)
            ->addIndexColumn()
            ->editColumn('department_name', function (Rlco $rlco){
                return $rlco->department->department_name??'';
            })
            ->editColumn('rlco_status', function (Rlco $rlco){
                if(!auth()->user()->isDepartment() && !auth()->user()->isSectoralMapper())
                    return '<span onclick="toggleStatus(this); return false;" data-href="'.route('admin.rlcos.destroy',$rlco).'"   class="btn btn-circle btn-sm border-0 cursor-move active '.($rlco->rlco_status?'btn-hover-success':'btn-hover-danger').'">'.$rlco->getRlcoStatus().'</span>';
                else
                    return '<span class="btn btn-circle btn-sm border-0 active '.($rlco->rlco_status?'btn-hover-success':'btn-hover-danger').'">'.$rlco->getRlcoStatus().'</span>';
            })->editColumn('created_at', function (Rlco $rlco) {
                return $rlco->created_at ? $rlco->created_at->format('d M, Y') : '-';
            })->addColumn('action', function(Rlco $rlco){
                $actionBtn = '';
                $actionBtn .= '<span onclick="toggleStatus(this); return false;"  data-href="' . route('admin.rlcos.destroy', $rlco) . '" class="edit btn btn-custom-color text-center btn-circle btn-icon btn-xs">' . ($rlco->rlco_status ? '<i class="fa fa-toggle-on text-white"></i>' : '<i class="fa fa-toggle-off text-danger"></i>') . '</span>';
                if(!auth()->user()->isDepartment() && !auth()->user()->isSectoralMapper()) {
                    $actionBtn .= '&nbsp;&nbsp;<a  href="' . route('admin.rlcos.duplicate', $rlco) . '" class="edit btn btn-custom-color text-center btn-circle btn-icon btn-xs" title="Duplicate"><i class="fas fa-clone text-white"></i></a>';
                    $actionBtn .= '&nbsp;&nbsp;<a  href="' . route('admin.rlcos.rlco-fee-types.index', $rlco) . '" class="edit btn btn-custom-color text-center btn-circle btn-icon btn-xs" title="Variable Fee"><i class="fas fa-money-bill text-white"></i></a>';
                }
                if (!$rlco->is_verified) {
                    $actionBtn .= '&nbsp;&nbsp;<a  href="' . route('admin.rlcos.edit', $rlco) . '" class="edit btn btn-custom-color text-center btn-circle btn-icon btn-xs"><i class="flaticon-edit text-white"></i></a>';
                }
                $actionBtn .= '&nbsp;&nbsp;<a target="_blank" href="' . route('admin.rlcos.show', $rlco) . '" class="edit btn btn-custom-color text-center btn-circle btn-icon btn-xs"><i class="flaticon-eye text-white"></i></a>';
                $actionBtn .= '&nbsp;&nbsp;<a  href="' . route('admin.rlcos.account-info.index', $rlco) . '" class="edit btn btn-custom-color text-center btn-circle btn-icon btn-xs" title="Accounts"><i class="fas fa-file-archive text-white"></i></a>';
                $actionBtn .= '&nbsp;&nbsp;<a  href="'.route('admin.rlocs.sectors-mapping',$rlco).'" class="edit btn btn-custom-color text-center btn-circle btn-icon btn-xs" title="Sectors Mapping"><i class="fas fa-building text-white"></i></a>';
                $departmentName = $rlco->department->department_name ?? 'Department';
                if (auth()->user()->isDepartment()) {
                    if (!$rlco->is_verified) {
                        $actionBtn .= '&nbsp;&nbsp;
                            <a href="javascript:void(0);"onclick="verifyRlco(this);" data-id="' . $rlco->id . '"data-dept-name="' . $departmentName . '" class="btn btn-custom-color text-center btn-circle btn-icon btn-xs" data-bs-toggle="tooltip" data-bs-placement="top" title="Verify"> <i class="flaticon2-check-mark text-white"></i> </a>';
                       } else {
                                   $actionBtn .= '&nbsp;&nbsp;
                                     <span class="btn btn-custom-color text-center btn-circle btn-icon btn-xs" data-bs-toggle="tooltip" data-bs-placement="top" title="Verified"> <i class="flaticon2-check-mark text-white"></i> </span>';
                                }
                }
                $actionBtn .= '&nbsp;&nbsp;<a target="_blank" href="' . route('admin.rlcos.form-view', $rlco) . '" class="btn btn-custom-color text-center btn-circle btn-icon btn-xs" title="Form View"><i class="flaticon2-file text-white"></i></a>';

                return $actionBtn;
            })
            ->rawColumns(['rlco_status','action', 'created_at'])
            ->make(true);
    }

    public function verifyRlco(Request $request): JsonResponse
    {
        $rlco = Rlco::find($request->id);
        if (!$rlco) {
            return response()->json(['success' => false, 'message' => 'RLCO not found.'], 404);
        }
        $rlco->is_verified = true;
        $rlco->save();
        return response()->json(['success' => true, 'message' => 'RLCO has been verified successfully.']);
    }
    public function create(): View
    {
        return view('admin.rlco.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Rlco $rlco): View
    {
        $rlco->load('activities','scopes', 'requiredDocuments.requiredDocument', 'keywords','businessActivities','faqs','foss','dependencies.department', 'otherDocuments', 'accountInfo');
        $rlco->accounts = $rlco->accountInfo
            ? $this->loadAccounts($rlco->accountInfo->id)
            : collect();
        return view('admin.rlco.show',compact('rlco'));
    }
    private function loadAccounts($accountInfoId)
    {
        return Account::with('district', 'tehsil', 'departmentStructuralUnit')
            ->where('account_info_id', $accountInfoId)
            ->get();
    }



    public function edit(Rlco $rlco): View
    {
        if ($rlco->is_verified) {
            abort(403, 'You are not allowed to edit a verified RLCO.');
        }
        $rlco->load('activities','scopes', 'requiredDocuments', 'keywords', 'businessActivities');
        return View('admin.rlco.edit',compact('rlco'));
    }

    public function update(Request $request, Rlco $rlco)
    {
        //
    }

    public function destroy(Rlco $rlco)
    {
        if($rlco->rlco_status)
            session()->flash('success_message', 'Rlco has been inactive successfully.');
        else
            session()->flash('success_message', 'Rlco has been active successfully.');
        $rlco->update(['rlco_status'=>!$rlco->rlco_status]);
        return redirect()->route('admin.rlcos.index');
    }

    public function duplicate(Rlco $rlco)
    {
        $newRlco = $rlco->replicate();
        $newRlco->rlco_no = null;
        $newRlco->save();

        $rlco->load('requiredDocuments', 'faqs', 'foss', 'dependencies', 'otherDocuments', 'businessActivities', 'keywords', 'scopes', 'activities');

        // Duplicate requiredDocuments
        foreach ($rlco->requiredDocuments as $requiredDocument) {
            $newRequiredDocument = $requiredDocument->replicate();
            $newRequiredDocument->rlco_id = $newRlco->id;
            $newRequiredDocument->save();
        }

        // Duplicate faqs
        foreach ($rlco->faqs as $faq) {
            $newFaq = $faq->replicate();
            $newFaq->rlco_id = $newRlco->id;
            $newFaq->save();
        }

        // Duplicate foss
        foreach ($rlco->foss as $fos) {
            $newFos = $fos->replicate();
            $newFos->rlco_id = $newRlco->id;
            $newFos->save();
        }

        // Duplicate dependencies
        foreach ($rlco->dependencies as $dependency) {
            $newDependency = $dependency->replicate();
            $newDependency->rlco_id = $newRlco->id;
            $newDependency->save();
        }

        // Duplicate otherDocuments
        foreach ($rlco->otherDocuments as $otherDocument) {
            $newOtherDocument = $otherDocument->replicate();
            $newOtherDocument->rlco_id = $newRlco->id;
            $newOtherDocument->save();
        }

        // Duplicate businessActivities
        foreach ($rlco->businessActivities as $businessActivity) {
            $newRlco->businessActivities()->attach($businessActivity->id);
        }

        // Duplicate keywords
        foreach ($rlco->keywords as $keyword) {
            $newRlco->keywords()->attach($keyword->id);
        }

        // Duplicate scopes
        foreach ($rlco->scopes as $scope) {
            $newRlco->scopes()->attach($scope->id);
        }

        // Duplicate activities
        foreach ($rlco->activities as $activity) {
            $newRlco->activities()->attach($activity->id);
        }

        session()->flash('success_message', 'Rlco has been duplicated successfully.');
        return redirect()->route('admin.rlcos.edit', $newRlco);


    }

    public function sectors_mapping(Rlco $rlco)
    {
        $rlco->load( 'businessActivities');
        $business_activities = BusinessActivity::active()->orderBy('class_name')->get();
        return View('admin.rlco.sectors_mapping',compact('rlco', 'business_activities'));
    }

    public function update_sectors_mapping(Request $request, Rlco $rlco)
    {
        $rlco->businessActivities()->sync($request->input('business_activity_ids', []));
        session()->flash('success_message', 'Sectors has been updated successfully.');
        return redirect()->route('admin.rlcos.index');
    }
    public function form_view(Rlco $rlco)
    {
        $rlco = Rlco::with(['forms' => function ($query) {
            $query->active()->orderBy('form_order')
                ->with(['formFields' => function($query) {
                $query->active()->orderBy('field_order');
            }])->with('formTableRows', 'formTableColumns');
        }])->find($rlco->id);
        return view('admin.rlco.form_view', compact('rlco'));
    }


}
