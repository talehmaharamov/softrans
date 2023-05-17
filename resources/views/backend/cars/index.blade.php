@extends('master.backend')
@section('title',__('backend.cars'))
@section('styles')
    @include('backend.templates.components.dt-styles')
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">@lang('backend.cars'):</h4>
                    <a href="{{ route('backend.cars.create') }}" class="btn btn-primary mb-3"><i
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
                    <th>@lang('backend.name'):</th>
                    <th>@lang('backend.actions'):</th>
                </tr>
                </thead>
                <tbody>
                @foreach($cars as $car)
                    <tr>
                        <td>{{ $car->id }}</td>
                        <td><img style="width: 150px;height: 110px;" class="form-control"
                                 src="{{ asset($car->photo) }}">{{ $car->id }}</td>
                        <td>{{ $car->translate(app()->getLocale())->name ?? '-' }}</td>
                        @include('backend.templates.components.dt-settings',['variable' => 'cars','value' => $car])
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
