<?php

namespace App\Http\Controllers;

use App\Cast;
use App\CategoryCast;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index(Request $request)
    {
        if (isset(request()->category_casts))
        {
            $this->validate($request, [
                'category_casts' => 'required|exists:category_casts,id|numeric'
            ]);

            $data = CategoryCast::find(request()->category_casts)->casts()->paginate(10);
        }

        return view('catalog.index', compact('data'));
    }
}
