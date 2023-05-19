<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Helpers\CRUDHelper;
use App\Models\Director;
use App\Models\DirectorTranslation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DirectorController extends Controller
{
    public function index()
    {
        check_permission('director index');
        $directors = Director::all();
        return view('backend.director.index', get_defined_vars());
    }

    public function create()
    {
        check_permission('director create');
        return view('backend.director.create');
    }

    public function store(Request $request)
    {
        check_permission('director create');
        try {
            $director = new Director();
            $director->photo = upload('director', $request->file('photo'));
            $director->save();
            foreach (active_langs() as $lang) {
                $dt = new DirectorTranslation();
                $dt->locale = $lang->code;
                $dt->director_id = $director->id;
                $dt->name = $request->name[$lang->code];
                $dt->description = $request->description[$lang->code];
                $dt->about = $request->about[$lang->code];
                $dt->save();
            }
            alert()->success(__('messages.success'));
            return redirect(route('backend.director.index'));
        } catch (\Exception $e) {
            alert()->error(__('messages.error'));
            return redirect(route('backend.director.index'));
        }
    }

    public function edit(string $id)
    {
        check_permission('director edit');
        $director = Director::find($id);
        return view('backend.director.edit', get_defined_vars());
    }

    public function update(Request $request, string $id)
    {
        check_permission('director edit');
        try {
            $director = Director::find($id);
            DB::transaction(function () use ($request, $director) {
                if ($request->hasFile('photo')) {
                    if (file_exists($director->photo)) {
                        unlink(public_path($director->photo));
                    }
                    $director->photo = upload('director', $request->file('photo'));
                }
                foreach (active_langs() as $lang) {
                    $director->translate($lang->code)->name = $request->name[$lang->code];
                    $director->translate($lang->code)->description = $request->description[$lang->code];
                    $director->translate($lang->code)->about = $request->about[$lang->code];
                }
                $director->save();
            });
            alert()->success(__('messages.success'));
            return redirect(route('backend.director.index'));
        } catch (\Exception $e) {
            alert()->error(__('messages.error'));
            return redirect(route('backend.director.index'));
        }
    }

    public function status(string $id)
    {
        check_permission('director edit');
        return CRUDHelper::status('\App\Models\Director', $id);
    }

    public function delete(string $id)
    {
        check_permission('director delete');
        return CRUDHelper::remove_item('\App\Models\Director', $id);
    }
}
