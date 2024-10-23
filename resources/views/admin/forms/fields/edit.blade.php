@extends('_layouts.admin.app')
@push('title','Update Form Field')
@section('content')
    <div class="row">
        <div class="col-lg-12">

            <div class="card card-custom ">
                <div class="card-header flex-wrap py-3">
                    <div class="card-title">
                        <h3 class="card-label">Update Form Field ({{ $form->form_name }})</h3>
                    </div>
                </div>

                <div class="card-body p-0">
                    {{ Form::open(array('route' => ['admin.forms.form-fields.update',[$form, $formField]],'method'=>'PUT','class'=>'form form-horizontal','name'=>'form','id'=>'form', 'files'=>true)) }}
                    <div class="form-body col-xl-8 col-xs-12">

                        <div class="form-group">
                            <label class="bmd-label-floating">Field Label <span class="color-red-700">*</span> </label>
                            <input maxlength="255" type="text" class="form-control  @error('field_label') is-invalid @enderror" name="field_label"
                                   value="{{ old('field_label', $formField->field_label) }}"
                                   id="field_label"  required />
                                @error('field_label')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                                @enderror
                        </div>

                        <div class="form-group">
                            <label for="field_type">Field Type <span class="color-red-700">*</span> </label>
                            <div class="radio-inline">
                                @isset($field_types)
                                    @foreach($field_types as $field_type)
                                <label class="radio radio-success">
                                    <input type="radio" @if(old('field_type', $formField->field_type)==$field_type)checked="checked"@endif name="field_type" value="{{ $field_type }}">
                                    <span></span>{{ $field_type }}</label>
                                    @endforeach
                                @endisset
                            </div>
                            @error('field_type')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div><!--form-group ends-->

                        <div class="form-group">
                            <label for="is_required">Required</label>
                            <div class="radio-inline">
                                <label class="radio radio-success">
                                    <input type="radio"  @if(old('is_required', $formField->is_required)=='1')checked="checked"@endif name="is_required" value="1">
                                    <span></span>Yes</label>

                                <label class="radio radio-danger">
                                    <input type="radio"  @if(old('is_required', $formField->is_required)=='0')checked="checked"@endif name="is_required" value="0">
                                    <span></span>No</label>
                            </div>
                            @error('is_required')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="bmd-label-floating">Field Group <span class="color-red-700"></span> </label>
                            <input maxlength="255" type="text" class="form-control  @error('field_group') is-invalid @enderror" name="field_group"
                                   value="{{ old('field_group', $formField->field_group) }}"
                                   id="field_group" />
                            @error('field_group')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="bmd-label-floating">Field Options <span class="color-red-700">*</span> </label>
                            <select name="field_options[]" class="form-control select2-tags  @error('field_options') is-invalid @enderror" multiple>
                                @if(!empty($formField->field_options))
                                    @foreach($formField->field_options as $field_option)
                                    <option selected value="{{ $field_option }}">{{ $field_option }}</option>
                                    @endforeach
                                @endif
                            </select>
                            @error('field_options')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label class="bmd-label-floating">Field Order <span class="color-red-700">*</span> </label>
                            <input maxlength="255" type="text" class="form-control  @error('field_order') is-invalid @enderror" name="field_order"
                                   value="{{ old('field_order',$formField->field_order ) }}"
                                   id="field_order"  required />
                            @error('field_order')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="field_status">Field Status <span class="color-red-700">*</span></label>
                            <div class="radio-inline">
                                <label class="radio radio-success">
                                    <input type="radio"  @if(old('field_status', $formField->field_status)=='1')checked="checked"@endif name="field_status" value="1">
                                    <span></span>Active</label>

                                <label class="radio radio-danger">
                                    <input type="radio"  @if(old('field_status', $formField->field_status)=='0')checked="checked"@endif name="field_status" value="0">
                                    <span></span>Inactive</label>
                            </div>
                            @error('field_status')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-actions p-t-15">
                            <div class="row">
                                <div class="col-xl-offset-3 col-xl-9">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                    <a class="btn btn-default" href="{{route('admin.forms.form-fields.index', $form)}}">Cancel</a>
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
                    field_label: "required",
                    field_type: "required",
                    is_required: "required",
                    field_order: "required",
                    field_status: "required",
                },
                messages: {
                    field_label: {
                        required: "Field Label is required."
                    },
                    field_type: {
                        required: "Field Type is required."
                    },
                    is_required: {
                        required: "Please select required."
                    },
                    field_order: {
                        required: "Field Order is required."
                    },
                    field_status: {
                        required: "Please select field status."
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
