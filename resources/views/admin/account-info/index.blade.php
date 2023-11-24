@extends('_layouts.admin.app')
@push('title','Account Information')
@section('content')
            <div class="card card-custom ">
                <div class="card-header flex-wrap py-3 px-4">
                    <div class="card-title">
                        <h3 class="card-label">Account Information</h3>
                    </div>
                </div>

                <div class="card-body p-0">
                    @livewire('account-info-form', ['rlco'=>$rlco])
                </div>
            </div>
@endsection
