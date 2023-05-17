@extends('master.backend')
@section('title',__('backend.settings'))
@section('styles')
<link href="{{ asset('backend/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">@lang('backend.settings'):</h4>
                            @can('settings create')
                            <a href="{{ route('backend.settings.create') }}" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> &nbsp;@lang('backend.add-new')
                            </a>
                            @endcan
                        </div>
                    </div>
                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>@lang('backend.name'):</th>
                                <th>@lang('backend.link'):</th>
                                <th>@lang('backend.time'):</th>
                                <th>@lang('backend.status'):</th>
                                @canany(['settings edit','settings delete'])
                                <th>@lang('backend.actions'):</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($settings as $setting)
                            <tr>
                                <td class="text-center">{{ $setting->id }}</td>
                                <td class="text-center">{{ $setting->name }}</td>
                                <td class="text-center">{{ $setting->link }}</td>
                                <td>{{ date('d.m.Y H:i:s',strtotime($setting->created_at))}}</td>
                                <td class="text-center">
                                    <a href="{{ route('backend.settingStatus',['id'=>$setting->id]) }}" title="@lang('backend.status')">
                                        <input type="checkbox" id="switch" switch="primary" {{ $setting->status == 1 ? 'checked' : '' }} />
                                        <label for="switch4"></label>
                                    </a>
                                </td>
                                @canany(['settings edit','settings delete'])
                                <td class="text-center">
                                    @can('settings edit')
                                    <a class="btn btn-primary" href={{ route('backend.settings.edit',['setting'=>$setting->id]) }}>
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    @endcan
                                    @can('settings delete')
                                    <a class="btn btn-danger" href="{{ route('backend.delSetting',['id'=>$setting->id]) }}">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                    @endcan
                                </td>
                                @endcan
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('backend/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('backend/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('backend/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('backend/libs/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('backend/libs/pdfmake/build/pdfmake.min.js') }}"></script>
<script src="{{ asset('backend/libs/pdfmake/build/vfs_fonts.js') }}"></script>
<script src="{{ asset('backend/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('backend/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('backend/libs/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('backend/libs/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
<script src="{{ asset('backend/libs/datatables.net-select/js/dataTables.select.min.js') }}"></script>
<script src="{{ asset('backend/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('backend/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('backend/js/pages/datatables.init.js') }}"></script>
@endsection
