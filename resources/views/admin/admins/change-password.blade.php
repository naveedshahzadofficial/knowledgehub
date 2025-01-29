@extends('_layouts.admin.app')
@push('title','Add Role')
@section('content')
    <div class="row">
        <div class="col-lg-12">

            <div class="card card-custom ">
                <div class="card-header flex-wrap py-3">
                    <div class="card-title">
                        <h3 class="card-label">Change Password</h3>
                    </div>
                </div>

                <div class="card-body p-0">
                    @component('_components.alerts-default')@endcomponent
                    {{ Form::open(array('route' => 'admin.update-password','class'=>'form form-horizontal','name'=>'change-password-form','id'=>'change-password-form')) }}
                    <div class="form-body col-xl-8 col-xs-12">

                        <div class="form-group">
                            <label class="bmd-label-floating">Current Password <span class="color-red-700">*</span> </label>

                            <input maxlength="255" type="password" class="form-control  @error('old_password') is-invalid @enderror" name="old_password"
                                   value="{{ old('old_password') }}"
                                   id="old_password"  required />
                            @error('old_password')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="bmd-label-floating">New Password <span class="color-red-700">*</span> </label>

                            <input maxlength="255" type="password" class="form-control  @error('new_password') is-invalid @enderror" name="new_password"
                                   value="{{ old('new_password') }}"
                                   id="new_password"  required />
                            @error('new_password')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="bmd-label-floating">Confirm New Password <span class="color-red-700">*</span> </label>

                            <input maxlength="255" type="password" class="form-control  @error('new_password_confirmation') is-invalid @enderror" name="new_password_confirmation"
                                   value="{{ old('new_password_confirmation') }}"
                                   id="new_password_confirmation"  required />
                            @error('new_password_confirmation')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>


                        <div class="form-actions p-t-15">
                            <div class="row">
                                <div class="col-xl-offset-3 col-xl-9">
                                    <button class="btn btn-primary" type="submit">Submit</button>
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
            $('#change-password-form').validate({
                rules : {
                    old_password: "required",
                    new_password: "required",
                    new_password_confirmation: "required",
                },
                messages: {
                    old_password: {
                        required: "Old password is required."
                    },
                    new_password: {
                        required: "New password is required."
                    },
                    new_password_confirmation: {
                        required: "Confirm password is required."
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
