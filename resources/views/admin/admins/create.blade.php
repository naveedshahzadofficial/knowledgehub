@extends('_layouts.admin.app')
@push('title','Add Role')
@section('content')
    <div class="row">
        <div class="col-lg-12">

            <div class="card card-custom ">
                <div class="card-header flex-wrap py-3">
                    <div class="card-title">
                        <h3 class="card-label">Add Staff</h3>
                    </div>
                </div>

                <div class="card-body p-0">
                    {{ Form::open(array('route' => 'admin.admins.store','class'=>'form form-horizontal','name'=>'admin_form','id'=>'admin_form')) }}
                    <div class="form-body col-xl-12 col-xs-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">First Name <span class="color-red-700">*</span> </label>
                                    <input maxlength="255" type="text" class="form-control  @error('first_name') is-invalid @enderror" name="first_name"
                                           value="{{ old('first_name') }}"
                                           id="first_name"  required />
                                        @error('first_name')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Middle Name <span class="color-red-700"></span> </label>
                                    <input maxlength="255" type="text" class="form-control  @error('middle_name') is-invalid @enderror" name="middle_name"
                                           value="{{ old('middle_name') }}"
                                           id="middle_name"  />
                                    @error('middle_name')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Last Name <span class="color-red-700">*</span> </label>
                                    <input maxlength="255" type="text" class="form-control  @error('last_name') is-invalid @enderror" name="last_name"
                                           value="{{ old('last_name') }}"
                                           id="last_name"  required />
                                    @error('last_name')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Username <span class="color-red-700">*</span> </label>
                                    <input maxlength="255" type="text" class="form-control  @error('username') is-invalid @enderror" name="username"
                                           value="{{ old('username') }}"
                                           id="username"  required />
                                    @error('username')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Email <span class="color-red-700">*</span> </label>
                                    <input maxlength="255" type="email" class="form-control  @error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email') }}"
                                           id="email"  required />
                                    @error('email')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">CNIC No. <span class="color-red-700"></span> </label>
                                    <input maxlength="255" type="text" class="form-control  @error('cnic_no') is-invalid @enderror" name="cnic_no"
                                           value="{{ old('cnic_no') }}"
                                           id="cnic_no"  />
                                    @error('cnic_no')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Password <span class="color-red-700">*</span> </label>
                                    <input  maxlength="255" type="password" class="form-control  @error('password') is-invalid @enderror" name="password"
                                           value="{{ old('password') }}"
                                           id="password"  required />
                                    @error('password')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Confirm Password<span class="color-red-700">*</span> </label>
                                    <input maxlength="255" type="password" class="form-control  @error('password_confirmation ') is-invalid @enderror" name="password_confirmation"
                                           value="{{ old('password_confirmation ') }}"
                                           id="password_confirmation "  required />
                                    @error('password_confirmation ')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Mobile No. <span class="color-red-700"></span> </label>
                                    <input maxlength="255" type="text" class="form-control  @error('mobile_no') is-invalid @enderror" name="mobile_no"
                                           value="{{ old('mobile_no') }}"
                                           id="mobile_no"  />
                                    @error('mobile_no')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Roles <span class="color-red-700">*</span> </label>
                                    <select name="role_ids[]" class="form-control select2  @error('role_ids') is-invalid @enderror" required multiple>
                                        @foreach($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('role_ids')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Department <span class="color-red-700"></span> </label>
                                    <select name="department_id" class="form-control select2  @error('department_id') is-invalid @enderror">
                                        <option value="">Select Department</option>
                                        @foreach($departments as $department)
                                            <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('department_id')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="admin_status">Status</label>
                                    <div class="radio-inline">
                                        <label class="radio radio-success">
                                            <input type="radio"  @if(old('admin_status')=='1')checked="checked"@endif name="admin_status" value="1">
                                            <span></span>Active</label>

                                        <label class="radio radio-danger">
                                            <input type="radio"  @if(old('admin_status')=='0')checked="checked"@endif name="admin_status" value="0">
                                            <span></span>Inactive</label>
                                    </div>
                                    @error('admin_status')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                        </div>


                        <div class="form-actions p-t-15">
                            <div class="row">
                                <div class="col-xl-offset-3 col-xl-9">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                    <a class="btn btn-default" href="{{route('admin.admins.index')}}">Cancel</a>
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

            // Custom validation method to check if department is required based on selected roles
            $.validator.addMethod("requiresDepartment", function(value, element) {
                // Get selected role IDs
                var selectedRoles = $('#admin_form select[name="role_ids[]"]').val();
                // Define role IDs that require a department selection (adjust these IDs based on your roles)
                var rolesRequiringDepartment = ['3']; // Example role IDs that require department

                // Check if any of the selected roles require a department
                var requiresDepartment = selectedRoles && selectedRoles.some(role => rolesRequiringDepartment.includes(role));
                // If department is required, check if a value is selected
                return !requiresDepartment || (requiresDepartment && value !== "");
            }, "Please select a department.");

            // Basic Form
            $('#admin_form').validate({
                rules : {
                    first_name: "required",
                    last_name: "required",
                    username: "required",
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true,
                        minlength: 6
                    },
                    password_confirmation: {
                        required: true,
                        equalTo: "#password"
                    },
                    'role_ids[]': "required",
                    admin_status: "required",
                },
                messages: {
                    first_name: {
                        required: "First Name is required."
                    },
                    last_name: {
                        required: "Last Name is required."
                    },
                    mobile_no: {
                        required: "Mobile No. is required."
                    },
                    email: {
                        required: "Email is required.",
                        email: "Please enter a valid email address."
                    },
                    password: {
                        required: "Password is required.",
                        minlength: "Password must be at least 6 characters long."
                    },
                    password_confirmation: {
                        required: "Please confirm your password.",
                        equalTo: "Passwords do not match."
                    },
                    'role_ids[]': {
                        required: "Please select at least one role."
                    },
                    department_id: {
                        required: "Please select a department."
                    },
                    admin_status: {
                        required: "Please select a status."
                    }
                },
                highlight: function(element) {
                    $(element).closest('.form-group').removeClass('has-success').addClass('has-danger');
                },
                success: function(element) {
                    $(element).closest('.form-group').removeClass('has-danger');
                },
                errorPlacement: function(error, element) {
                    if (element.attr("type") === "radio" || element.is('select')) {
                        error.insertAfter(element.next());
                    } else {
                        error.insertAfter(element);
                    }
                }
            });


            $('#cnic_no').inputmask({
                "mask": "99999-9999999-9",
                placeholder: ""
            });

            $('#mobile_no').inputmask({
                "mask": "0399-9999999",
                placeholder: ""
            });


        });

    </script>
@endpush
