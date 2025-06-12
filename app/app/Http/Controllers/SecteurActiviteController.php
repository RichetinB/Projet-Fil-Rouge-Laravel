<?php

namespace App\Http\Controllers;
use App\Models\SecteurActivite;

use Illuminate\Http\Request;

class SecteurActiviteController extends Controller
{
    public function index()
    {
        return response()->json(SecteurActivite::all());
    }
}
