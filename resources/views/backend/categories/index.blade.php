@extends('master.backend')
@section('title',__('backend.categories'))
@section('styles')
    @include('backend.templates.components.dt-styles')
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">@lang('backend.categories'):</h4>
                    <a href="{{ route('backend.categories.create') }}" class="btn btn-primary mb-3"><i
                            class="fas fa-plus"></i> &nbsp;@lang('backend.add-new')
                    </a>
                </div>
            </div>
            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                   style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>@lang('backend.slug'):</th>
                    <th>@lang('backend.time'):</th>
                    <th>@lang('backend.actions'):</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->slug }}</td>
                        <td>{{ date('d.m.Y H:i:s',strtotime($category->created_at)) }}</td>
{{--                       @include('backend.templates.components.dt-settings')--}}
                        <td class="text-center">
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-cog"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <a href="{{ route('backend.categoryStatus',['id'=>$category->id]) }}"
                                           title="@lang('backend.status')">
                                            <input type="checkbox" id="switch"
                                                   switch="primary" {{ $category->status == 1 ? 'checked' : '' }} />
                                            <label for="switch4"></label>
                                        </a>
                                    </div>
                                    <a class="dropdown-item" href="{{ route('backend.categories.edit',['category'=>$category->id]) }}">@lang('backend.edit')</a>
                                    <a class="dropdown-item "
                                       href="{{ route('backend.delCategory',['id'=>$category->id]) }}">@lang('backend.delete')</a>
                                </div>
                            </div>
                        </td>

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
