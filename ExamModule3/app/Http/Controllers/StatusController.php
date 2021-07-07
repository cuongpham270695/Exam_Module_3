<?php

namespace App\Http\Controllers;

use App\Http\Services\StatusService;
use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    protected $statusService;
    public function __construct(StatusService $statusService)
    {
        $this->statusService = $statusService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $statuses = $this->statusService->getAll();
        return view('status.list',compact('statuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('status.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->statusService->store($request);
        return redirect()->route('status.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function show(Status $status)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $status = $this->statusService->getById($id);
        return view('status.edit',compact('status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Status  $statuses
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $this->statusService->update($request);
        return redirect()->route('status.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Status  $statuses
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $this->statusService->delete($id);
        return redirect()->route('status.list');
    }
}
