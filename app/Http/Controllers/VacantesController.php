<?php

namespace App\Http\Controllers;

use App\Models\Vacantes;
use Illuminate\Http\Request;

class VacantesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
    public function index()
    {
        $vacantes = Vacantes::where('user_id',auth()->user()->id)->paginate(5);
        return view('vacantes.index', compact('vacantes'));
    }

    public function create()
    {
        return view('vacantes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
