<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all();

        if( $authors->isEmpty() )
        {
            return response()->json(null, 404);
        }

        return response()->json($authors, 200);
    }
}
