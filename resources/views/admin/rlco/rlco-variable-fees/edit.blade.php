@extends('_layouts.admin.app')
@push('title','Update Variable Fee')
@section('content')
    <div class="row">
        <div class="col-lg-12">

            <div class="card card-custom ">
                <div class="card-header flex-wrap py-3">
                    <div class="card-title">
                        <h3 class="card-label">Update Variable Fee ({{ $rlco->rlco_name }})</h3>
                    </div>
                </div>

                <div class="card-body p-0">
                    {{ Form::open(array('route' => ['admin.rlcos.rlco-variable-fees.update',[$rlco, $rlcoVariableFee]],'method'=>'PUT','class'=>'form form-horizontal','name'=>'form','id'=>'form', 'files'=>true)) }}
                    <div class="form-body col-xl-8 col-xs-12">
                        <div class="form-group">
                            <label class="bmd-label-floating">Title <span class="color-red-700">*</span> </label>
                            <input maxlength="255" type="text" class="form-control  @error('title') is-invalid @enderror" name="title"
                                   value="{{ old('title', $rlcoVariableFee->title) }}"
                                   id="title"  required />
                            @error('title')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="field_type">Unit <span class="color-red-700"></span> </label>
                            <input maxlength="255" type="text" class="form-control  @error('unit') is-invalid @enderror" name="unit" value="{{ old('unit', $rlcoVariableFee->unit) }}" id="unit"   />
                            @error('unit')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div><!--form-group ends-->

                        <div class="form-group">
                            <label for="field_type">Unit Quantity <span class="color-red-700"></span> </label>
                            <input maxlength="255" type="text" class="form-control  @error('unit_quantity') is-invalid @enderror" name="unit_quantity" value="{{ old('unit_quantity', $rlcoVariableFee->unit_quantity) }}" id="unit_quantity"   />
                            @error('unit_quantity')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div><!--form-group ends-->

                        <div class="form-group">
                            <label class="bmd-label-floating">Price <span class="color-red-700">*</span> </label>
                            <input maxlength="255" type="text" class="form-control  @error('price') is-invalid @enderror" name="price" value="{{ old('price', $rlcoVariableFee->price) }}" id="price" required />
                            @error('price')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="bmd-label-floating">Order <span class="color-red-700">*</span> </label>
                            <input maxlength="255" type="text" class="form-control  @error('order') is-invalid @enderror" name="order" value="{{ old('order', $rlcoVariableFee->order) }}" id="order"  required />
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
                                    <input type="radio"  @if(old('status', $rlcoVariableFee->status)=='1')checked="checked"@endif name="status" value="1">
                                    <span></span>Active</label>

                                <label class="radio radio-danger">
                                    <input type="radio"  @if(old('status', $rlcoVariableFee->status)=='0')checked="checked"@endif name="status" value="0">
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
                                    <a class="btn btn-default" href="{{route('admin.rlcos.rlco-variable-fees.index', $rlco)}}">Cancel</a>
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
                    title: {
                        required: true,
                        maxlength: 255 // Title column is a string with a default max length of 255.
                    },
                    unit: {
                        maxlength: 255 // Unit is nullable and a string with a max length of 255.
                    },
                    unit_quantity: {
                        number: true, // Ensures the value is numeric.
                        min: 0, // Minimum value is 0.
                        maxlength: 14 // Allows for 11 digits + 1 decimal + 2 decimal places.
                    },
                    price: {
                        required: true,
                        number: true,
                        min: 0,
                        maxlength: 14 // Allows for 11 digits + 1 decimal + 2 decimal places.
                    },
                    order: {
                        required: true,
                        digits: true, // Ensures only integer values are accepted.
                        min: 0 // Minimum value is 0.
                    },
                    status: {
                        required: true, // Nullable boolean.
                        digits: true // Accepts 1 or 0 for true/false.
                    },
                },
                messages: {
                    title: {
                        required: "Title is required.",
                        maxlength: "Title cannot exceed 255 characters."
                    },
                    unit: {
                        maxlength: "Unit cannot exceed 255 characters."
                    },
                    unit_quantity: {
                        number: "Unit Quantity must be a valid number.",
                        min: "Unit Quantity cannot be less than 0.",
                        maxlength: "Unit Quantity cannot exceed 11 digits and 2 decimal places."
                    },
                    price: {
                        required: "Price is required.",
                        number: "Price must be a valid number.",
                        min: "Price cannot be less than 0.",
                        maxlength: "Price cannot exceed 11 digits and 2 decimal places."
                    },
                    order: {
                        required: "Order is required.",
                        digits: "Order must be a valid integer.",
                        min: "Order cannot be less than 0."
                    },
                    status: {
                        required: "Status is required.",
                        digits: "Status must be 0 or 1."
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
