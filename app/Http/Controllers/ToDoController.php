<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ToDo;
use Illuminate\Http\Request;

class ToDoController extends Controller
{
    public function index()
    {
        $todos = ToDo::with('category')->where('user_id', auth()->id())->get();
        return view('todos.index', compact('todos'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('todos.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        ToDo::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => auth()->id(),
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('todos.index');
    }

    public function edit(ToDo $todo)
    {
        $categories = Category::all();
        return view('todos.edit', compact('todo', 'categories'));
    }

    public function update(Request $request, ToDo $todo)
    {
        $request->validate([
            'title' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        $todo->update([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('todos.index');
    }

    public function destroy(ToDo $todo)
    {
        $todo->delete();
        return redirect()->route('todos.index');
    }
}
