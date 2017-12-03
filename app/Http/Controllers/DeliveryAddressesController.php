<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DeliveryAddress;
use Auth;

class DeliveryAddressesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $deliveryaddresses = DeliveryAddress::own()->paginate();

        return view('delivery-addresses.index', compact('deliveryaddresses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('delivery-addresses.create');
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
			'area_id' => 'required|exists:areas,id',
			'address' => 'required|string',
		]);

        $requestData = $request->all();
        $requestData['user_id'] = Auth::id();
        
        DeliveryAddress::create($requestData);

        return redirect()->route('app.delivery-addresses.index')->withSuccess('Адресу створено');
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
        return view('delivery-addresses.edit', compact('deliveryaddress'));
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
			'area_id' => 'required|exists:areas,id',
			'address' => 'required|string',
		]);

        $requestData = $request->all();
        
        $deliveryaddress = DeliveryAddress::findOrFail($id);

        if($deliveryaddress->user_id != Auth::id())
    	{
    		return redirect()->back()->withError('Помилка доступу');
    	}

        $deliveryaddress->update($requestData);

        return redirect()->route('app.delivery-addresses.index')->withSuccess('Адресу збережено');
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
    	$deliveryaddress = DeliveryAddress::findOrFail($id);

    	if($deliveryaddress->user_id != Auth::id())
    	{
    		return redirect()->back()->withError('Помилка доступу');
    	}

        DeliveryAddress::destroy($id);

        return redirect()->route('app.delivery-addresses.index')->withSuccess('Адресу видалено');
    }

}
