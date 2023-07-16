<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Donation::select('id','name', 'email', 'cin', 'montant')->get();
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'age' => 'required',
            'Parent' => 'required',
            'maladie' => 'required',
            'annee' => 'required'
        ]);
            Enfant::create($request->post());
             return response()->json([
                 'message' => 'new item added successfully'
             ]);

    }
}
