@extends('_layouts.admin.app')
@push('title','Update Department')
@section('content')
    <div class="row">
        <div class="col-lg-12">

            <div class="card card-custom ">
                <div class="card-header flex-wrap py-3">
                    <div class="card-title">
                        <h3 class="card-label">Update Department</h3>
                    </div>
                </div>

                <div class="card-body p-0">
                    {{ Form::open(array('route' => ['admin.departments.update',$department],'method'=>'PUT','class'=>'form form-horizontal','name'=>'activity_form','id'=>'activity_form')) }}
                    <div class="form-body col-xl-8 col-xs-12">


                        <div class="form-group">
                            <label class="bmd-label-floating">Parent Department <span class="color-red-700"></span> </label>
                            <select name="department_id" class="form-control select2">
                                <option value="">---Select Department---</option>
                                @foreach($departments as $dept)
                                    <option value="{{ $dept->id  }}" @if(old('department_id', $department->department_id)==$dept->id) selected @endif>{{ $dept->department_name }}</option>
                                @endforeach
                            </select>
                            @error('department_id')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="bmd-label-floating">Department Name <span class="color-red-700">*</span> </label>
                            <input maxlength="255" type="text" class="form-control  @error('department_name') is-invalid @enderror" name="department_name"
                                   value="{{ old('department_name', $department->department_name) }}"
                                   id="department_name"  required />
                            @error('department_name')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="bmd-label-floating">Department Display Name <span class="color-red-700"></span> </label>
                            <input maxlength="255" type="text" class="form-control  @error('department_display_name') is-invalid @enderror" name="department_display_name"
                                   value="{{ old('department_display_name', $department->department_display_name) }}"
                                   id="department_display_name"  />
                            @error('department_display_name')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="bmd-label-floating">Province <span class="color-red-700">*</span> </label>
                            <select name="province_id" class="form-control select2">
                                <option value="">---Select Province---</option>
                                @foreach($provinces as $province)
                                    <option value="{{ $province->id  }}" @if(old('province_id', $department->province_id)==$province->id) selected @endif>{{ $province->province_name }}</option>
                                @endforeach
                            </select>
                            @error('province_id')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="bmd-label-floating">Category <span class="color-red-700">*</span> </label>
                            <select name="category_id" class="form-control select2">
                                <option value="">---Select Category---</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id  }}" @if(old('category_id', $department->category_id)==$category->id) selected @endif>{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="bmd-label-floating">Scope <span class="color-red-700">*</span> </label>

                            <div class="radio-inline">
                                @foreach($scopes as $scope)
                                    <label class="radio radio-success">
                                        <input type="radio"  @if(old('department_scope', $department->department_scope)==$scope->scope_title)checked="checked" @endif name="department_scope" value="{{ $scope->scope_title }}">
                                        <span></span>{{ $scope->scope_title }}</label>
                                @endforeach
                            </div>
                            @error('department_scope')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="bmd-label-floating">Remarks</label>
                            <textarea name="department_remark" class="form-control @error('department_remark') is-invalid @enderror" rows="2">{{ old('department_remark', $department->department_remark) }}</textarea>
                            @error('department_remark')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror

                        </div>

                        <div class="form-group">

                            <label class="bmd-label-floating">Status <span class="color-red-700">*</span> </label>
                            <div class="radio-inline">
                                <label class="radio radio-success">
                                    <input type="radio"  @if(old('department_status', $department->department_status)=='1') checked="checked" @endif name="department_status" value="1">
                                    <span></span>Active</label>

                                <label class="radio radio-danger">
                                    <input type="radio"  @if(old('department_status', $department->department_status)=='0') checked="checked" @endif name="department_status" value="0">
                                    <span></span>Inactive</label>
                            </div>
                            @error('department_status')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div><!--form-group ends-->

                        <div class="form-actions p-t-15">
                            <div class="row">
                                <div class="col-xl-offset-3 col-xl-9">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                    <a class="btn btn-default" href="{{route('admin.departments.index')}}">Cancel</a>
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
            $('#activity_form').validate({
                rules : {
                    department_name: "required",
                    province_id: "required",
                    category_id: "required",
                    department_scope: "required",
                    department_status: "required",
                },
                messages: {
                    department_name: {
                        required: "Department Name is required."
                    },
                    province_id: {
                        required: "Province is required."
                    },
                    category_id: {
                        required: "Category is required."
                    },
                    department_scope: {
                        required: "Scope is required."
                    },
                    department_status: {
                        required: "Please select department status."
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
