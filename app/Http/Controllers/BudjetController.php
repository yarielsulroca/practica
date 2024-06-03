<?php

namespace App\Http\Controllers;

use App\Models\Budjet;
use Illuminate\Http\Request;

/**
 * Class BudjetController
 * @package App\Http\Controllers
 */
class BudjetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $budjets = Budjet::paginate(10);

        return view('budjet.index', compact('budjets'))
            ->with('i', (request()->input('page', 1) - 1) * $budjets->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $budjet = new Budjet();
        return view('budjet.create', compact('budjet'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Budjet::$rules);

        $budjet = Budjet::create($request->all());

        return redirect()->route('budjets.index')
            ->with('success', 'Budjet created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $budjet = Budjet::find($id);

        return view('budjet.show', compact('budjet'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $budjet = Budjet::find($id);

        return view('budjet.edit', compact('budjet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Budjet $budjet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Budjet $budjet)
    {
        request()->validate(Budjet::$rules);

        $budjet->update($request->all());

        return redirect()->route('budjets.index')
            ->with('success', 'Budjet updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $budjet = Budjet::find($id)->delete();

        return redirect()->route('budjets.index')
            ->with('success', 'Budjet deleted successfully');
    }
}
