<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Area;
use Illuminate\Http\Request;
use Session;

class AreasController extends Controller
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
            $areas = Area::where('name', 'LIKE', "%$keyword%")
				->orWhere('region_id', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $areas = Area::paginate($perPage);
        }

        return view('admin.areas.index', compact('areas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.areas.create');
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
			'name' => 'required',
			'region_id' => 'required'
		]);
        $requestData = $request->all();
        
        Area::create($requestData);

        Session::flash('flash_message', 'Area added!');

        return redirect('admin/areas');
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
        $area = Area::findOrFail($id);

        return view('admin.areas.show', compact('area'));
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
        $area = Area::findOrFail($id);

        return view('admin.areas.edit', compact('area'));
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
			'name' => 'required',
			'region_id' => 'required'
		]);
        $requestData = $request->all();
        
        $area = Area::findOrFail($id);
        $area->update($requestData);

        Session::flash('flash_message', 'Area updated!');

        return redirect('admin/areas');
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
        Area::destroy($id);

        Session::flash('flash_message', 'Area deleted!');

        return redirect('admin/areas');
    }

    public function moveUp(Area $area)
    {
        $area->moveOrderUp();
        return redirect()->back();
    }

    public function moveDown(Area $area)
    {
        $area->moveOrderDown();
        return redirect()->back();
    }

    public function moveToStart(Area $area)
    {
        $area->moveToStart();
        return redirect()->back();
    }

    public function moveToEnd(Area $area)
    {
        $area->moveToEnd();
        return redirect()->back();
    }
}
