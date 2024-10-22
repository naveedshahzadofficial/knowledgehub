@extends('_layouts.admin.app')
@push('title','View Activity')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-custom ">
                <div class="card-header flex-wrap py-3">
                    <div class="card-title">
                        <h3 class="card-label">{{ $form->form_name  }}</h3>
                    </div>
                    <div class="card-toolbar">
                        <span class="btn btn-circle btn-sm border-0 cursor-move active {{ $form->form_status?'btn-hover-success':'btn-hover-danger' }} ">
                            {{ $form->form_status?'Active':'Inactive'  }}
                        </span>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                @component('_components.alerts-default')@endcomponent
                 <div class="form-body col-xl-12 col-xs-12">
                     <div class="col-lg-12">
                            <strong>RLCOs</strong>
                            <ul class="list-group ">
                                @foreach($form->rlcos as $rlco)
                                <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">{{ $rlco->rlco_name }}</li>
                                @endforeach
                            </ul>
                    </div>
                    </div>
            </div>

        </div>
    </div>
@endsection
