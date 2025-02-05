<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $note = Note::query()->orderBy('created_at', 'desc')->paginate();

        // dd($note);

        return view('note.index', ['notes' => $note]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('note.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'note' => ['required', 'string']
        ]);

        $data['user_id'] = 1;

        $note = Note::create($data);

        return to_route('note.show', $note)->with('message', 'note was created');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $note = Note::findOrFail($id);

        return view('note.show',  ['note' => $note]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $note = Note::findOrFail($id);
        return view('note.edit',  ['note' => $note]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'note' => ['required', 'string']
        ]);

        $note = Note::findOrFail($id); 
        $note->update($data);

        return to_route('note.show', $note)->with('message', 'note was updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $note = Note::findOrFail($id); 
        $note->delete();
        return to_route('note.index')->with('message', 'note was deleted');
    }
}
