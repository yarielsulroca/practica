<?php

namespace App\Http\Controllers;

use App\Models\Component;
use Illuminate\Http\Request;

/**
 * Class ComponentController
 * @package App\Http\Controllers
 */
class ComponentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $components = Component::paginate(10);

        return view('component.index', compact('components'))
            ->with('i', (request()->input('page', 1) - 1) * $components->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $component = new Component();
        return view('component.create', compact('component'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Component::$rules);

        $component = Component::create($request->all());

        return redirect()->route('components.index')
            ->with('success', 'Component created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $component = Component::find($id);

        return view('component.show', compact('component'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $component = Component::find($id);

        return view('component.edit', compact('component'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Component $component
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Component $component)
    {
        request()->validate(Component::$rules);

        $component->update($request->all());

        return redirect()->route('components.index')
            ->with('success', 'Component updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $component = Component::find($id)->delete();

        return redirect()->route('components.index')
            ->with('success', 'Component deleted successfully');
    }
}
