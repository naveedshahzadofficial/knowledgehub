@extends('_layouts.admin.app')
@push('title','View Form Table Row')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-custom ">
                <div class="card-header flex-wrap py-3">
                    <div class="card-title">
                        <h3 class="card-label">{{ $form->form_name  }}</h3>
                    </div>
                    <div class="card-toolbar">
                        <span class="btn btn-circle btn-sm border-0 cursor-move active {{ $formTableRow->row_status?'btn-hover-success':'btn-hover-danger' }} ">
                            {{ $formTableRow->row_status?'Active':'Inactive'  }}
                        </span>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                @component('_components.alerts-default')@endcomponent
                 <div class="form-body col-xl-12 col-xs-12">

                     <div class="col-lg-12">
                         <strong>Row Name</strong>
                         <label class="bmd-label-floating">{{ $formTableRow->row_name }}</label><br>
                     </div>

                     <div class="col-lg-12">
                         <strong>Row Order</strong>
                         <label class="bmd-label-floating">{{ $formTableRow->row_order }}</label><br>
                     </div>


                    </div>
            </div>

        </div>
    </div>
@endsection
