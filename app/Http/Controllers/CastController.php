<?php

namespace App\Http\Controllers;

use App\Cast;
use App\Episode;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CastController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show', 'search');
        $this->middleware('admin')->only(['create', 'store', 'delete', 'edit', 'update']);
    }

    public function index()
    {
        $casts = Cast::all();

        return view('casts.index', compact('casts'));
    }

    public function create()
    {
        if (Gate::allows('admin',  Auth::user())) {
            return view('casts.create');
        } else {
            exit('Error Access');
        }
    }

    public function store(Request $request)
    {
        if (Gate::allows('admin',  Auth::user())) {
            $this->validate($request, [
                'title' => 'required|unique:casts,title',
                'previewText' => 'required|max:200|unique:casts,previewText',
                'category' => 'required|exists:category_casts,id'
            ]);

            $cast = Cast::create($request->only('title', 'previewText'));
            $cast->category()->attach($request->category);

            return redirect('/cast/'. $cast->id .'/edit');
        } else {
            exit('Error Access');
        }
    }

    public function show(Cast $cast)
    {
        $cast = $cast->loadMissing('episodes');
        $count = 1;
        return view('casts.subcasts', compact(['cast', 'count']));
    }

    public function edit(Cast $cast)
    {
        if (Gate::allows('admin',  Auth::user())) {
            $cast->loadMissing(['category:category', 'episodes']);
            return view('casts.edit', compact('cast'));
        } else {
            exit('Error Access');
        }
    }

    public function update(Request $request, Cast $cast)
    {
        //
    }

    public function destroy(Cast $cast)
    {
        if (Gate::allows('admin',  Auth::user())) {
            $cast->delete();
            return back();
        }
    }

    public function search(Request $request)
    {
        echo  json_encode(Cast::where('title', 'like', '%' . $request->v . '%')->get());


        //BookingDates::where('email', Input::get('email'))
            //->orWhere('name', 'like', '%' . Input::get('name') . '%')->get();
    }
}
