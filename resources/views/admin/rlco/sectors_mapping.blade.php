@extends('_layouts.admin.app')
@push('title','Sector Mapping')
@section('content')
    <div class="row">
        <div class="col-lg-12">

            <div class="card card-custom ">
                <div class="card-header flex-wrap py-3">
                    <div class="card-title">
                        <h3 class="card-label">{{ $rlco->rlco_name  }}</h3>
                    </div>
                </div>

                <div class="card-body p-0">
                    <div class="section_box">
                        {{ Form::open(array('route' => ['admin.rlcos.sectors-mapping.update',$rlco],'method'=>'PUT','class'=>'form form-horizontal','name'=>'rlco_mapping_form','id'=>'rlco_mapping_form')) }}

                            <div class="row master-checkbox">
                                <div class="col-md-12">
                                    <div class="checkbox-container">
                                        <div class="checkbox-inline">
                                            <label class="checkbox checkbox-success">
                                                <input type="checkbox" id="checkAll" {{ $rlco->businessActivities->count() ==  count($business_activities)? 'checked': ''}}>
                                                <span></span>All Sectors
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @php
                                $current_letter = '';
                                $counter = 0;
                            @endphp

                            @foreach ($business_activities as $activity)
                                @php
                                    // Get the first letter of the activity's name
                                    $first_letter = strtoupper(substr($activity->class_name, 0, 1));
                                @endphp

                                {{-- Display a new alphabet header if the first letter changes --}}
                                @if ($first_letter !== $current_letter)
                                    @if ($counter % 2 == 1)
                                        </div>
                                    @endif
                                    @php
                                        $current_letter = $first_letter;
                                        $counter = 0; // Reset counter for new section
                                    @endphp
                                    <div class="row">
                                        <div class="col-md-12 alphabet-header">{{ $current_letter }}</div>
                                    </div>
                                @endif

                                {{-- Create new row after every two checkboxes --}}
                                @if ($counter % 2 == 0)
                                    <div class="row">
                                @endif

                                        <div class="col-md-6">
                                            <div class="checkbox-container">
                                                <div class="checkbox-inline">
                                                    <label class="checkbox checkbox-success">
                                                        <input type="checkbox" name="business_activity_ids[]" value="{{ $activity->id }}" class="activity-checkbox" {{ in_array($activity->id, old('business_activity_ids', $rlco->businessActivities->pluck('id')->toArray()) ?: []) ? 'checked' : '' }}>
                                                        <span></span>{{ $activity->class_name }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Close the row after the second checkbox --}}
                                @if ($counter % 2 == 1)
                                    </div>
                                @endif

                                @php
                                    $counter++; // Increment counter
                                @endphp
                            @endforeach

                            {{-- Close the last row if it has an odd number of items --}}
                            @if ($counter % 2 == 1)
                                </div>
                            @endif

                <div class="form-actions p-t-15">
                    <div class="row">
                        <div class="col-xl-offset-3 col-xl-9">
                            <button class="btn btn-primary" type="submit">Save</button>
                            <a class="btn btn-default" href="{{route('admin.activities.index')}}">Cancel</a>
                        </div>
                    </div>
                </div><!--form-actions ends-->

                {{  Form::close() }}

                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

@push('post-styles')
    <style>
        /* Style for alphabet header */
        .alphabet-header {
            background-color: #4B9996;
            color: #fff;
            padding: 10px;
            font-weight: bold;
            border-radius: 5px;
            margin-bottom: 15px;
            text-align: center;
        }

        /* Style for checkbox containers */
        .checkbox-container {
            padding: 10px;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            margin-bottom: 10px;
            background-color: #ffffff;
            display: flex;
            align-items: center;
        }

        /* Style for the custom checkbox */
        .checkbox-success input[type="checkbox"] {
            margin-right: 10px;
        }

        /* Additional margin for label text */
        .checkbox-success label {
            margin: 0;
        }
        /* Style for master checkbox */
        .master-checkbox {
            margin-bottom: 20px;
        }
    </style>
@endpush

@push('post-scripts')
    <script>
        const masterCheckbox = document.getElementById('checkAll');
        const checkboxes = document.querySelectorAll('.activity-checkbox');

        masterCheckbox.addEventListener('change', function () {
            checkboxes.forEach(checkbox => {
                checkbox.checked = masterCheckbox.checked;
            });
        });
        $(document).ready(function() {
            'use strict';
         $('#rlco_mapping_form').validate({
            rules : {
                'business_activity_ids[]': "required",
            },
            messages: {
                'business_activity_ids[]': {
                    required: "Please select at least one Sector."
                },
            },
            highlight: function(element) {
                $(element).closest('.form-group').removeClass('has-success').addClass('has-danger');
            },
            success: function(element) {
                $(element).closest('.form-group').removeClass('has-danger');
            },
            errorPlacement: function(error, element) {
                if (element.attr("type") === "radio" || element.is('select')) {
                    error.insertAfter(element.prev('row').next());
                } else {
                    error.insertAfter(element);
                }
            }
        });
        });
    </script>
@endpush


