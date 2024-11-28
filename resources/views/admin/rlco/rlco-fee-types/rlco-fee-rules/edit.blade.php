@extends('_layouts.admin.app')
@push('title','Update Variable Fee')
@section('content')
    <div class="row">
        <div class="col-lg-12">

            <div class="card card-custom ">
                <div class="card-header flex-wrap py-3">
                    <div class="card-title">
                        <h3 class="card-label">Update Variable Fee ({{ $rlco->rlco_name }} - {{ $rlcoFeeType->name }})</h3>
                    </div>
                </div>

                <div class="card-body p-0">
                    {{ Form::open(array('route' => ['admin.rlcos.rlco-fee-types.rlco-fee-rules.update',[$rlco, $rlcoFeeType, $rlcoFeeRule]],'method'=>'PUT','class'=>'form form-horizontal','name'=>'form','id'=>'form', 'files'=>true)) }}
                    <div class="form-body col-xl-8 col-xs-12">
                        <div class="form-group">
                            <label class="bmd-label-floating">Category <span class="color-red-700">*</span> </label>
                            <input maxlength="255" type="text" class="form-control  @error('category') is-invalid @enderror" name="category"
                                   value="{{ old('category',$rlcoFeeRule->category) }}"
                                   id="category"  required />
                            @error('category')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="field_status">Calculation Type <span class="color-red-700">*</span></label>
                            <div class="radio-inline">
                                <label class="radio radio-success">
                                    <input type="radio"  @if(old('calculation_type',$rlcoFeeRule->calculation_type)=='rate_based')checked="checked"@endif name="calculation_type" value="rate_based">
                                    <span></span>Rate Based</label>

                                <label class="radio radio-danger">
                                    <input type="radio"  @if(old('calculation_type',$rlcoFeeRule->calculation_type)=='fixed_fee')checked="checked"@endif name="calculation_type" value="fixed_fee">
                                    <span></span>Fixed Fee</label>
                            </div>
                            @error('calculation_type')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="field_type">Rate <span class="color-red-700"></span> </label>
                            <input type="text" class="form-control  @error('rate') is-invalid @enderror" name="rate" value="{{ old('rate',$rlcoFeeRule->rate) }}" id="rate"   />
                            @error('rate')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div><!--form-group ends-->
                        <div class="form-group">
                            <label for="field_type">Minimum Fee <span class="color-red-700"></span> </label>
                            <input type="text" class="form-control  @error('minimum_fee') is-invalid @enderror" name="minimum_fee" value="{{ old('minimum_fee',$rlcoFeeRule->minimum_fee) }}" id="minimum_fee"   />
                            @error('minimum_fee')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div><!--form-group ends-->
                        <div class="form-group">
                            <label for="field_type">Maximum Fee <span class="color-red-700"></span> </label>
                            <input type="text" class="form-control  @error('maximum_fee') is-invalid @enderror" name="maximum_fee" value="{{ old('maximum_fee',$rlcoFeeRule->maximum_fee) }}" id="maximum_fee"   />
                            @error('maximum_fee')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div><!--form-group ends-->
                        <div class="form-group">
                            <label for="field_type">Fixed Fee <span class="color-red-700"></span> </label>
                            <input type="text" class="form-control  @error('fixed_fee') is-invalid @enderror" name="fixed_fee" value="{{ old('fixed_fee',$rlcoFeeRule->fixed_fee) }}" id="fixed_fee"   />
                            @error('fixed_fee')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div><!--form-group ends-->
                        <div class="form-group">
                            <label for="field_type">Unit <span class="color-red-700"></span> </label>
                            <input type="text" class="form-control  @error('unit') is-invalid @enderror" name="unit" value="{{ old('unit',$rlcoFeeRule->unit) }}" id="unit"   />
                            @error('unit')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div><!--form-group ends-->
                        <div class="form-group">
                            <label for="field_type">Percentage <span class="color-red-700"></span> </label>
                            <input type="text" class="form-control  @error('percentage') is-invalid @enderror" name="percentage" value="{{ old('percentage',$rlcoFeeRule->percentage) }}" id="percentage"   />
                            @error('percentage')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div><!--form-group ends-->

                        <div class="form-group">
                            <label class="bmd-label-floating">Order <span class="color-red-700">*</span> </label>
                            <input maxlength="255" type="text" class="form-control  @error('order') is-invalid @enderror" name="order" value="{{ old('order',$rlcoFeeRule->order) }}" id="order"  required />
                            @error('order')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="field_status">Status <span class="color-red-700">*</span></label>
                            <div class="radio-inline">
                                <label class="radio radio-success">
                                    <input type="radio"  @if(old('status',$rlcoFeeRule->status)=='1')checked="checked"@endif name="status" value="1">
                                    <span></span>Active</label>

                                <label class="radio radio-danger">
                                    <input type="radio"  @if(old('status',$rlcoFeeRule->status)=='0')checked="checked"@endif name="status" value="0">
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
                                    <a class="btn btn-default" href="{{route('admin.rlcos.rlco-fee-types.index', $rlco)}}">Cancel</a>
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
                    rlco_fee_type_id: {
                        required: true,
                        digits: true // Ensure this is a numeric value
                    },
                    category: {
                        required: true,
                        maxlength: 255 // Adjust max length based on your needs
                    },
                    calculation_type: {
                        required: true
                    },
                    rate: {
                        required: true,
                        number: true,
                        min: 0, // Ensure the rate is a positive number
                        maxlength: 14 // Allows for 11 digits, 1 decimal, and 2 decimal places
                    },
                    minimum_fee: {
                        required: true,
                        number: true,
                        min: 0, // Ensure the minimum fee is a positive number
                        maxlength: 14 // Allows for 11 digits, 1 decimal, and 2 decimal places
                    },
                    maximum_fee: {
                        required: true,
                        number: true,
                        min: 0, // Ensure the minimum fee is a positive number
                        maxlength: 14 // Allows for 11 digits, 1 decimal, and 2 decimal places
                    },
                    fixed_fee: {
                        required: false, // Only required if you need it to be mandatory
                        number: true,
                        min: 0,
                        maxlength: 14 // Allows for 11 digits, 1 decimal, and 2 decimal places
                    },
                    unit: {
                        maxlength: 255 // Unit can be nullable and a string
                    },
                    percentage: {
                        number: true,
                        min: 0,
                        max: 100
                    },
                    order: {
                        required: true,
                        digits: true, // Ensures only integers
                        min: 0 // Minimum order is 0
                    },
                    status: {
                        required: true,
                        digits: true, // Only accepts 1 or 0
                        minlength: 1, // Ensures the field has a value
                        maxlength: 1
                    }
                },
                messages: {
                    rlco_fee_type_id: {
                        required: "RLCO Fee Type is required.",
                        digits: "RLCO Fee Type ID must be a number."
                    },
                    category: {
                        required: "Category is required.",
                        maxlength: "Category cannot exceed 255 characters."
                    },
                    calculation_type: {
                        required: "Calculation Type is required."
                    },
                    rate: {
                        required: "Rate is required.",
                        number: "Rate must be a valid number.",
                        min: "Rate cannot be less than 0.",
                        maxlength: "Rate cannot exceed 14 digits and 2 decimal places."
                    },
                    minimum_fee: {
                        required: "Minimum Fee is required.",
                        number: "Minimum Fee must be a valid number.",
                        min: "Minimum Fee cannot be less than 0.",
                        maxlength: "Minimum Fee cannot exceed 14 digits and 2 decimal places."
                    },
                    maximum_fee: {
                        required: "Maximum Fee is required.",
                        number: "Maximum Fee must be a valid number.",
                        min: "Maximum Fee cannot be less than 0.",
                        maxlength: "Maximum Fee cannot exceed 14 digits and 2 decimal places."
                    },
                    fixed_fee: {
                        number: "Fixed Fee must be a valid number.",
                        min: "Fixed Fee cannot be less than 0.",
                        maxlength: "Fixed Fee cannot exceed 14 digits and 2 decimal places."
                    },
                    unit: {
                        maxlength: "Unit cannot exceed 255 characters."
                    },
                    percentage: {
                        number: "The percentage must be a valid number.",
                        min: "The percentage cannot be less than 0.",
                        max: "The percentage cannot exceed 100."
                    },
                    order: {
                        required: "Order is required.",
                        digits: "Order must be a valid integer.",
                        min: "Order cannot be less than 0."
                    },
                    status: {
                        required: "Status is required.",
                        digits: "Status must be either 1 or 0.",
                        minlength: "Status is required.",
                        maxlength: "Status is required."
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

    </script>
@endpush
