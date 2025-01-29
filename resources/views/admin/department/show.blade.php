@extends('_layouts.admin.app')
@push('title','Show Department')
@section('content')
    <div class="row">
        <div class="col-lg-12">

            <div class="card card-custom ">
                <div class="card-header flex-wrap py-3">
                    <div class="card-title">
                        <h3 class="card-label">{{ $department->department_name  }}</h3>
                    </div>
                    <div class="card-toolbar">
                        <span class="btn btn-circle btn-sm border-0 cursor-move active {{ $department->department_status=='1'?'btn-hover-success':'btn-hover-danger' }} ">
                            {{ $department->getDepartmentStatus()  }}
                        </span>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                @component('_components.alerts-default')@endcomponent

                    <div class="row">
                        <div class="col-lg-6">
                            <strong>Department Display Name:</strong>
                            <label class="bmd-label-floating">{{ $department->department_display_name?? '-' }}</label><br>
                        </div>
                        <div class="col-lg-6">
                            <strong>Scope:</strong>
                            <label class="bmd-label-floating">{{ $department->department_scope?? '-' }}</label><br>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <strong>Parent Department:</strong>
                            <label class="bmd-label-floating">{{ optional($department->parentDepartment)->department_name?? '-' }}</label><br>
                        </div>
                        <div class="col-lg-6">
                            <strong>Province:</strong>
                            <label class="bmd-label-floating">{{ optional($department->province)->province_name?? '-' }}</label><br>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <strong>Category:</strong>
                            <label class="bmd-label-floating">{{ optional($department->category)->category_name?? '-' }}</label><br>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <strong>Remarks:</strong>
                            <label class="bmd-label-floating">{{ $department->department_remark??'-' }}</label><br>
                        </div>
                    </div>

            </div>

        </div>
    </div>
@endsection
