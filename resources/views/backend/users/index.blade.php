@extends('master.backend')
@section('title',__('backend.users'))
@section('styles')
    @include('backend.templates.components.dt-styles')

@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">@lang('backend.users'):</h4>
                    @can('users create')
                        <a href="{{ route('backend.users.create') }}"
                           class="btn btn-primary"><i class="fas fa-plus"></i>
                            &nbsp;@lang('backend.add-new')
                        </a>
                    @endcan
                </div>
            </div>
            <table id="datatable-buttons"
                   class="table table-striped table-bordered dt-responsive nowrap"
                   style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>@lang('backend.name'):</th>
                    <th>@lang('backend.email'):</th>
                    <th>@lang('backend.time')</th>
                    @can('users delete')
                        <th>@lang('backend.actions'):</th>
                    @endcan
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td class="text-center">{{ $user->id }}</td>
                        <td class="text-center">{{ $user->name }}</td>
                        <td class="text-center">{{ $user->email }}</td>
                        <td>{{ date('d.m.Y H:i:s',strtotime($user->created_at))}}</td>
                        <td class="text-center">
                            <a class="btn btn-primary"
                               title="@lang('backend.give-permission')"
                               href="{{ route('backend.giveUserPermission',['user'=>$user->id]) }}">
                                <i class="fas fa-key"></i>
                            </a>
                            @if($user->id != auth()->user()->id)
                                <a class="btn btn-danger" title="@lang('backend.delete')"
                                   href="{{ route('backend.delAdmin',['id'=>$user->id]) }}">
                                    <i class="fas fa-trash"></i>
                                </a>
                            @else
                                <a class="btn btn-secondary"
                                   title="@lang('backend.dont-delete-own-profile')">
                                    <i class="fas fa-trash"></i>
                                </a>
                            @endif
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
