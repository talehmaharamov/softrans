<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Helpers\CRUDHelper;
use App\Models\About;
use App\Models\AboutTranslation;
use App\Models\WhyGefen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class AboutController extends Controller
{
    public function index()
    {
        check_permission('about index');
        $abouts = About::all();
        return view('backend.about.index', get_defined_vars());
    }

    public function create()
    {
        check_permission('about create');
        return view('backend.about.create');
    }

    public function store(Request $request)
    {
        check_permission('about create');
        try {
            $about = new About();
            $about->photo = upload('about', $request->file('photo'));
            $about->save();
            foreach (active_langs() as $lang) {
                $at = new AboutTranslation();
                $at->locale = $lang->code;
                $at->about_id = $about->id;
                $at->description = $request->description[$lang->code];
                $at->save();
            }
            alert()->success(__('messages.success'));
            return redirect(route('backend.about.index'));
        } catch (\Exception $e) {
            alert()->error(__('messages.error'));
            return redirect(route('backend.about.index'));
        }
    }

    public function update(Request $request, About $about)
    {
        check_permission('about edit');
        try {
            DB::transaction(function () use ($request, $about) {
                foreach (active_langs() as $lang) {
                    $about->translate($lang->code)->description = $request->description[$lang->code];
                }
                $about->save();
            });
            alert()->success(__('messages.success'));
            return redirect(route('backend.about.index'));
        } catch (\Exception $e) {
            alert()->error(__('messages.error'));
            return redirect(route('backend.about.index'));
        }
    }

    public function delete($id)
    {
        check_permission('about delete');
        return CRUDHelper::remove_item('\App\Models\About', $id);
    }

    public function status($id)
    {
        check_permission('about edit');
        return CRUDHelper::status('\App\Models\About', $id);
    }
}
