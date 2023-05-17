<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Helpers\CRUDHelper;
use App\Models\Partners;
use Illuminate\Http\Request;

class PartnersController extends Controller
{
    public function index()
    {
        check_permission('partners index');
        $partners = Partners::all();
        return view('backend.partners.index', get_defined_vars());
    }

    public function create()
    {
        check_permission('partners create');
        return view('backend.partners.create');
    }

    public function store(Request $request)
    {
        check_permission('partners create');
        try {
            $partner = new Partners();
            $partner->link = $request->link;
            $partner->photo = upload('partners', $request->file('photo'));
            $partner->save();
            alert()->success(__('messages.success'));
            return redirect(route('backend.partners.index'));
        } catch (\Exception $e) {
            alert()->error(__('messages.error'));
            return redirect(route('backend.partners.index'));
        }
    }

    public function edit(string $id)
    {
        check_permission('partners edit');
        $partner = Partners::find($id);
        return view('backend.partners.edit', get_defined_vars());
    }

    public function update(Request $request, string $id)
    {
        check_permission('partners edit');
        try {
            $partner = Partners::find($id);
            $partner->link = $request->link;
            if ($request->hasFile('photo')) {
                if (file_exists($partner->photo)) {
                    unlink(public_path($partner->photo));
                }
                $partner->photo = upload('partners', $request->file('photo'));
            }
            $partner->save();
            alert()->success(__('messages.success'));
            return redirect(route('backend.partners.index'));
        } catch (\Exception $e) {
            alert()->error(__('messages.error'));
            return redirect(route('backend.partners.index'));
        }
    }

    public function delete(string $id)
    {
        check_permission('partners delete');
        return CRUDHelper::remove_item('\App\Models\Partners', $id);
    }

    public function status(string $id)
    {
        check_permission('partners edit');
        return CRUDHelper::status('\App\Models\Partners', $id);
    }
}
