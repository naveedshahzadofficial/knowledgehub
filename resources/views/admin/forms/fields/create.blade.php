@extends('_layouts.admin.app')
@push('title','Add Form Field')
@section('content')
    <div class="row">
        <div class="col-lg-12">

            <div class="card card-custom ">
                <div class="card-header flex-wrap py-3">
                    <div class="card-title">
                        <h3 class="card-label">Add Form Field ({{ $form->form_name }})</h3>
                    </div>
                </div>

                <div class="card-body p-0">
                    {{ Form::open(array('route' => ['admin.forms.form-fields.store', $form],'class'=>'form form-horizontal','name'=>'from','id'=>'from', 'files'=>true)) }}
                    <div class="form-body col-xl-8 col-xs-12">
                        @if($form->is_tabular)
                        <div class="form-group">
                            <label class="bmd-label-floating">Form Table Row <span class="color-red-700">*</span> </label>
                            <select name="form_table_row_id" class="form-control select2  @error('form_table_row_id') is-invalid @enderror" required>
                                <option value="">Select Table Row</option>
                               @isset($form_table_rows)
                                @foreach($form_table_rows as $form_table_row)
                                        <option value="{{ $form_table_row->id }}" @if(old('form_table_row_id') == $form_table_row->id) selected @endif >{{ $form_table_row->row_name }}</option>
                                    @endforeach
                               @endisset
                            </select>
                            @error('form_table_row_id')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="bmd-label-floating">Form Table Column <span class="color-red-700">*</span> </label>
                            <select name="form_table_column_id" class="form-control select2  @error('form_table_column_id') is-invalid @enderror" required>
                                <option value="">Select Table Column</option>
                                @isset($form_table_columns)
                                    @foreach($form_table_columns as $form_table_column)
                                        <option value="{{ $form_table_column->id }}" @if(old('form_table_column_id') == $form_table_column->id) selected @endif>{{ $form_table_column->column_name }}</option>
                                    @endforeach
                                @endisset
                            </select>
                            @error('form_table_column_id')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        @endif

                        <div class="form-group">
                            <label class="bmd-label-floating">Field Label <span class="color-red-700">*</span> </label>
                            <input maxlength="255" type="text" class="form-control  @error('field_label') is-invalid @enderror" name="field_label"
                                   value="{{ old('field_label') }}"
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
                                    <input type="radio" @if(old('field_type')==$field_type)checked="checked"@endif name="field_type" value="{{ $field_type }}">
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

                        <div class="form-group conditional-group" id="date-type-group" style="display: none;">
                            <label for="date_type">Date Type <span class="color-red-700">*</span></label>
                            <div class="radio-inline">
                                <label class="radio radio-success">
                                    <input type="radio"  @if(old('date_type')=='1')checked="checked"@endif name="date_type" value="1">
                                    <span></span>Date Only</label>

                                <label class="radio radio-danger">
                                    <input type="radio"  @if(old('date_type')=='2')checked="checked"@endif name="date_type" value="2">
                                    <span></span>Year Only</label>

                                <label class="radio radio-danger">
                                    <input type="radio"  @if(old('date_type')=='3')checked="checked"@endif name="date_type" value="3">
                                    <span></span>Time Only</label>

                                <label class="radio radio-danger">
                                    <input type="radio"  @if(old('date_type')=='4')checked="checked"@endif name="date_type" value="4">
                                    <span></span>Date Time</label>
                            </div>
                            @error('date_type')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group conditional-group" id="max-date-group" style="display: none;">
                                <label for="max_date">Max Date <span class="color-red-700">*</span></label>
                                <div class="radio-inline">
                                    <label class="radio radio-success">
                                        <input type="radio"  @if(old('max_date')=='1')checked="checked"@endif name="max_date" value="1">
                                        <span></span>Future Date</label>

                                    <label class="radio radio-danger">
                                        <input type="radio"  @if(old('max_date')=='2')checked="checked"@endif name="max_date" value="2">
                                        <span></span>Current Date</label>
                                </div>
                                @error('max_date')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                        <div class="form-group">
                            <label for="is_required">Is Array</label>
                            <div class="radio-inline">
                                <label class="radio radio-success">
                                    <input type="radio"  @if(old('is_array')=='1')checked="checked"@endif name="is_array" value="1">
                                    <span></span>Yes</label>

                                <label class="radio radio-danger">
                                    <input type="radio"  @if(old('is_array')=='0')checked="checked"@endif name="is_array" value="0">
                                    <span></span>No</label>
                            </div>
                            @error('is_array')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>


                            <div class="form-group">
                            <label for="is_required">Required</label>
                            <div class="radio-inline">
                                <label class="radio radio-success">
                                    <input type="radio"  @if(old('is_required')=='1')checked="checked"@endif name="is_required" value="1">
                                    <span></span>Yes</label>

                                <label class="radio radio-danger">
                                    <input type="radio"  @if(old('is_required')=='0')checked="checked"@endif name="is_required" value="0">
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
                                   value="{{ old('field_group') }}"
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
                            </select>
                            @error('field_options')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                            <div class="form-group">
                                <label for="field_grid_col">Grid Column <span class="color-red-700">*</span></label>
                                <div class="radio-inline">
                                    <label class="radio radio-success">
                                        <input type="radio"  @if(old('field_grid_col')=='1')checked="checked"@endif name="field_grid_col" value="1">
                                        <span></span>1 Column</label>

                                    <label class="radio radio-danger">
                                        <input type="radio"  @if(old('field_grid_col')=='2')checked="checked"@endif name="field_grid_col" value="2">
                                        <span></span>2 Column</label>
                                </div>
                                @error('field_grid_col')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>


                            <div class="form-group">
                            <label class="bmd-label-floating">Field Order <span class="color-red-700">*</span> </label>
                            <input maxlength="255" type="text" class="form-control  @error('field_order') is-invalid @enderror" name="field_order"
                                   value="{{ old('field_order') }}"
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
                                    <input type="radio"  @if(old('field_status')=='1')checked="checked"@endif name="field_status" value="1">
                                    <span></span>Active</label>

                                <label class="radio radio-danger">
                                    <input type="radio"  @if(old('field_status')=='0')checked="checked"@endif name="field_status" value="0">
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
                ignore: ":hidden",
                rules : {
                    form_table_row_id: "required",
                    form_table_column_id: "required",
                    field_label: "required",
                    field_type: "required",
                    date_type: "required",
                    max_date: "required",
                    is_array: "required",
                    is_required: "required",
                    field_order: "required",
                    field_grid_col: "required",
                    field_status: "required",
                },
                messages: {
                    form_table_row_id: {
                        required: "Form Table Row is required."
                    },
                    form_table_column_id: {
                        required: "Form Table Column is required."
                    },
                    field_label: {
                        required: "Field Label is required."
                    },
                    field_type: {
                        required: "Field Type is required."
                    },
                    date_type: {
                        required: "Date Type is required."
                    },
                    max_date: {
                        required: "Max Date is required."
                    },
                    is_array: {
                        required: "Is Array is required."
                    },
                    is_required: {
                        required: "Please select required."
                    },
                    field_grid_col: {
                        required: "Field Grid Col is required."
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

        function generateSlug(text) {
            return text
                .toLowerCase()
                .trim()
                .replace(/[^\w\s-]/g, '')    // Remove non-word characters
                .replace(/\s+/g, '_')        // Replace spaces with hyphens
                .replace(/-+/g, '_');        // Replace multiple hyphens with single hyphen
        }

        document.getElementById('field_group').addEventListener('input', function() {
            document.getElementById('field_group').value = generateSlug(this.value);
        });

        function toggleConditionalFields() {
            const selectedFieldType = $('input[name="field_type"]:checked').val();
            if (selectedFieldType === 'date') {
                $('#date-type-group').show();
                $('#max-date-group').show();
            } else {
                $('#date-type-group').hide();
                $('#max-date-group').hide();
            }
        }

        toggleConditionalFields();

        $('input[name="field_type"]').on('change', function () {
            toggleConditionalFields();
        });

    </script>
@endpush
