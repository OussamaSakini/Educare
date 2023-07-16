<?php

namespace App\Http\Controllers;

use App\Models\Enfant;
use Illuminate\Http\Request;

class EnfantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Book::select('id','fname', 'lname', 'age', 'Parent', 'maladie', 'annee')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'age' => 'required',
            'Parent' => 'required',
            'maladie' => 'required',
            'annee' => 'required'
        ]);
             Book::create($request->post());
             return response()->json([
                 'message' => 'new item added successfully'
             ]);

    }

    public function show(Enfant $enfant)
    {
        return response()->json([
            'enfant' => $enfant
        ]);
    }

    public function update(Request $request, Enfant $enfant)
    {
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'age' => 'required',
            'Parent' => 'required',
            'maladie' => 'required',
            'annee' => 'required'
        ]);

        $book->fill($request->post())->update();
        return response()->json([
            'message' => 'new item updated successfully'
        ]);
    }
}
