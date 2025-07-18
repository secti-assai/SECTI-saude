<?php

namespace App\Http\Controllers;

use App\Models\Unidade;
use Illuminate\Http\Request;

class UnidadeController extends Controller
{
    public function show($slug)
    {
        $unidade = Unidade::where('slug', $slug)->firstOrFail();
        return view('unidades.show', compact('unidade'));
    }
}