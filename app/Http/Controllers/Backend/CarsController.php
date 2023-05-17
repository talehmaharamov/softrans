<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Helpers\CRUDHelper;
use App\Models\Cars;
use App\Models\CarsTranslation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarsController extends Controller
{
    public function index()
    {
        check_permission('cars index');
        $cars = Cars::all();
        return view('backend.cars.index', get_defined_vars());
    }

    public function create()
    {
        check_permission('cars create');
        return view('backend.cars.create');
    }

    public function store(Request $request)
    {
        try {
            $car = new Cars();
            $car->photo = upload('cars', $request->file('photo'));
            $car->save();
            foreach (active_langs() as $lang) {
                $carTranslation = new CarsTranslation();
                $carTranslation->locale = $lang->code;
                $carTranslation->car_id = $car->id;
                $carTranslation->name = $request->name[$lang->code];
                $carTranslation->description = $request->description[$lang->code];
                $carTranslation->save();
            }
            alert()->success(__('messages.success'));
            return redirect(route('backend.cars.index'));
        } catch (\Exception $e) {
            alert()->error(__('messages.error'));
            return redirect(route('backend.cars.index'));
        }
    }

    public function edit(string $id)
    {
        check_permission('cars edit');
        $car = Cars::find($id);
        return view('backend.cars.edit', get_defined_vars());
    }

    public function update(Request $request, string $id)
    {
        check_permission('cars edit');
        try {
            $car = Cars::find($id);
            DB::transaction(function () use ($request, $car) {
                if ($request->hasFile('photo')) {
                    if (file_exists($car->photo)) {
                        $car->photo = upload('cars', $request->file('photo'));
                    }
                }
                foreach (active_langs() as $lang) {
                    $car->translate($lang->code)->name = $request->name[$lang->code];
                    $car->translate($lang->code)->description = $request->description[$lang->code];
                }
                $car->save();
            });
            alert()->success(__('messages.success'));
            return redirect(route('backend.cars.index'));
        } catch (\Exception $e) {
            alert()->error(__('messages.error'));
            return redirect(route('backend.cars.index'));
        }
    }

    public function delete(string $id)
    {
        check_permission('partners delete');
        return CRUDHelper::remove_item('\App\Models\Cars', $id);
    }

    public function status(string $id)
    {
        check_permission('partners edit');
        return CRUDHelper::status('\App\Models\Cars', $id);
    }
}
