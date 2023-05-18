@extends('master.backend')
@section('title',__('backend.cars'))
@section('content')
    <div class="row justify-content-center">
        <div class="col-xl-9">
            <div class="card">
                <form action="{{ route('backend.cars.store') }}" class="needs-validation" novalidate method="post"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        @include('backend.templates.components.card-col-12',['variable' => 'cars'])
                        @include('backend.templates.components.multi-lan-tab')
                        <div class="tab-content p-3 text-muted">
                            @foreach(active_langs() as $lan)
                                <div class="tab-pane @if($loop->first) active show @endif" id="{{ $lan->code }}"
                                     role="tabpanel">
                                    <div class="form-group row">
                                        <div class="mb-3">
                                            <label>@lang('backend.name') <span class="text-danger">*</span></label>
                                            <input name="name[{{ $lan->code }}]" type="text" class="form-control"
                                                   required="" placeholder="@lang('backend.name')">
                                            {!! validation_response('backend.name') !!}
                                        </div>
                                        <div class="mb-3">
                                            <label>@lang('backend.description') <span class="text-danger">*</span></label>
                                            <textarea id="elm{{ $lan->code }}1" name="description[{{ $lan->code }}]" type="text" class="form-control"
                                                      required="" placeholder="@lang('backend.description')"></textarea>
                                            {!! validation_response('backend.description') !!}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="mb-3">
                                <label>@lang('backend.photo') <span class="text-danger">*</span></label>
                                <input name="photo" type="file" class="form-control" required>
                                {!! validation_response('backend.photo') !!}
                            </div>
                        </div>
                    </div>
                    @include('backend.templates.components.buttons')
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @include('backend.templates.components.tiny')
@endsection
