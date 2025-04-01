<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          $promotions = Promotion::latest()->paginate(8);
        return view('promotions.index', ['promotions' => $promotions]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      return view('promotions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('promotions', 'public');
            $validated['image'] = $imagePath;
        }

        Promotion::create($validated);

        return redirect()
            ->route('promotions.index')
            ->with('success', 'Promosi berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Promotion $promotion)
    {
         return view('promotions.show', ['promotion' => $promotion]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Promotion $promotion)
    {
       return view('promotions.edit', ['promotion' => $promotion]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Promotion $promotion)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            if ($promotion->image) {
                Storage::disk('public')->delete($promotion->image);
            }
            
            $imagePath = $request->file('image')->store('promotions', 'public');
            $data['image'] = $imagePath;
        }

        $promotion->update($data);

        return redirect()->route('promotions.index')
            ->with('success', 'Promosi berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Promotion $promotion)
    {
       if ($promotion->image) {
            Storage::disk('public')->delete($promotion->image);
        }
        
        $promotion->delete();

        return redirect()->route('promotions.index')
            ->with('success', 'Promosi berhasil dihapus!');
    }
}
