@extends('master.backend')
@section('title',__('backend.slider'))
@section('content')
    <div class="row justify-content-center">
        <div class="col-xl-8">
            <div class="card">
                <div class="card-body">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">@lang('backend.slider'): #{{ $slider->id }}</h4>
                        </div>
                    </div>
                    <form action="{{ route('backend.slider.update',$slider->id) }}" method="POST"
                          class="needs-validation" novalidate="" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label>@lang('backend.photo'):</label>
                            <div>
                                <img width="100%" height="auto" src="{{ asset($slider->photo) }}">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label>@lang('backend.photo')</label>
                            <input type="file" name="photo" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>@lang('backend.alt') <span class="text-danger">*</span></label>
                            <input type="text" name="alt" class="form-control"  value="{{ $slider->alt }}">
                        </div>
                        <div class="mb-3">
                            <label>@lang('backend.page') <span class="text-danger">*</span></label>
                            <select class="form-control" name="page">
                                <option @if($slider->page == "index") selected @endif value="index">@lang('backend.home-page')</option>
                                <option @if($slider->page == "contact") selected @endif value="contact">@lang('backend.contact-us')</option>
                                <option @if($slider->page == "about") selected @endif value="about">@lang('backend.about')</option>
                            </select>
                        </div>
                        @include('backend.templates.components.buttons')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
