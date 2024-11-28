@extends('_layouts.admin.app')
@push('title','Add Rlco Variable Fee')
@section('content')
    <div class="row">
        <div class="col-lg-12">

            <div class="card card-custom ">
                <div class="card-header flex-wrap py-3">
                    <div class="card-title">
                        <h3 class="card-label">Add Rlco Fee User Input Field ({{ $rlco->rlco_name }} - {{ $rlcoFeeType->name }} - {{ $rlcoFeeRule->category }})</h3>
                    </div>
                </div>

                <div class="card-body p-0">
                    {{ Form::open(array('route' => ['admin.rlcos.rlco-fee-types.rlco-fee-rules.rlco-user-inputs.store', [$rlco, $rlcoFeeType,$rlcoFeeRule]],'class'=>'form form-horizontal','name'=>'from','id'=>'from', 'files'=>true)) }}
                    <div class="form-body col-xl-8 col-xs-12">
                        <div class="form-group">
                            <label class="bmd-label-floating">Input Field Name <span class="color-red-700">*</span> </label>
                            <input maxlength="255" type="text" class="form-control  @error('input_name') is-invalid @enderror" name="input_name"
                                   value="{{ old('input_name') }}"
                                   id="input_name"  required />
                                @error('input_name')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="field_type">Field Label <span class="color-red-700"></span> </label>
                            <input type="text" class="form-control  @error('input_label') is-invalid @enderror" name="input_label" value="{{ old('input_label') }}" id="input_label"   />
                            @error('input_label')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div><!--form-group ends-->

                        <div class="form-group">
                            <label for="field_type">Minimum Value <span class="color-red-700"></span> </label>
                            <input type="text" class="form-control  @error('minimum_value') is-invalid @enderror" name="minimum_value" value="{{ old('minimum_value') }}" id="minimum_value"   />
                            @error('minimum_value')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div><!--form-group ends-->

                        <div class="form-group">
                            <label for="field_type">Maximum Value <span class="color-red-700"></span> </label>
                            <input type="text" class="form-control  @error('maximum_value') is-invalid @enderror" name="maximum_value" value="{{ old('maximum_value') }}" id="maximum_value"   />
                            @error('maximum_value')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div><!--form-group ends-->

                        <div class="form-group">
                            <label for="field_status">Field Type <span class="color-red-700">*</span></label>
                            <div class="radio-inline">
                                <label class="radio radio-success">
                                    <input type="radio"  @if(old('input_type')=='text')checked="checked"@endif name="input_type" value="text">
                                    <span></span>Text</label>
                            </div>
                            @error('input_type')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="field_type">Validation Rules <span class="color-red-700"></span> </label>
                            <input type="text" class="form-control  @error('validation_rules') is-invalid @enderror" name="validation_rules" value="{{ old('validation_rules') }}" id="validation_rules"   />
                            @error('validation_rules')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div><!--form-group ends-->

                        <div class="form-group">
                            <label for="field_status">Status <span class="color-red-700">*</span></label>
                            <div class="radio-inline">
                                <label class="radio radio-success">
                                    <input type="radio"  @if(old('status')=='1')checked="checked"@endif name="status" value="1">
                                    <span></span>Active</label>

                                <label class="radio radio-danger">
                                    <input type="radio"  @if(old('status')=='0')checked="checked"@endif name="status" value="0">
                                    <span></span>Inactive</label>
                            </div>
                            @error('status')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-actions p-t-15">
                            <div class="row">
                                <div class="col-xl-offset-3 col-xl-9">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                    <a class="btn btn-default" href="{{route('admin.rlcos.rlco-fee-types.rlco-fee-rules.rlco-user-inputs.index', [$rlco,$rlcoFeeType,$rlcoFeeRule])}}">Cancel</a>
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
                ignore: ":hidden",
                rules: {
                    rlco_fee_rule_id: {
                        required: true,
                        digits: true
                    },
                    input_name: {
                        required: true,
                        maxlength: 255
                    },
                    input_label: {
                        required: true,
                        maxlength: 255
                    },
                    minimum_value: {
                        maxlength: 14 // Allows for 11 digits, 1 decimal, and 2 decimal places
                    },
                    maximum_value: {
                        maxlength: 14 // Allows for 11 digits, 1 decimal, and 2 decimal places
                    },
                    input_type: {
                        required: true,
                        maxlength: 255
                    },
                    validation_rules: {
                        maxlength: 1000
                    },
                    status: {
                        required: true,
                        digits: true // Accepts 1 or 0 for active/inactive
                    }
                },
                messages: {
                    rlco_fee_rule_id: {
                        required: "The Fee Rule ID is required.",
                        digits: "The Fee Rule ID must be a valid integer."
                    },
                    input_name: {
                        required: "The Input Name is required.",
                        maxlength: "The Input Name cannot exceed 255 characters."
                    },
                    input_label: {
                        required: "The Input Label is required.",
                        maxlength: "The Input Label cannot exceed 255 characters."
                    },
                    input_type: {
                        required: "The Input Type is required.",
                        maxlength: "The Input Type cannot exceed 255 characters."
                    },
                    validation_rules: {
                        maxlength: "The Validation Rules cannot exceed 1000 characters."
                    },
                    status: {
                        required: "The Status field is required.",
                        digits: "The Status must be either 1 (active) or 0 (inactive)."
                    }
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

        function generateSlug(text) {
            return text
                .toLowerCase()
                .trim()
                .replace(/[^\w\s-]/g, '')    // Remove non-word characters
                .replace(/\s+/g, '_')        // Replace spaces with hyphens
                .replace(/-+/g, '_');        // Replace multiple hyphens with single hyphen
        }

        document.getElementById('input_name').addEventListener('input', function() {
            document.getElementById('input_name').value = generateSlug(this.value);
        });

    </script>
@endpush
