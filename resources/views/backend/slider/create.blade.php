@extends('master.backend')
@section('title',__('backend.slider'))
@section('content')
    <div class="row justify-content-center">
        <div class="col-xl-8">
            <div class="card">
                <div class="card-body">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">@lang('backend.slider'): @lang('backend.add-new')</h4>
                        </div>
                    </div>
                    <form action="{{ route('backend.slider.store') }}" method="POST" class="needs-validation" novalidate
                          enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label>@lang('backend.photo') <span class="text-danger">*</span></label>
                            <input type="file" name="photo" class="form-control" required="" id="validationCustom">
                            {!! validation_response('backend.photo') !!}
                        </div>
                        <div class="mb-3">
                            <label>@lang('backend.alt') <span class="text-danger">*</span></label>
                            <input type="text" name="alt" class="form-control" id="validationCustom"
                                   placeholder="@lang('backend.alt')">
                        </div>
                        <div class="mb-3">
                            <label>@lang('backend.page') <span class="text-danger">*</span></label>
                           <select class="form-control" name="page">
                               <option value="index">@lang('backend.home-page')</option>
                               <option value="contact">@lang('backend.contact-us')</option>
                               <option value="about">@lang('backend.about')</option>
                           </select>
                        </div>
                        @include('backend.templates.components.buttons')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
