@extends('_layouts.admin.app')
@push('title','Add Rlco Variable Fee')
@section('content')
    <div class="row">
        <div class="col-lg-12">

            <div class="card card-custom ">
                <div class="card-header flex-wrap py-3">
                    <div class="card-title">
                        <h3 class="card-label">Add Rlco Variable Fee ({{ $rlco->rlco_name }})</h3>
                    </div>
                </div>

                <div class="card-body p-0">
                    {{ Form::open(array('route' => ['admin.rlcos.rlco-fee-types.store', $rlco],'class'=>'form form-horizontal','name'=>'from','id'=>'from', 'files'=>true)) }}
                    <div class="form-body col-xl-8 col-xs-12">
                        <div class="form-group">
                            <label class="bmd-label-floating">Title <span class="color-red-700">*</span> </label>
                            <input maxlength="255" type="text" class="form-control  @error('name') is-invalid @enderror" name="name"
                                   value="{{ old('name') }}"
                                   id="name"  required />
                                @error('name')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                                @enderror
                        </div>

                        <div class="form-group">
                            <label for="field_type">Description <span class="color-red-700"></span> </label>
                            <input maxlength="255" type="text" class="form-control  @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" id="description"   />
                            @error('description')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div><!--form-group ends-->


                        <div class="form-group">
                            <label for="applicable_to">Applicable To <span class="color-red-700">*</span></label>
                            <div class="radio-inline">
                                <label class="radio radio-success">
                                    <input type="radio"  @if(old('applicable_to')=='1')checked="checked"@endif name="applicable_to" value="1">
                                    <span></span>First Fee</label>

                                <label class="radio radio-warning">
                                    <input type="radio"  @if(old('applicable_to')=='2')checked="checked"@endif name="applicable_to" value="2">
                                    <span></span>Further Fee</label>

                                <label class="radio radio-danger">
                                    <input type="radio"  @if(old('applicable_to')=='3')checked="checked"@endif name="applicable_to" value="3">
                                    <span></span>Both Fees</label>
                            </div>
                            @error('applicable_to')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="bmd-label-floating">Order <span class="color-red-700">*</span> </label>
                            <input maxlength="255" type="text" class="form-control  @error('order') is-invalid @enderror" name="order" value="{{ old('order') }}" id="order"  required />
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
                rules : {
                    name: {
                        required: true,
                        maxlength: 255, // 'name' is a string with max length 255.
                    },
                    description: {
                        maxlength: 255, // 'description' can be nullable but max length of 255.
                    },
                    applicable_to: {
                        required: true,
                    },
                    order: {
                        required: true,
                        digits: true, // Ensures only integer values are accepted for 'order'.
                        min: 0, // Minimum value is 0 for 'order'.
                    },
                    status: {
                        required: true, // 'status' is required.
                        digits: true, // Accepts only 0 or 1 for 'status' (boolean).
                    },
                },

                messages : {
                    name: {
                        required: "Title is required.",
                        maxlength: "Title cannot exceed 255 characters.",
                    },
                    description: {
                        maxlength: "Description cannot exceed 255 characters.",
                    },
                    applicable_to: {
                        required: "Applicable is required.",
                    },
                    order: {
                        required: "Order is required.",
                        digits: "Order must be a valid integer.",
                        min: "Order cannot be less than 0.",
                    },
                    status: {
                        required: "Status is required.",
                        digits: "Status must be 0 or 1.",
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
