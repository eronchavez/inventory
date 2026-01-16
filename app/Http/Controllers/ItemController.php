<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Http\Requests\StoreItemRequest; 

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all items from database
        $items = Item::all();

        // Pass data to the view
        return view("items.index", compact("items"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Just return the create form
        return view("items.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreItemRequest $request)
    {
      
        // Use Item::class because the item does NOT exist yet
        $this->authorize('create', Item::class);

      
        Item::create([
            'name'     => $request->name,
            'quantity' => $request->quantity,
            'price'    => $request->price
        ]);

        
        return redirect()->route("items.index")
                         ->with('success', 'Item created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
       
        return view('items.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
     
        $this->authorize('update', $item);

        return view('items.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateItemRequest $request, Item $item)
    {
       
        $this->authorize('update', $item);

        $item->update($request->validated());
        
        return redirect()->route('items.index')
                         ->with('success', 'Item updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
       
        $this->authorize('delete', $item);

       
        $item->delete();

        return redirect()->route('items.index')
                         ->with('success', 'Item deleted successfully!');
    }
}
