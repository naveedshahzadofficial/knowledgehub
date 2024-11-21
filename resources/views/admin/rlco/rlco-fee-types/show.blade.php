@extends('_layouts.admin.app')
@push('title','View Variable Fee')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-custom ">
                <div class="card-header flex-wrap py-3">
                    <div class="card-title">
                        <h3 class="card-label">{{ $rlco->rlco_name  }}</h3>
                    </div>
                    <div class="card-toolbar">
                        <span class="btn btn-circle btn-sm border-0 cursor-move active {{ $rlco->status?'btn-hover-success':'btn-hover-danger' }} ">
                            {{ $rlcoVariableFee->status?'Active':'Inactive'  }}
                        </span>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                @component('_components.alerts-default')@endcomponent
                 <div class="form-body col-xl-12 col-xs-12">

                     <div class="row">
                         <div class="col-lg-6">
                             <strong>Title</strong>
                             <label class="bmd-label-floating">{{ $rlcoVariableFee->title }}</label><br>
                         </div>
                         <div class="col-lg-6">
                             <strong>Unit</strong>
                             <label class="bmd-label-floating">{{ $rlcoVariableFee->unit }}</label><br>
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-lg-6">
                             <strong>Quantity</strong>
                             <label class="bmd-label-floating">{{ $rlcoVariableFee->unit_quantity }}</label><br>
                         </div>
                         <div class="col-lg-6">
                             <strong>Price</strong>
                             <label class="bmd-label-floating">{{ $rlcoVariableFee->price }}</label><br>
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-lg-6">
                             <strong>Order</strong>
                             <label class="bmd-label-floating">{{ $rlcoVariableFee->order }}</label><br>
                         </div>
                     </div>


                    </div>
            </div>

        </div>
    </div>
@endsection
