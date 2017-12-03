<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Status;
use Illuminate\Http\Request;
use Session;

class StatusesController extends Controller
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
            $statuses = Status::where('name', 'LIKE', "%$keyword%")
				->ordered()->paginate($perPage);
        } else {
            $statuses = Status::ordered()->paginate($perPage);
        }

        return view('admin.statuses.index', compact('statuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.statuses.create');
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
        
        Status::create($requestData);

        Session::flash('flash_message', 'Status added!');

        return redirect('admin/statuses');
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
        $status = Status::findOrFail($id);

        return view('admin.statuses.show', compact('status'));
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
        $status = Status::findOrFail($id);

        return view('admin.statuses.edit', compact('status'));
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
        
        $status = Status::findOrFail($id);
        $status->update($requestData);

        Session::flash('flash_message', 'Status updated!');

        return redirect('admin/statuses');
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
        Status::destroy($id);

        Session::flash('flash_message', 'Status deleted!');

        return redirect('admin/statuses');
    }

    public function moveUp(Status $status)
    {
        $status->moveOrderUp();
        return redirect()->back();
    }

    public function moveDown(Status $status)
    {
        $status->moveOrderDown();
        return redirect()->back();
    }

    public function moveToStart(Status $status)
    {
        $status->moveToStart();
        return redirect()->back();
    }

    public function moveToEnd(Status $status)
    {
        $status->moveToEnd();
        return redirect()->back();
    }
}
