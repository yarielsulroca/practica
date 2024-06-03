<?php

namespace App\Http\Controllers;

use App\Models\Part;
use Illuminate\Http\Request;

/**
 * Class PartController
 * @package App\Http\Controllers
 */
class PartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parts = Part::paginate(10);

        return view('part.index', compact('parts'))
            ->with('i', (request()->input('page', 1) - 1) * $parts->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $part = new Part();
        return view('part.create', compact('part'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Part::$rules);

        $part = Part::create($request->all());

        return redirect()->route('parts.index')
            ->with('success', 'Part created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $part = Part::find($id);

        return view('part.show', compact('part'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $part = Part::find($id);

        return view('part.edit', compact('part'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Part $part
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Part $part)
    {
        request()->validate(Part::$rules);

        $part->update($request->all());

        return redirect()->route('parts.index')
            ->with('success', 'Part updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $part = Part::find($id)->delete();

        return redirect()->route('parts.index')
            ->with('success', 'Part deleted successfully');
    }
}
