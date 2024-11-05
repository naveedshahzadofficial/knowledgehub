@extends('_layouts.admin.app')
@push('title','Add Form Table Column')
@section('content')
    <div class="row">
        <div class="col-lg-12">

            <div class="card card-custom ">
                <div class="card-header flex-wrap py-3">
                    <div class="card-title">
                        <h3 class="card-label">Add Form Table Column ({{ $form->form_name }})</h3>
                    </div>
                </div>

                <div class="card-body p-0">
                    {{ Form::open(array('route' => ['admin.forms.form-table-columns.store', $form],'class'=>'form form-horizontal','name'=>'from','id'=>'from', 'files'=>true)) }}
                    <div class="form-body col-xl-8 col-xs-12">

                        <div class="form-group">
                            <label class="bmd-label-floating">Column Name <span class="color-red-700">*</span> </label>
                            <input maxlength="255" type="text" class="form-control  @error('column_name') is-invalid @enderror" name="column_name"
                                   value="{{ old('column_name') }}"
                                   id="column_name"  required />
                                @error('column_name')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                                @enderror
                        </div>


                        <div class="form-group">
                            <label class="bmd-label-floating">Column Order <span class="color-red-700">*</span> </label>
                            <input maxlength="255" type="text" class="form-control  @error('column_order') is-invalid @enderror" name="column_order"
                                   value="{{ old('column_order') }}"
                                   id="column_order"  required />
                            @error('column_order')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="column_status">Column Status <span class="color-red-700">*</span></label>
                            <div class="radio-inline">
                                <label class="radio radio-success">
                                    <input type="radio"  @if(old('column_status')=='1')checked="checked"@endif name="column_status" value="1">
                                    <span></span>Active</label>

                                <label class="radio radio-danger">
                                    <input type="radio"  @if(old('column_status')=='0')checked="checked"@endif name="column_status" value="0">
                                    <span></span>Inactive</label>
                            </div>
                            @error('column_status')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-actions p-t-15">
                            <div class="row">
                                <div class="col-xl-offset-3 col-xl-9">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                    <a class="btn btn-default" href="{{route('admin.forms.form-table-columns.index', $form)}}">Cancel</a>
                                </div>
                            </div>
                        </div><!--form-actions ends-->

                    </div><!--form-body ends-->
                    {{  Form::close() }}
                </div>
            </div>

        </div>
    </div>

@endsection



@push('post-scripts')

    <script>
        $(document).ready(function() {
            'use strict';
            // Basic Form
            $('#from').validate({
                rules : {
                    column_name: "required",
                    column_order: "required",
                    column_status: "required",
                },
                messages: {
                    column_name: {
                        required: "Column Name is required."
                    },
                    column_order: {
                        required: "Column Order is required."
                    },
                    column_status: {
                        required: "Please select row status."
                    },
                    'field_options[]': {
                        required: "Please select at least one option."
                    },
                },
                highlight: function (element) {
                    $(element).closest('.form-group').removeClass('has-success').addClass('has-danger');
                },
                success: function (element) {
                    $(element).closest('.form-group').removeClass('has-danger');
                },
                errorPlacement: function(error, element) {
                    if (element.attr("type") == "radio") {
                        error.insertAfter(element.parent().parent());
                    }else if(element.has('option').length) {
                        error.insertAfter(element.next());
                    } else {
                        error.insertAfter(element);
                    }
                }
            });


        });

    </script>
@endpush
