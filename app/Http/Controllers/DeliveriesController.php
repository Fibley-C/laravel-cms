<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Delivery;
use App\Models\Company;

class DeliveriesController extends Controller
{
    public function list()
    {
        return view('deliveries.list', [
            'deliveries' => Delivery::all()
        ]);
    }

    public function addForm()
    {
        return view('deliveries.add', [
            'company_id' => Company::all()
        ]);
    }

    public function add()
    {
        $attributes = request()->validate([
            'number' => 'required',
            'destination' => 'required',
            'company_id' => 'required',
        ]);
        
        $delivery = new Delivery();
        $delivery->number = $attributes['number'];
        $delivery->destination = $attributes['destination'];
        $delivery->company_id = $attributes['company_id'];
        $delivery->save();
        return redirect('/console/deliveries/list')->with('message', 'Delivery has been added.');
    }

    public function delete(Delivery $delivery)
    {
        $delivery->delete();

        return redirect('/console/deliveries/list')->with('message', 'Delivery has been deleted!');
    }

    public function editForm(Delivery $delivery)
    {
        return view('deliveries.edit', [
            'delivery' => $delivery,
            'company_id' => Company::all()
        ]);
    }

    public function edit(Delivery $delivery)
    {
        $attributes = request()->validate([
            'number' => 'required',
            'destination' => 'required',
            'company_id' => 'required',
        ]);

        $delivery->number = $attributes['number'];
        $delivery->destination = $attributes['destination'];
        $delivery->company_id = $attributes['company_id'];
        $delivery->save();

        return redirect('/console/deliveries/list')->with('message', 'Delivery successfully updated');
    }
}
