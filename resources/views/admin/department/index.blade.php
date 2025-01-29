@extends('_layouts.admin.app')
@push('title','Departments')
@section('content')
    <!--begin::Card-->
    <div class="card card-custom gutter-b">
        <div class="card-header flex-wrap py-3">
            <div class="card-title">
                <h3 class="card-label">Departments</h3>
            </div>

            <div class="card-toolbar">
                <!--begin::Button-->
                <a href="{{ route('admin.departments.create') }}" class="btn btn-custom-color font-weight-bolder">
											<span class="svg-icon svg-icon-white svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Code\Plus.svg--><svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                    height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
        <path
            d="M11,11 L11,7 C11,6.44771525 11.4477153,6 12,6 C12.5522847,6 13,6.44771525 13,7 L13,11 L17,11 C17.5522847,11 18,11.4477153 18,12 C18,12.5522847 17.5522847,13 17,13 L13,13 L13,17 C13,17.5522847 12.5522847,18 12,18 C11.4477153,18 11,17.5522847 11,17 L11,13 L7,13 C6.44771525,13 6,12.5522847 6,12 C6,11.4477153 6.44771525,11 7,11 L11,11 Z"
            fill="#000000"/>
    </g>
</svg><!--end::Svg Icon--></span>
                    Add Department</a>
                <!--end::Button-->
            </div>

        </div>
        <div class="card-body">
            @component('_components.alerts-default')@endcomponent
            <!--begin: Datatable-->
            <table class="table table-bordered table-checkable" id="my_datatable">
                <thead>
                <tr>
                    <th>Department ID</th>
                    <th>Dept. Name</th>
                    <th>Parent Dept.</th>
                    <th>Scope</th>
                    <th>Province</th>
                    <th>Category</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Action</th>
                </tr>
                </thead>
            </table>
            <!--end: Datatable-->
        </div>
    </div>
    <!--end::Card-->

@endsection


@push('post-scripts')
    <script type="text/javascript">
        var myDataTable;
        $(function () {

            myDataTable = $('#my_datatable').DataTable({
                language: {
                    infoFiltered: ""
                },
                processing: true,
                pageLength: 30,
                serverSide: true,
                searching: true,
                ajax: {
                    url: '{{ route('admin.departments.index-ajax') }}',
                    type: "POST"
                },
                columns: [
                    {data: 'id', searchable: false, visible: false, printable: false},
                    {data: 'department_name', name: 'department_name'},
                    {data: 'department_id', name: 'department_id', class: 'text-center', render: (data,type,row,meta) => row.parent_department?.department_name??'' },
                    {data: 'department_scope', name: 'department_scope'},
                    {data: 'province_id', name: 'province_id', render: (data,type,row,meta) => row.province?.province_name??'' },
                    {data: 'category_id', name: 'category_id', render: (data,type,row,meta) => row.category?.category_name??''},
                    {data: 'department_status', name: 'department_status'},
                    {data: 'action', name: 'action', orderable: false, searchable: false,class: 'text-center'},
                ],
                order: [[0, 'desc']],
                dom: 'Blfrtip',

                lengthMenu: [
                    [10, 20, 30, 50, 100, -1],
                    ['10', '20', '30', '50', '100', 'All']
                ],
                buttons: [
                    {
                        extend: 'print',
                        text: '<i class="fa fa-print"></i>',
                        titleAttr: 'Print',
                        charset: "utf-8",
                        "bom": "true",
                        className: 'btn btn-xs',
                        exportOptions: {
                            columns: ':visible:not(.not-exported)',
                            modifier: {
                                search: 'applied',
                                order: 'applied',
                                page: 'all'
                            }
                        }
                    },
                    {
                        extend: 'csvHtml5',
                        text: '<i class="fa fa-file-csv"></i>',
                        titleAttr: 'CSV',
                        charset: "utf-8",
                        "bom": "true",
                        className: 'btn btn-xs',
                        exportOptions: {
                            columns: ':visible:not(.not-exported)',
                            modifier: {
                                search: 'applied',
                                order: 'applied',
                                page: 'all'
                            }
                        }

                    },
                    {
                        extend: 'excelHtml5',
                        text: '<i class="fa fa-file-excel"></i>',
                        titleAttr: 'Excel',
                        charset: "utf-8",
                        "bom": "true",
                        className: 'btn btn-xs',
                        exportOptions: {
                            columns: ':visible:not(.not-exported)',
                            modifier: {
                                search: 'applied',
                                order: 'applied',
                                page: 'all'
                            }
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        text: '<i class="fa fa-file-pdf"></i>',
                        titleAttr: 'PDF',
                        charset: "utf-8",
                        "bom": "true",
                        className: 'btn btn-xs',
                        exportOptions: {
                            columns: ':visible:not(.not-exported)',
                            modifier: {
                                search: 'applied',
                                order: 'applied',
                                page: 'all'
                            }
                        }
                    }
                ],
            });

        });

    </script>
@endpush
