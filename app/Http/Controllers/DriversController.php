<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Driver;

class DriversController extends Controller
{
    public function list()
    {
        return view('drivers.list', [
            'drivers' => Driver::all()
        ]);
    }

    public function addForm()
    {
        return view('drivers.add');
    }

    public function add()
    {
        $attributes = request()->validate([
            'title' => 'required',
            'first' => 'required',
            'last' => 'required',
            'vehicle' => 'required',
        ]);

        $driver = new Driver();
        $driver->title = $attributes['title'];
        $driver->first = $attributes['first'];
        $driver->last = $attributes['last'];
        $driver->vehicle = $attributes['vehicle'];
        $driver->save();
        return redirect('/console/drivers/list')->with('message', 'Driver has been added.');
    }

    public function delete(Driver $driver)
    {
        $driver->delete();

        return redirect('/console/drivers/list')->with('message', 'Driver has been deleted!');
    }

    public function editForm(Driver $driver)
    {
        return view('drivers.edit', [
            'driver' => $driver
        ]);
    }

    public function edit(Driver $driver)
    {
        $attributes = request()->validate([
            'title' => 'required',
            'first' => 'required',
            'last' => 'required',
            'vehicle' => 'required',
        ]);

        $driver->title = $attributes['title'];
        $driver->first = $attributes['first'];
        $driver->last = $attributes['last'];
        $driver->vehicle = $attributes['vehicle'];
        $driver->save();

        return redirect('/console/drivers/list')->with('message', 'Driver successfully updated');
    }
}
