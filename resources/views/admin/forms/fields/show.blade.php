@extends('_layouts.admin.app')
@push('title','View Form Field')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-custom ">
                <div class="card-header flex-wrap py-3">
                    <div class="card-title">
                        <h3 class="card-label">{{ $form->form_name  }}</h3>
                    </div>
                    <div class="card-toolbar">
                        <span class="btn btn-circle btn-sm border-0 cursor-move active {{ $formField->field_status?'btn-hover-success':'btn-hover-danger' }} ">
                            {{ $formField->field_status?'Active':'Inactive'  }}
                        </span>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                @component('_components.alerts-default')@endcomponent
                 <div class="form-body col-xl-12 col-xs-12">

                     <div class="col-lg-12">
                         <strong>Field Label</strong>
                         <label class="bmd-label-floating">{{ $formField->field_label }}</label><br>
                     </div>

                     <div class="col-lg-12">
                         <strong>Field Type</strong>
                         <label class="bmd-label-floating">{{ $formField->field_type }}</label><br>
                     </div>

                     @if(!empty($formField->field_options))
                     <div class="col-lg-12">
                            <strong>Field Options</strong>
                            <ul class="list-group ">
                                @foreach($formField->field_options as $field_option)
                                <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">{{ $field_option }}</li>
                                @endforeach
                            </ul>
                    </div>
                     @endif    


                    </div>
            </div>

        </div>
    </div>
@endsection
