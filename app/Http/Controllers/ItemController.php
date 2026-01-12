<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $items = Item::all();
        return view("items.index",compact("items"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("items.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate(
            [
                'name' => 'required',
                'quantity' => 'required',
                 'price' => 'required'
            ]
        );


        Item::create([

        'name' => $request->name,
        'quantity' => $request->quantity,
        'price' => $request->price

        
    ]);

    return redirect()->route("items.index");

    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        //
        return view('items.show',compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        //
        return view('items.edit',compact('item'));

        

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {

        $validated = $request->validate(
            [
                'name' => 'required|string|max:255',
                'quantity' => 'nullable|integer|min:0',
                'price' => 'nullable|numeric|min:0'
            ]
        );

        $validated['quantity'] = $validated['quantity'] ?? 0;
        $validated['price'] = $validated['price'] ?? 0;

        $item->update($validated);
        
        return redirect()->route('items.index')->with('success','Item updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        //
        $item->delete();

        return redirect()->route('items.index')->with('success','Item deleted successfully!');
    }
}
