<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\DeliveryService;
use Illuminate\Http\Request;
use Session;

class DeliveryServicesController extends Controller
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
            $deliveryservices = DeliveryService::where('name', 'LIKE', "%$keyword%")
				->ordered()->paginate($perPage);
        } else {
            $deliveryservices = DeliveryService::ordered()->paginate($perPage);
        }

        return view('admin.delivery-services.index', compact('deliveryservices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.delivery-services.create');
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
			'name' => 'required'
		]);
        $requestData = $request->all();
        
        DeliveryService::create($requestData);

        Session::flash('flash_message', 'DeliveryService added!');

        return redirect('admin/delivery-services');
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
        $deliveryservice = DeliveryService::findOrFail($id);

        return view('admin.delivery-services.show', compact('deliveryservice'));
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
        $deliveryservice = DeliveryService::findOrFail($id);

        return view('admin.delivery-services.edit', compact('deliveryservice'));
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
			'name' => 'required'
		]);
        $requestData = $request->all();
        
        $deliveryservice = DeliveryService::findOrFail($id);
        $deliveryservice->update($requestData);

        Session::flash('flash_message', 'DeliveryService updated!');

        return redirect('admin/delivery-services');
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
        DeliveryService::destroy($id);

        Session::flash('flash_message', 'DeliveryService deleted!');

        return redirect('admin/delivery-services');
    }

    public function moveUp(DeliveryService $deliveryservice)
    {
        $deliveryservice->moveOrderUp();
        return redirect()->back();
    }

    public function moveDown(DeliveryService $deliveryservice)
    {
        $deliveryservice->moveOrderDown();
        return redirect()->back();
    }

    public function moveToStart(DeliveryService $deliveryservice)
    {
        $deliveryservice->moveToStart();
        return redirect()->back();
    }

    public function moveToEnd(DeliveryService $deliveryservice)
    {
        $deliveryservice->moveToEnd();
        return redirect()->back();
    }
}
