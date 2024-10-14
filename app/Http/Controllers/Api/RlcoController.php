<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ActivityResource;
use App\Http\Resources\BusinessCategoryResource;
use App\Http\Resources\DepartmentResource;
use App\Http\Resources\RlcoResource;
use App\Models\Activity;
use App\Models\BusinessActivity;
use App\Models\BusinessCategory;
use App\Models\Department;
use App\Models\Rlco;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RlcoController extends Controller
{
    public function departmentList(){
        $departments = Department::select('id',DB::raw('department_name as text'))->where('department_status', 1)->whereHas('rlcos', function ($q){ $q->where('rlco_status',1);})->orderBy('department_name')->get();
        return response()->json(['departments'=>$departments]);
    }
    public function businessList(){
        $businesses = BusinessCategory::select('id',DB::raw('category_name as text'))->where('category_status', 1)->get();
        return response()->json(['businesses'=>$businesses]);
    }
    public function activityList(){
        $activities = Activity::select('id',DB::raw('activity_name as text'))->where('activity_status', 1)->get();
        return response()->json(['activities'=>$activities]);
    }

    public function searchRlcos(Request $request){

         $department_id = $request->input('department_id');
         $business_category_id = $request->input('business_category_id');
         $activity_id = $request->input('activity_id');

         /* Activities with count of RLCOs */
        $activities = Activity::with(['rlcos'=>function($query) use($department_id, $business_category_id){
            $query->when($department_id, function ($query , $department_id){
                $query->where('department_id', $department_id);
            })->when($business_category_id, function ($query , $business_category_id){
                $query->where('business_category_id', $business_category_id);
            })->where('rlco_status', 1)
                ->with('businessCategory', 'department', 'inspectionDepartment', 'requiredDocuments.requiredDocument', 'faqs', 'foss', 'dependencies.department', 'otherDocuments', 'scopes');
         }])
            ->withCount(['rlcos' => function($query) use($department_id, $business_category_id){
                $query->when($department_id, function ($query , $department_id){
                    $query->where('department_id', $department_id);
                })->when($business_category_id, function ($query , $business_category_id){
                    $query->where('business_category_id', $business_category_id);
                })->where('rlco_status', 1);
            }])
            ->has('rlcos')
            ->when($activity_id, function ($query , $activity_id){
                $query->where('id', $activity_id);
            })
            ->when($business_category_id, function ($query , $business_category_id){
                $query->whereRelation('rlcos', 'business_category_id', $business_category_id);
            })
            ->when($department_id, function ($query , $department_id){
                $query->whereRelation('rlcos', 'department_id', $department_id);
            })
            ->where('activity_status', 1)->get();

        $flattenedRlcos = $activities->pluck('rlcos')->flatten();
        $total_rlcos = $flattenedRlcos->unique('id')->count();


        return response()->json([
            'activities' => ActivityResource::collection($activities),
            'total_rlcos' => $total_rlcos,
        ]);
    }

    public function rlcoDetail(Rlco $rlco){
        $rlco->load('businessCategory','department','inspectionDepartment','requiredDocuments.requiredDocument','faqs','foss','dependencies.department', 'otherDocuments', 'scopes');
        return response()->json(['rlco_detail'=>new RlcoResource($rlco)]);
    }

    public function review(Request $request, Rlco $rlco){
        $rlco->reviews()->create($request->all()+ ['ip_address'=> $request->ip()]);
        return response()->json(['id'=>$rlco->id]);
    }

    public function rlcosList()
    {
        return RlcoResource::collection(Rlco::with('requiredDocuments.requiredDocument')->where('rlco_status',1)->get());
    }

    public function activities()
    {
        $activities = ActivityResource::collection(Activity::active()->orderBy('activity_order')->get());
        $categories = BusinessCategoryResource::collection(BusinessCategory::where('category_status',1)->get());
        $departments = DepartmentResource::collection(Department::active()->get());
        $sectors = BusinessActivity::where('activity_status',1)->get();
        return response()->json(['activities'=>$activities,'categories'=>$categories,'sectors'=>$sectors,'departments'=>$departments]);
    }

    public function activityRlcos($activity_id)
    {
            $rlcos = RlcoResource::collection(Rlco::with('scopes','businessActivities')->active()->whereRelation('activities', 'id', $activity_id)->get());
            return response()->json(['rlcos'=>$rlcos]);
    }
}
