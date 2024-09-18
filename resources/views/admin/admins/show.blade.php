@extends('_layouts.admin.app')
@push('title','Admin View')
@section('content')
    <div class="row">
        <div class="col-lg-12">

            <div class="card card-custom ">
                <div class="card-header flex-wrap py-3">
                    <div class="card-title">
                        <h3 class="card-label">{{ implode(' ', array_filter([$admin->first_name, $admin->middle_name, $admin->last_name]))  }}</h3>
                    </div>
                    <div class="card-toolbar">
                        <span class="btn btn-circle btn-sm border-0 cursor-move active btn-hover-success ">
                            {{ implode(', ', $admin->roles->pluck('name')->toArray())  }}
                        </span>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                @component('_components.alerts-default')@endcomponent

            </div>

        </div>
    </div>
@endsection
