<?php

namespace App\Http\Controllers;
use App\Models\Diary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiaryController extends Controller
{
    public function index()
    {
        $diaries = Auth::user()->diaries;
        return view("diaries.index", compact("diaries"));
    }

    public function show(Diary $diary)
    {
        $this->authorizeDiary($diary);

        return view("diaries.show", compact("diary"));
    }

    public function create(Diary $diary)
    {
        return view("diaries.create", compact("diary"));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            "title" => ["required", "max:255"],
            "body" => ["required", "max:255"],
            "date" => ["required", "date"]
        ]);
        $request->user()->diaries()->create([
            "title" => $validated["title"],
            "body" => $validated["body"],
            "date" => $validated["date"]
        ]);
        return redirect("/diaries");
    }
    public function edit(Diary $diary)
    {
        $this->authorizeDiary($diary);

        return view("diaries.edit", compact("diary"));
    }

    public function update(Request $request, Diary $diary)
    {
        $this->authorizeDiary($diary);

        $validated = $request->validate([
            "title" => ["required", "max:255"],
            "body" => ["required", "max:255"],
            "date" => ["required", "date"]
        ]);
        $diary->update([
            "title" => $validated["title"],
            "body" => $validated["body"],
            "date" => $validated["date"]
        ]);
        return redirect("/diaries/{$diary->id}");
    }

    public function destroy(Diary $diary) {
        $this->authorizeDiary($diary);

        $diary->delete();
        return redirect("/diaries");
    }

    private function authorizeDiary(Diary $diary): void
    {
        abort_unless((int) $diary->created_by === (int) Auth::id(), 403);
    }
}
