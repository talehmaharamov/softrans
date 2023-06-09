<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Paylasim;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index($slug)
    {
        if($category = Category::where('slug', $slug)->first()){
            $category = Category::where('slug', $slug)->first();
            return view('frontend.posts.all', get_defined_vars());
        }
        else{
            abort(404);
        }

    }
}
