<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\DeliveryAddress;
use Illuminate\Http\Request;
use Session;

class DeliveryAddressesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $deliveryaddresses = DeliveryAddress::where('user_id', 'LIKE', "%$keyword%")
				->orWhere('area_id', 'LIKE', "%$keyword%")
				->orWhere('address', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $deliveryaddresses = DeliveryAddress::paginate($perPage);
        }

        return view('admin.delivery-addresses.index', compact('deliveryaddresses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.delivery-addresses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'user_id' => 'required',
			'area_id' => 'required',
			'address' => 'required'
		]);
        $requestData = $request->all();
        
        DeliveryAddress::create($requestData);

        Session::flash('flash_message', 'DeliveryAddress added!');

        return redirect('admin/delivery-addresses');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $deliveryaddress = DeliveryAddress::findOrFail($id);

        return view('admin.delivery-addresses.show', compact('deliveryaddress'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $deliveryaddress = DeliveryAddress::findOrFail($id);

        return view('admin.delivery-addresses.edit', compact('deliveryaddress'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        $this->validate($request, [
			'user_id' => 'required',
			'area_id' => 'required',
			'address' => 'required'
		]);
        $requestData = $request->all();
        
        $deliveryaddress = DeliveryAddress::findOrFail($id);
        $deliveryaddress->update($requestData);

        Session::flash('flash_message', 'DeliveryAddress updated!');

        return redirect('admin/delivery-addresses');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        DeliveryAddress::destroy($id);

        Session::flash('flash_message', 'DeliveryAddress deleted!');

        return redirect('admin/delivery-addresses');
    }

    public function moveUp(DeliveryAddress $deliveryaddress)
    {
        $deliveryaddress->moveOrderUp();
        return redirect()->back();
    }

    public function moveDown(DeliveryAddress $deliveryaddress)
    {
        $deliveryaddress->moveOrderDown();
        return redirect()->back();
    }

    public function moveToStart(DeliveryAddress $deliveryaddress)
    {
        $deliveryaddress->moveToStart();
        return redirect()->back();
    }

    public function moveToEnd(DeliveryAddress $deliveryaddress)
    {
        $deliveryaddress->moveToEnd();
        return redirect()->back();
    }
}
