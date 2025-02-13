@extends('_layouts.admin.app')
@push('title', 'Form View')
@section('content')
    <div class="p-0">
        @if($rlco->forms->isNotEmpty())
            <h2>{{ $rlco->rlco_name ?? 'RLCO Form' }}</h2>
        @else
            <p class="text-gray-500 text-center my-4">There is no data associated with this RLCO.</p>
        @endif
            @foreach($rlco->forms as $form)
                <div class="border border-[#d3d3d3] rounded dark:border-[#1b2e4b]">
                    <div class="space-y-2 p-4 text-[13px] border-t border-[#d3d3d3] dark:border-[#1b2e4b]">
                        <h3 class="text-xl font-medium">{{ $form->form_sub_heading }}</h3>
                        @if($form->is_tabular)
                            <table class="form-table">
                                <thead>
                                <tr>
                                    @foreach($form->formFields->where('field_type', 'group') as $field)
                                        <th>{{ $field->field_label }}</th>
                                    @endforeach
                                    @if($form->is_add_more)
                                        <th>Actions</th>
                                    @endif
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($form->formTableRows as $rowIndex => $row)
                                    <tr>
                                        @foreach($form->formFields->where('field_type', 'group') as $field)
                                            <td>
                                                @php
                                                    $inputField = collect($form->formFields)->first(function($inputField) use ($row, $field) {
                                                        return $inputField->form_table_row_id == $row->id && $inputField->form_table_column_id == $field->form_table_column_id;
                                                    });
                                                @endphp

                                                @if($inputField)
                                                    @if(in_array($inputField->field_type, ['text', 'number', 'email', 'password', 'url', 'phone']))
                                                        <input type="{{ $inputField->field_type }}"
                                                               name="forms[{{ $form->id }}][{{ $inputField->id }}][{{ $rowIndex }}]"
                                                               class="form-input">
                                                    @elseif($inputField->field_type === 'textarea')
                                                        <textarea name="forms[{{ $form->id }}][{{ $inputField->id }}][{{ $rowIndex }}]"
                                                                  class="form-textarea"></textarea>
                                                    @elseif($inputField->field_type === 'select')
                                                        <select name="forms[{{ $form->id }}][{{ $inputField->id }}][{{ $rowIndex }}]"
                                                                class="form-select">
                                                            @foreach($inputField->field_options as $option)
                                                                <option value="{{ $option }}">{{ $option }}</option>
                                                            @endforeach
                                                        </select>
                                                    @endif
                                                @endif
                                            </td>
                                        @endforeach

                                        @if($form->is_add_more && $rowIndex > 0)
                                            <td>
{{--                                                <button type="button" class="btn btn-danger" onclick="deleteRow(this)">Delete</button>--}}
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            @if($form->is_add_more)
                                <p class="my-2 text-right">
                                    <button type="button" class="add-more-btn" >Add More</button>
                                </p>
                            @endif
                        @else
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                @foreach($form->formFields as $field)

                                    <div>
                                        <label>{{ $field->field_label }}</label>
                                        @if(in_array($field->field_type, ['text', 'number', 'email', 'password', 'url', 'phone']))
                                            <input type="{{ $field->field_type }}" name="forms[{{ $form->id }}][{{ $field->id }}]" class="form-input">
                                        @elseif($field->field_type === 'textarea')
                                            <textarea name="forms[{{ $form->id }}][{{ $field->id }}]" class="form-textarea"></textarea>
                                        @elseif($field->field_type === 'select')
                                            <select name="forms[{{ $form->id }}][{{ $field->id }}]" class="form-select">
                                                @foreach($field->field_options as $option)
                                                    <option value="{{ $option }}">{{ $option }}</option>
                                                @endforeach
                                            </select>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
    </div>

    <script>
        function addRow(button) {
            const table = button.closest('div').querySelector('table');
            const tbody = table.querySelector('tbody');
            const lastRow = tbody.querySelector('tr:last-child');
            if (!lastRow) return;

            const newRow = lastRow.cloneNode(true);

            newRow.querySelectorAll('input, select, textarea').forEach(input => {
                if (input.required && !input.value) {
                    alert("Please fill all required fields before adding a new row!");
                    return;
                }
                input.value = '';
                const nameAttr = input.getAttribute('name');
                if (nameAttr) {
                    const newIndex = tbody.children.length;
                    input.setAttribute('name', nameAttr.replace(/\[\d+\]/, `[${newIndex}]`));
                }
            });
            tbody.appendChild(newRow);
        }
    </script>

@endsection

<style>
    .form-input, .form-textarea, .form-select {
        width: 100%;
        padding: 12px 16px;
        background: #F4F5F8;
        border: 1px solid #C0C0D2;
        margin: 5px 0;
        border: 1px solid #ccc;
        border-radius: 20px;
    }
    .form-textarea { height: 100px; }
    .form-table { width: 100%; border-collapse: collapse; }
    .form-table th, .form-table td { border: 1px solid #ccc; padding: 8px; }
    .btn { padding: 8px 16px; background-color: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer; }
    .btn-danger { background-color: #dc3545; }

    .add-more-btn{
        border-radius: 20px;
        padding: 8px;
        width: 135px;
        font-size: 12px;
        font-weight: 500;
        color: white;
        background-color: #278237;
        border-color: transparent;
    }
</style>
