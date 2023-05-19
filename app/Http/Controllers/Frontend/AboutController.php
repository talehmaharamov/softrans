<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Cars;
use App\Models\Director;
use App\Models\Forigner;
use App\Models\Slider;
use App\Models\WhyGefen;

class AboutController extends Controller
{
    public function index()
    {
        $abouts = About::where('status', 1)->get();
        $cars = Cars::where('status', 1)->get();
        $sliders = Slider::where('page', 'about')->where('status', 1)->get();
        $sliderTitle = settings('sliderTitleAbout_' . app()->getLocale());
        $sliderDescription = settings('sliderDescriptionAbout_' . app()->getLocale());
        return view('frontend.about.index', get_defined_vars());
    }
}
