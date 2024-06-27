<?php
 
namespace App\Http\Controllers;
 
use App\Models\TodoItem;
 
class TodoItemController extends Controller
{
    /**
     * Show TodoItem.
     */
    public function show(string $id): string
    {
        $todoItem = TodoItem::findOrFail($id);
        return response()->json($todoItem);
    }

    /**
     * Show all TodoItems.
     */
    public function index(): string
    {
        $todoItems = TodoItem::all();
        return response()->json($todoItems);
    }

    /** 
     * Store a new TodoItem.
     */
    public function store(): string
    {
        $todoItem = TodoItem::create(request()->all());
        return response()->json($todoItem, 201);
    }

    /**
     * Update a TodoItem.
     */
    public function update(string $id): string
    {
        $todoItem = TodoItem::findOrFail($id);
        $todoItem->update(request()->all());
        return response()->json($todoItem);
    }

    /**
     * Delete a TodoItem.
     */
    public function delete(string $id): string
    {
        $todoItem = TodoItem::findOrFail($id);
        $todoItem->delete();
        return response()->json(null, 204);
    }
}