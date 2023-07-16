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
}
