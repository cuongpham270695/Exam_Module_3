<?php

namespace App\Http\Controllers;

use App\Http\Services\AgencyService;
use App\Http\Services\StatusService;
use App\Models\Agency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AgencyController extends Controller
{
    protected $agencySv;
    protected $statusSv;

    public function __construct(AgencyService $agencyService, StatusService $statusService)
    {
        $this->agencySv = $agencyService;
        $this->statusSv = $statusService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $agencies = $this->agencySv->getAll();
        $statuses = $this->statusSv->getAll();
        return view('agencies.list', compact('agencies','statuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $statuses = $this->statusSv->getAll();
        return view('agencies.create',compact('statuses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->agencySv->store($request);
        Session::flash('success','Create success');
        return redirect()->route('agencies.list');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Agency $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Agency $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $agency = $this->agencySv->getById($id);
        $statuses = $this->statusSv->getAll();
        return view('agencies.edit', compact('agency','statuses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Agency $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $this->agencySv->update($request);
        Session::flash('success','Update agencies success');
        return redirect()->route('agencies.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Agency $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $this->agencySv->delete($id);
        return redirect()->route('agencies.list')->with('error', 'Xóa đại lý thành công');
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        if (!$keyword) {
            return redirect()->route('agencies.list');
        }
        $statuses = $this->statusSv->getAll();
        $agency = Agency::where('name', 'LIKE', '%' . $keyword . '%')->paginate(5);
        return view('agencies.list', compact('agency','statuses'));
    }

}
