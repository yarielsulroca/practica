<?php

namespace App\Http\Controllers;

use App\Models\Workorder;
use Illuminate\Http\Request;

/**
 * Class WorkorderController
 * @package App\Http\Controllers
 */
class WorkorderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workorders = Workorder::paginate(10);

        return view('workorder.index', compact('workorders'))
            ->with('i', (request()->input('page', 1) - 1) * $workorders->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $workorder = new Workorder();
        return view('workorder.create', compact('workorder'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Workorder::$rules);

        $workorder = Workorder::create($request->all());

        return redirect()->route('workorders.index')
            ->with('success', 'Workorder created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $workorder = Workorder::find($id);

        return view('workorder.show', compact('workorder'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $workorder = Workorder::find($id);

        return view('workorder.edit', compact('workorder'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Workorder $workorder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Workorder $workorder)
    {
        request()->validate(Workorder::$rules);

        $workorder->update($request->all());

        return redirect()->route('workorders.index')
            ->with('success', 'Workorder updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $workorder = Workorder::find($id)->delete();

        return redirect()->route('workorders.index')
            ->with('success', 'Workorder deleted successfully');
    }
}
