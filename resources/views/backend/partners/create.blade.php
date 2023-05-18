@extends('master.backend')
@section('title',__('backend.partners'))
@section('content')
    <div class="row justify-content-center">
        <div class="col-xl-9">
            <div class="card">
                <form action="{{ route('backend.partners.store') }}" class="needs-validation" novalidate method="post"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        @include('backend.templates.components.card-col-12',['variable' => 'partners'])
                        <div class="mb-3">
                            <label>@lang('backend.photo')<span class="text-danger">*</span></label>
                            <input name="photo" type="file" class="form-control" required>
                            {!! validation_response('backend.photo') !!}
                        </div>
                        <div class="mb-3">
                            <label>@lang('backend.link')</label>
                            <input name="link" type="text" class="form-control" placeholder="example.com">
                        </div>
                    </div>
                    @include('backend.templates.components.buttons')
                </form>
            </div>
        </div>
    </div>
@endsection
