@extends('master.backend')
@section('title',__('backend.partners'))
@section('styles')
    @include('backend.templates.components.dt-styles')
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">@lang('backend.partners'):</h4>
                    <a href="{{ route('backend.partners.create') }}" class="btn btn-primary mb-3"><i
                            class="fas fa-plus"></i> &nbsp;@lang('backend.add-new')
                    </a>
                </div>
            </div>
            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                   style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>@lang('backend.photo'):</th>
                    <th>@lang('backend.actions'):</th>
                </tr>
                </thead>
                <tbody>
                @foreach($partners as $partner)
                    <tr>
                        <td>{{ $partner->id }}</td>
                        <td><img src="{{ asset($partner->photo) }}" style="width: 120px;height: 80px;"></td>
                        @include('backend.templates.components.dt-settings',['variable' => 'partners','value' => $partner])
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('scripts')
    @include('backend.templates.components.dt-scripts')
@endsection
