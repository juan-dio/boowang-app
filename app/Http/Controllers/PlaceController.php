<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\PlaceRequest;
use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $places = Place::orderBy('nama')->paginate();

        return view('place.index', [
            'page' => 'Daftar Wisata',
            'places' => $places
        ])->with('i', ($request->input('page', 1) - 1) * $places->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $place = new Place();
        $categories = Category::all();
        
        return view('place.create', [
            'page' => 'Tambah Wisata',
            'place' => $place,
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PlaceRequest $request): RedirectResponse
    {
        $validatedRequest = $request->validated();

        if($request->file('image')) {
            $validatedRequest['image'] = $request->file('image')->store('wisata-images');
        }

        Place::create($validatedRequest);

        return Redirect::route('places.index')
            ->with('success', 'Place created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $place = Place::find($id);

        return view('place.show', [
            'page' => 'Detail Wisata',
            'place' => $place
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $place = Place::find($id);
        $categories = Category::all();

        return view('place.edit', [
            'page' => 'Edit Wisata',
            'place' => $place,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Place $place): RedirectResponse
    {
        $validatedRequest = $request->validate([
            'nama' => 'required|max:255',
            'category_id' => 'required',
            'alamat' => 'required',
            'gmaps_link' => 'required|url:https',
            'deskripsi' => 'required',
            'image' => 'image|file|max:2048',
            'harga_tiket' => 'required|numeric|integer',
            'jam_buka' => 'required|date_format:H:i',
            'jam_tutup' => 'required|date_format:H:i|after:jam_buka',
            'jumlah_tiket_weekday' => 'required|numeric|integer',
            'jumlah_tiket_weekend' => 'required|numeric|integer'
        ]);

        if($request->file('image')) {
            if($place->image) {
                Storage::delete($place->image);
            }
            $validatedRequest['image'] = $request->file('image')->store('wisata-images');
        }

        $place->update($validatedRequest);

        return Redirect::route('places.index')
            ->with('success', 'Place updated successfully');
    }

    public function destroy(Place $place): RedirectResponse
    {
        $transactions = Transaction::where('place_id', $place->id)->count();

        if($transactions) {
            return Redirect::route('places.index')
                ->with('failed', 'Place delete failed! Place has transactions');
        }

        if($place->image) {
            Storage::delete($place->image);
        }

        // Place::find($id)->delete();
        Place::destroy($place->id);

        return Redirect::route('places.index')
            ->with('success', 'Place deleted successfully');
    }
}
