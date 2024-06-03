<?php

namespace App\Http\Controllers;

use App\Models\Waranty;
use Illuminate\Http\Request;

/**
 * Class WarantyController
 * @package App\Http\Controllers
 */
class WarantyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $waranties = Waranty::paginate(10);

        return view('waranty.index', compact('waranties'))
            ->with('i', (request()->input('page', 1) - 1) * $waranties->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $waranty = new Waranty();
        return view('waranty.create', compact('waranty'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Waranty::$rules);

        $waranty = Waranty::create($request->all());

        return redirect()->route('waranties.index')
            ->with('success', 'Waranty created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $waranty = Waranty::find($id);

        return view('waranty.show', compact('waranty'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $waranty = Waranty::find($id);

        return view('waranty.edit', compact('waranty'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Waranty $waranty
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Waranty $waranty)
    {
        request()->validate(Waranty::$rules);

        $waranty->update($request->all());

        return redirect()->route('waranties.index')
            ->with('success', 'Waranty updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $waranty = Waranty::find($id)->delete();

        return redirect()->route('waranties.index')
            ->with('success', 'Waranty deleted successfully');
    }
}
