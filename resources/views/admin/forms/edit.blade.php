@extends('_layouts.admin.app')
@push('title','Update Form')
@section('content')
    <div class="row">
        <div class="col-lg-12">

            <div class="card card-custom ">
                <div class="card-header flex-wrap py-3">
                    <div class="card-title">
                        <h3 class="card-label">Update Form</h3>
                    </div>
                </div>

                <div class="card-body p-0">
                    {{ Form::open(array('route' => ['admin.forms.update',$form],'method'=>'PUT','class'=>'form form-horizontal','name'=>'form','id'=>'form', 'files'=>true)) }}
                    <div class="form-body col-xl-8 col-xs-12">

                        <div class="form-group">
                            <label class="bmd-label-floating">Name <span class="color-red-700">*</span> </label>

                            <input type="text" class="form-control  @error('form_name') is-invalid @enderror" name="form_name"
                                   value="{{ old('form_name', $form->form_name) }}"
                                   id="form_name"  required />
                            @error('form_name')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="bmd-label-floating">Order <span class="color-red-700">*</span> </label>

                            <input type="text" class="form-control  @error('form_order') is-invalid @enderror" name="form_order"
                                   value="{{ old('form_order', $form->form_order) }}"
                                   id="form_order"  required />
                            @error('form_order')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="bmd-label-floating">RLCOs <span class="color-red-700">*</span> </label>
                            <select name="rlco_ids[]" class="form-control select2  @error('rlco_ids') is-invalid @enderror" required multiple>
                                @foreach($rlcos as $rlco)
                                    <option value="{{ $rlco->id }}"  {{ in_array($rlco->id, old('rlco_ids', $form->rlcos->pluck('id')->toArray()) ?: []) ? 'selected' : '' }}>{{ $rlco->rlco_name }}</option>
                                @endforeach
                            </select>
                            @error('rlco_ids')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>


                        <div class="form-group">

                            <label for="">Status</label>
                            <div class="radio-inline">
                                <label class="radio radio-success">
                                    <input type="radio"  @if(old('form_status', $form->form_status)=='1')checked="checked"@endif name="form_status" value="1">
                                    <span></span>Active</label>

                                <label class="radio radio-danger">
                                    <input type="radio"  @if(old('form_status', $form->form_status)=='0')checked="checked"@endif name="form_status" value="0">
                                    <span></span>Inactive</label>
                            </div>
                            @error('form_status')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div><!--form-group ends-->

                        <div class="form-actions p-t-15">
                            <div class="row">
                                <div class="col-xl-offset-3 col-xl-9">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                    <a class="btn btn-default" href="{{route('admin.forms.index')}}">Cancel</a>
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
            $('#form').validate({
                rules : {
                    form_name: "required",
                    form_order: "required",
                    form_status: "required",
                    'rlco_ids[]': "required",
                },
                messages: {
                    form_name: {
                        required: "Form Name is required."
                    },
                    form_order: {
                        required: "Form Order is required."
                    },
                    form_status: {
                        required: "Please select form status."
                    },
                    'rlco_ids[]': {
                        required: "Please select at least one rlco."
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
