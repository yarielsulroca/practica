<?php

namespace App\Http\Controllers;

use App\Models\Typeorder;
use Illuminate\Http\Request;

/**
 * Class TypeorderController
 * @package App\Http\Controllers
 */
class TypeorderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typeorders = Typeorder::paginate(10);

        return view('typeorder.index', compact('typeorders'))
            ->with('i', (request()->input('page', 1) - 1) * $typeorders->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $typeorder = new Typeorder();
        return view('typeorder.create', compact('typeorder'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Typeorder::$rules);

        $typeorder = Typeorder::create($request->all());

        return redirect()->route('typeorders.index')
            ->with('success', 'Typeorder created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $typeorder = Typeorder::find($id);

        return view('typeorder.show', compact('typeorder'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $typeorder = Typeorder::find($id);

        return view('typeorder.edit', compact('typeorder'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Typeorder $typeorder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Typeorder $typeorder)
    {
        request()->validate(Typeorder::$rules);

        $typeorder->update($request->all());

        return redirect()->route('typeorders.index')
            ->with('success', 'Typeorder updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $typeorder = Typeorder::find($id)->delete();

        return redirect()->route('typeorders.index')
            ->with('success', 'Typeorder deleted successfully');
    }
}
