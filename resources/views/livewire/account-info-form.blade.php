<div x-data="{
account_type: '{{ $form['account_type']??null }}',
applicable_at_level: '{{ $form['applicable_at_level']??null }}',
}"  class="form-body col-xs-12 col-lg-12">
<form class="form">
                <h4 class="font-weight-bold section_heading text-white">
                    <span>  {!! __('ACCOUNT INFO') !!}</span>
                </h4>
                <div class="section_box">
                    <div class="row form-group">
                        <div class="col-lg-6">
                            <label for="account_type">Account Type<span class="text-danger">*</span></label>
                            <div class="radio-inline">
                                @foreach(['Treasury', 'Commercial'] as $account_type)
                                <label class="radio radio-success">
                                    <input type="radio" wire:model.defer="form.account_type" name="account_type" @click="account_type= '{{ $account_type  }}'"  value="{{ $account_type  }}">
                                    <span></span>{{ $account_type  }}</label>
                                @endforeach
                            </div>
                            @error('form.account_type')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div><!--form-group ends-->
                        <div class="col-lg-6">
                            <label for="applicable_at_level">Applicable at Level<span class="text-danger">*</span></label>
                            <div class="radio-inline">
                                @foreach(['Province', 'District', 'Tehsil', 'Custom'] as $applicable_at_level)
                                    <label class="radio radio-success">
                                        <input type="radio" wire:model.defer="form.applicable_at_level" name="applicable_at_level" @click="applicable_at_level= '{{ $applicable_at_level  }}'"  value="{{ $applicable_at_level  }}">
                                        <span></span>{{ $applicable_at_level  }}</label>
                                @endforeach
                            </div>
                            @error('form.applicable_at_level')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div><!--form-group ends-->

                    </div>
                </div>

                <h4 class="font-weight-bold section_heading text-white">
                    <span>  {!! __('ADD ACCOUNT') !!}</span>
                </h4>
                <div class="section_box">
                    <div class="row form-group">
                        <div class="col-lg-6" x-show.transition.opacity="applicable_at_level=='District' || applicable_at_level=='Tehsil'">
                            <label>{!! __('District') !!}<span class="text-danger">*</span></label>
                            <div wire:ignore>
                                <x-select2-dropdown wire:model.defer="account_form.district_id"
                                                    setFieldName="account_form.district_id"
                                                    id="district_id" fieldName="district_name_e"
                                                    :listing="$districts"/>
                            </div>
                            @error('account_form.district_id')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-lg-6" x-show.transition.opacity="applicable_at_level=='Tehsil'">
                            <label>{!! __('Tehsil') !!}<span class="text-danger">*</span></label>
                            <div wire:ignore>
                                <x-select2-dropdown wire:model.defer="account_form.tehsil_id"
                                                    setFieldName="account_form.tehsil_id"
                                                    id="tehsil_id" fieldName="tehsil_name_e"
                                                    :listing="$tehsils"/>
                            </div>
                            @error('account_form.tehsil_id')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="col-lg-6" x-show.transition.opacity="applicable_at_level=='Custom'">
                            <label>{!! __('Structural Units') !!}<span class="text-danger">*</span></label>
                            <div wire:ignore>
                                <x-select2-dropdown wire:model.defer="account_form.department_structural_unit_id"
                                                    setFieldName="account_form.department_structural_unit_id"
                                                    id="department_structural_unit_id" fieldName="unit_name"
                                                    :listing="$departmentStructuralUnits"/>
                            </div>
                            @error('account_form.department_structural_unit_id')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    <div class="row form-group">
                        <div class="col-lg-6">
                            <label>{!! __('Title/Head') !!}<span class="text-danger">*</span></label>
                            <input wire:model.defer="account_form.account_title" type="text"
                                   class="form-control @error('account_form.account_title') is-invalid @enderror"
                                   placeholder="Account Title/Head"/>
                            @error('account_form.account_title')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-lg-6">
                            <label>{!! __('Account No./ IBAN') !!}<span class="text-danger">*</span></label>
                            <input wire:model.defer="account_form.account_no" type="text"
                                   class="form-control @error('account_form.account_no') is-invalid @enderror"
                                   placeholder="Account No."/>
                            @error('account_form.account_no')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        @if(!empty($account_form['id']))
                            <button class="btn btn-custom-color" wire:click.prevent="updateAccount({{ $account_form['id'] }})"  wire:loading.class="spinner spinner-white spinner-right" wire:loading.attr="disabled" >Update Account</button>
                        @else
                            <button class="btn btn-custom-color" wire:click.prevent="addAccount()"  wire:loading.class="spinner spinner-white spinner-right" wire:loading.attr="disabled">Add Account</button>
                        @endif
                    </div>
                </div>
                <h4 class="font-weight-bold section_heading text-white">
                    <span>  {!! __('ACCOUNTS') !!}</span>
                </h4>
                <div class="section_box">

                    <table class="table">
                        <thead>
                        <tr>
                            <th x-show.transition.opacity="applicable_at_level=='District' || applicable_at_level=='Tehsil'">District</th>
                            <th x-show.transition.opacity="applicable_at_level=='Tehsil'">Tehsil</th>
                            <th x-show.transition.opacity="applicable_at_level=='Custom'">Structural Unit</th>
                            <th>Title/Head</th>
                            <th>Account No./ IBAN</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($accounts as $account)
                            <tr>
                                <td x-show.transition.opacity="applicable_at_level=='District' || applicable_at_level=='Tehsil'">{{ optional($account->district)->district_name_e }}</td>
                                <td x-show.transition.opacity="applicable_at_level=='Tehsil'">{{ optional($account->tehsil)->tehsil_name_e }}</td>
                                <td x-show.transition.opacity="applicable_at_level=='Custom'">{{ optional($account->departmentStructuralUnit)->unit_name }}</td>
                                <td>{{ $account->account_title }}</td>
                                <td>{{ $account->account_no }}</td>
                                <td class="text-center"><button wire:click.prevent="editAccount({{ $account->id }})" class="btn btn-bg-primary text-center btn-circle btn-icon btn-xs"><i class="flaticon2-edit text-white"></i></button> &nbsp; <button wire:click.prevent="confirmDialog('account',{{ $account->id }})" class="btn btn-danger text-center btn-circle btn-icon btn-xs"><i class="flaticon2-trash text-white"></i></button></td>
                            </tr>
                        @empty
                            <tr><td colspan="8" class="opacity-70">No account has been added currently.</td></tr>
                        @endforelse

                        </tbody>
                    </table>
                </div>

        </form>
</div>

@push('post-scripts')
    <script>
        window.addEventListener('account-info:select2', event =>{
            $(event.detail.id).select2();
            $(event.detail.id).on('change', function (e) {
                let data = $(this).val();
            @this.set(event.detail.key_name, data);
            });
        });

    </script>

    <script>

        window.addEventListener('account-info:refill-select2', event =>{
            let select2_id = event.detail.select2_id;
            const fieldName = event.detail.field_name;
            const SelectedId = event.detail.selected_id;
            console.log(SelectedId);
            $(select2_id).empty();
            $(select2_id).append(new Option("--- Please Select ---", "", false, false));
            event.detail.data.forEach(function(row){
                $(select2_id).append(new Option(row[fieldName], row.id, SelectedId==row.id, SelectedId==row.id));
            });
            $(select2_id).trigger('change.select2');
        });

    </script>
@endpush
