<?php

namespace App\Http\Controllers;

use App\Models\TodoItem;
use Illuminate\Http\Request;

class TodoItemController extends Controller
{

    /**
     * GET todo-items
     * Show all todo items
     */
    public function index()
    {
        $todoItems = TodoItem::with('comments')->get();
        return response()->json($todoItems);
    }

    /**
     * GET todo-items/1
     * Show a single todo item
     */
    public function show(string $id)
    {
        $todoItem = TodoItem::with('comments')->findOrFail($id);
        return response()->json($todoItem);
    }

    /**
     * POST todo-items
     * Create a new todo item
     */
    public function store(Request $request)
    {
        $todoItem = new TodoItem();
        $todoItem->name = $request->name;
        $todoItem->isComplete = $request->isComplete;
        $todoItem->dueDate = $request->dueDate;
        $todoItem->save();
        return response()->json($todoItem, 201);
    }

    /**
     * PUT todo-items/1
     * Update a todo item
     */
    public function update(Request $request, string $id)
    {
        $todoItem = TodoItem::with('comments')->findOrFail($id);
        $todoItem->name = $request->name;
        $todoItem->isComplete = $request->isComplete;
        $todoItem->dueDate = $request->dueDate;
        $todoItem->save();
        return response()->json($todoItem);
    }

    /**
     * DELETE todo-items/1
     * Delete a todo item
     */
    public function destroy(string $id)
    {
        $todoItem = TodoItem::findOrFail($id);
        $todoItem->delete();
        
        // return no content
        return response()->noContent();
    }
}
