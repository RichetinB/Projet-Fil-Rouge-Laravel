<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Civilite;

class CiviliteController extends Controller
{
    public function index()
    {
        return response()->json(Civilite::all());
    }
}
