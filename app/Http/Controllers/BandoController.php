<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bando;

class BandoController extends Controller
{
    public function index(Request $request)
    {
        $query = Bando::query();

        if ($request->ente) {
            $query->where('ente', $request->ente);
        }

        return view('bandi.index', [
            'bandi' => $query->orderBy('data_pubblicazione', 'desc')->paginate(10)
        ]);
    }
}
