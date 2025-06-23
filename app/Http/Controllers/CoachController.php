<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coach;
use Illuminate\Validation\Rule;

class CoachController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coaches = Coach::all();

        return view('coaches.index', compact('coaches'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('coaches.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:coaches,email',
            'password' => 'required|string|min:6',
        ]);


        Coach::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('coaches.index')->with('success', 'Coach creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Coach $coach)
    {
        return view('coaches.show', compact('coach'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Coach $coach)
    {
        return view('coaches.edit', compact('coach'));
    }

    public function update(Request $request, Coach $coach)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => [
                    'required',
                    'email',
                    Rule::unique('coaches')->ignore($coach->id),],
            'password' => 'nullable|string|min:6',
        ]);

        $coach->name = $request->name;
        $coach->email = $request->email;
        if ($request->filled('password')) {
            $coach->password = bcrypt($request->password);
        }
        $coach->save();

        return redirect()->route('coaches.index')->with('success', 'Coach actualizado correctamente');
    }

    public function destroy(Coach $coach)
    {
        $coach->delete();
        return redirect()->route('coaches.index')->with('success', 'Coach eliminado correctamente');
    }
}
