<div>
    <div class="row form-group">
        <div class="col-lg-6">
            <label>{!! __('Department / Organization Name') !!}<span class="text-danger">*</span></label>
            <div wire:ignore>
                <x-select2-dropdown wire:model.defer="dependency_form.department_id"
                                    setFieldName="dependency_form.department_id"
                                    id="organization_id" fieldName="department_name"
                                    :listing="$departments"/>
            </div>
            @error('dependency_form.department_id')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-lg-6">
            <label for="">RLCO Selection Mode <span class="text-danger">*</span></label>
            <div class="radio-inline">
                <label class="radio radio-success">
                    <input type="radio" wire:model.defer="dependency_form.rlco_selection_mode" name="rlco_selection_mode" @click="rlco_selection_mode= 'Choose RLCO'"  value="Choose RLCO">
                    <span></span>Choose RLCO</label>
                <label class="radio radio-success">
                    <input type="radio" wire:model.defer="dependency_form.rlco_selection_mode" name="rlco_selection_mode" @click="rlco_selection_mode= 'Enter Manually'" value="Enter Manually">
                    <span></span>Enter Manually</label>
            </div>
            @error('dependency_form.rlco_selection_mode')
            <div class="invalid-feedback d-block">
                {{ $message }}
            </div>
            @enderror
        </div>

    </div>

    <div class="row form-group">
        <div class="col-lg-6" x-show.transition.opacity="rlco_selection_mode=='Choose RLCO'">
            <label>{!! __('RLCO Name') !!}<span class="text-danger">*</span></label>
            <div wire:ignore>
                <x-select2-dropdown wire:model.defer="dependency_form.parent_rlco_id"
                                    setFieldName="dependency_form.parent_rlco_id"
                                    id="parent_rlco_id" fieldName="rlco_name" :listing="$rlcos" />
            </div>
            @error('dependency_form.parent_rlco_id')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-lg-6"  x-show.transition.opacity="rlco_selection_mode=='Enter Manually'">
            <label>{!! __('RLCO Name') !!}<span class="text-danger">*</span></label>
            <input wire:model.defer="dependency_form.activity_name" type="text"
                   class="form-control @error('dependency_form.activity_name') is-invalid @enderror"
                   placeholder="RLCO Name"/>
            @error('dependency_form.activity_name')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="row form-group d-none">
        <div class="col-lg-6">
            <label>{!! __('Priority') !!}<span class="text-danger">*</span></label>
            <input wire:model.defer="dependency_form.priority" type="number"
                   class="form-control @error('dependency_form.priority') is-invalid @enderror"
                   placeholder="Priority"/>
            @error('dependency_form.priority')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="row form-group">

        <div class="col-lg-12">
            <label>{!! __('Remarks (if any):') !!}<span class="text-danger"></span></label>
            <div wire:ignore>
                <x-c-k-editor wire:model.debounce.999999s="dependency_form.remark" id="dependency_remark-ckeditor" placeholder="Remarks" setFieldName="dependency_form.remark" ></x-c-k-editor>
            </div>
            @error('dependency_form.remark')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

    </div>

    <div class="row form-group">
        @if(isset($dependency_form['id']) && !empty($dependency_form['id']))
            <button class="btn btn-custom-color" wire:click.prevent="updateDependency({{ $dependency_form['id'] }})"  wire:loading.class="spinner spinner-white spinner-right" wire:loading.attr="disabled" >Update Dependency</button>
        @else
        <button class="btn btn-custom-color" wire:click.prevent="addDependency()" wire:loading.class="spinner spinner-white spinner-right" wire:loading.attr="disabled">Add Dependency</button>
        @endif
    </div>

    <table class="table">
        <thead>
        <tr>
            <th>&nbsp;</th>
            <th>Organization</th>
            <th>RLCO Name</th>
            <th class="d-none">Priority</th>
            <th>Remarks</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @forelse($dependencies as $dependency)
            <tr>
                <td>
                    @if ($dependency->priority > 1)
                        <a wire:click.prevent="dependencyUp({{ $dependency->id }},{{ $dependency->rlco_id }})" href="#">
                            <i class="fa fa-arrow-alt-circle-up text-primary"></i>
                        </a>
                    @endif
                    @if ($dependency->priority < $dependency->max('priority'))
                        <a wire:click.prevent="dependencyDown({{ $dependency->id }},{{ $dependency->rlco_id }})" href="#">
                            <i class="fa fa-arrow-alt-circle-down text-primary"></i>
                        </a>
                    @endif
                </td>

                <td>{{ optional($dependency->department)->department_name }}</td>

                @if($dependency->rlco_selection_mode=='Choose RLCO')
                <td>{{ optional($dependency->parentRlco)->rlco_name }}</td>
                @else
                <td>{{ $dependency->activity_name }}</td>
                @endif

                <td class="d-none">{{ $dependency->priority }}</td>
                <td>{!! $dependency->remark !!}</td>
                <td><button wire:click.prevent="editDependency({{ $dependency->id }})" class="btn btn-bg-primary text-center btn-circle btn-icon btn-xs"><i class="flaticon2-edit text-white"></i></button> &nbsp; <button wire:click.prevent="confirmDialog('dependency',{{ $dependency->id }})" class="btn btn-danger text-center btn-circle btn-icon btn-xs"><i class="flaticon2-trash text-white"></i></button></td>
            </tr>
        @empty
            <tr><td colspan="4" class="opacity-70">Currently no dependency is added.</td></tr>
        @endforelse

        </tbody>
    </table>

</div>

@push('post-scripts')
    <script>
        window.addEventListener('dependency:select2', event =>{
            $(event.detail.id).select2();
            $(event.detail.id).on('change', function (e) {
                let data = $(this).val();
            @this.set(event.detail.key_name, data);
            });
        });

    </script>
@endpush
