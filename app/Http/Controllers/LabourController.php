<?php

namespace App\Http\Controllers;

use App\Models\Labour;
use Illuminate\Http\Request;

/**
 * Class LabourController
 * @package App\Http\Controllers
 */
class LabourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $labours = Labour::paginate(10);

        return view('labour.index', compact('labours'))
            ->with('i', (request()->input('page', 1) - 1) * $labours->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $labour = new Labour();
        return view('labour.create', compact('labour'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Labour::$rules);

        $labour = Labour::create($request->all());

        return redirect()->route('labours.index')
            ->with('success', 'Labour created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $labour = Labour::find($id);

        return view('labour.show', compact('labour'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $labour = Labour::find($id);

        return view('labour.edit', compact('labour'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Labour $labour
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Labour $labour)
    {
        request()->validate(Labour::$rules);

        $labour->update($request->all());

        return redirect()->route('labours.index')
            ->with('success', 'Labour updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $labour = Labour::find($id)->delete();

        return redirect()->route('labours.index')
            ->with('success', 'Labour deleted successfully');
    }
}
