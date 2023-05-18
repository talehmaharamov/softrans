@extends('master.backend')
@section('title',__('backend.partners'))
@section('content')
    <div class="row justify-content-center">
        <div class="col-xl-9">
            <div class="card">
                <form action="{{ route('backend.partners.update',$id) }}" class="needs-validation" novalidate
                      method="post"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        @include('backend.templates.components.card-col-12',['variable' => 'partners'])
                        <div class="mb-3">
                            <label>@lang('backend.photo')<span class="text-danger">*</span></label>
                            <input name="photo" type="file" class="form-control" required>
                            @if(file_exists($partner->photo))
                                <img src="{{ asset($partner->photo) }}" class="form-control mt-2" width="100%">
                            @endif
                            {!! validation_response('backend.photo') !!}
                        </div>
                        <div class="mb-3">
                            <label>@lang('backend.link')</label>
                            <input name="link" type="text" class="form-control" value="{{ $partner->link }}">
                        </div>
                    </div>
                    @include('backend.templates.components.buttons')
                </form>
            </div>
        </div>
    </div>
@endsection
