<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Region;
use Illuminate\Http\Request;
use Session;

class RegionsController extends Controller
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
            $regions = Region::where('name', 'LIKE', "%$keyword%")
				->ordered()->paginate($perPage);
        } else {
            $regions = Region::ordered()->paginate($perPage);
        }

        return view('admin.regions.index', compact('regions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.regions.create');
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
        
        Region::create($requestData);

        Session::flash('flash_message', 'Region added!');

        return redirect('admin/regions');
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
        $region = Region::findOrFail($id);

        return view('admin.regions.show', compact('region'));
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
        $region = Region::findOrFail($id);

        return view('admin.regions.edit', compact('region'));
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
        
        $region = Region::findOrFail($id);
        $region->update($requestData);

        Session::flash('flash_message', 'Region updated!');

        return redirect('admin/regions');
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
        Region::destroy($id);

        Session::flash('flash_message', 'Region deleted!');

        return redirect('admin/regions');
    }

    public function moveUp(Region $region)
    {
        $region->moveOrderUp();
        return redirect()->back();
    }

    public function moveDown(Region $region)
    {
        $region->moveOrderDown();
        return redirect()->back();
    }

    public function moveToStart(Region $region)
    {
        $region->moveToStart();
        return redirect()->back();
    }

    public function moveToEnd(Region $region)
    {
        $region->moveToEnd();
        return redirect()->back();
    }
}
