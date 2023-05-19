<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Helpers\CRUDHelper;
use App\Models\Who;
use App\Models\WhoTranslation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WhoController extends Controller
{
    public function index()
    {
        check_permission('who index');
        $whos = Who::all();
        return view('backend.who.index', get_defined_vars());
    }

    public function create()
    {
        check_permission('who create');
        return view('backend.who.create');
    }

    public function store(Request $request)
    {
        check_permission('who create');
        try {
            $who = new Who();
            $who->photo = upload('who', $request->file('photo'));
            $who->save();
            foreach (active_langs() as $lang) {
                $dt = new WhoTranslation();
                $dt->locale = $lang->code;
                $dt->who_id = $who->id;
                $dt->description = $request->description[$lang->code];
                $dt->save();
            }
            alert()->success(__('messages.success'));
            return redirect(route('backend.who.index'));
        } catch (\Exception $e) {
            alert()->error(__('messages.error'));
            return redirect(route('backend.who.index'));
        }
    }

    public function edit(string $id)
    {
        check_permission('who edit');
        $who = Who::find($id);
        return view('backend.who.edit', get_defined_vars());
    }

    public function update(Request $request, string $id)
    {
        check_permission('who edit');
        try {
            $who = Who::find($id);
            DB::transaction(function () use ($request, $who) {
                if ($request->hasFile('photo')) {
                    if (file_exists($who->photo)) {
                        unlink(public_path($who->photo));
                    }
                    $who->photo = upload('who', $request->file('photo'));
                }
                foreach (active_langs() as $lang) {
                    $who->translate($lang->code)->description = $request->description[$lang->code];
                }
                $who->save();
            });
            alert()->success(__('messages.success'));
            return redirect(route('backend.who.index'));
        } catch (\Exception $e) {
            alert()->error(__('messages.error'));
            return redirect(route('backend.who.index'));
        }
    }

    public function status(string $id)
    {
        check_permission('who edit');
        return CRUDHelper::status('\App\Models\Who', $id);
    }

    public function delete(string $id)
    {
        check_permission('who delete');
        return CRUDHelper::remove_item('\App\Models\Who', $id);
    }
}
