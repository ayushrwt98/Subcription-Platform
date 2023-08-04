<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Website;

class WebController extends Controller
{
    public function create(Request $request)
    {
        $name = $request->input('name');
        $url = $request->input('url');
        $post = Website::create([
            'name' => $name,
            'url' => $url,
        ]);

        return response()->json(['message' => 'Website created successfully']);
    }
}
