<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Http\Requests\StoreItemRequest; 
use App\Http\Requests\UpdateItemRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests; // Para walang error pag gumagamit ng auth()




class ItemController extends Controller
{
    use AuthorizesRequests;
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
      

        Item::create($request->validated());

        
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
