<?php

namespace App\Http\Controllers;
use App\Models\ToDo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ToDoController extends Controller
{
    public function index()
    {
        $todos = Auth::user()->todos;
        return view("todos.index", compact("todos"));
    }

    /**
     * Display a single to-do item.
     *
     * Implicit route model binding will inject the correct instance.
     */
    public function show(ToDo $todo)
    {
        $this->authorizeTodo($todo);

        return view("todos.show", compact("todo"));
    }

    public function create(ToDo $todo)
    {
        return view("todos.create", compact("todo"));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            "content" => ["required", "max:255"]
        ]);
        $request->user()->todos()->create([
            "content" => $validated["content"],
            "completed" => false
        ]);
        return redirect("/todos");
    }

    public function edit(ToDo $todo)
    {
        $this->authorizeTodo($todo);

        return view("todos.edit", compact("todo"));
    }

    public function update(Request $request, ToDo $todo)
    {
        $this->authorizeTodo($todo);

        $validated = $request->validate([
            "content" => ["required", "max:255"],
            "completed" => ["boolean"]
        ]);
        $todo->update([
            "content" => $validated["content"],
            "completed" => $validated["completed"]
        ]);
        return redirect("/todos/{$todo->id}");
    }

    public function destroy(ToDo $todo) {
        $this->authorizeTodo($todo);

        $todo->delete();
        return redirect("/todos");
    }

    private function authorizeTodo(ToDo $todo): void
    {
        abort_unless((int) $todo->created_by === (int) Auth::id(), 403);
    }
}
