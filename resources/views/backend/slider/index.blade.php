@extends('master.backend')
@section('title',__('backend.slider'))
@section('styles')
    @include('backend.templates.components.dt-styles')
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">@lang('backend.slider'):</h4>
                    <a href="{{ route('backend.slider.create')}}" class="btn btn-primary mb-3"><i
                            class="fas fa-plus"></i>
                        &nbsp;@lang('backend.add-new')
                    </a>
                </div>
            </div>
            <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap"
                   style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Order:</th>
                    <th>@lang('backend.photo'):</th>
                    <th>@lang('backend.alt'):</th>
                    <th>@lang('backend.time'):</th>
                    <th>@lang('backend.status'):</th>
                    <th>@lang('backend.actions'):</th>
                </tr>
                </thead>
                <tbody>
                @foreach($sliders as $slider)
                    <tr>
                        <td class="text-center">{{ $slider->id }}</td>
                        <td class="text-center">{{ $slider->order }}</td>
                        <td class="text-center"><img src="{{ asset($slider->photo) }}" width="100" height="50">
                        <td class="text-center">{{ $slider->alt }}</td>
                        <td>{{ date('d.m.Y H:i:s',strtotime($slider->created_at))}}</td>
                        <td class="text-center">
                            <a href="{{ route('backend.sliderStatus',['id'=>$slider->id]) }}"
                               title="@lang('backend.status')">
                                <input type="checkbox" id="switch"
                                       switch="primary" {{ $slider->status == 1 ? 'checked' : '' }} />
                                <label for="switch4"></label>
                            </a>
                        </td>
                        <td class="text-center">
                            @if(count(\App\Models\Slider::all()) >1)
                                <a class="btn btn-primary"
                                   href={{ route('backend.sliderOrder',['id'=>$slider->id,'direction' => 'down']) }}>
                                    <i class="fas fa-arrow-@if($slider->order !=  \App\Models\Slider::orderBy('order','desc')->first()->order)down @elseif($slider->order ==  \App\Models\Slider::orderBy('order','desc')->first()->order)up @endif"></i>
                                </a>
                                @if($slider->order !=  \App\Models\Slider::orderBy('order','desc')->first()->order and $slider->order !=  \App\Models\Slider::orderBy('order','asc')->first()->order)
                                    <a class="btn btn-primary"
                                       href={{ route('backend.sliderOrder',['id'=>$slider->id,'direction' => 'up']) }}>
                                        <i class="fas fa-arrow-up"></i>
                                    </a>
                                @endif
                            @endif
                            <a class="btn btn-primary"
                               href={{ route('backend.slider.edit',['slider'=>$slider->id]) }}>
                                <i class="fas fa-edit"></i>
                            </a>
                            <a class="btn btn-danger"
                               href="{{ route('backend.delSlider',['id'=>$slider->id]) }}">
                                <i class="fas fa-trash"></i>
                            </a>
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
