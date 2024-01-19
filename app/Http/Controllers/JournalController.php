<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Score;
use Illuminate\Support\Facades\Redirect;

class JournalController extends Controller
{
    public function index()
    {
        $students = Student::with('scores')->get();

        return view('journal.index', compact('students'));
    }

    public function create()         
    {
        return view('journal.create');
        
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255', 
        ]);

        $student = Student::create([
            'name' => $request->name,
        ]);

        return Redirect::route('journal.edit', $student->id)->with('success', 'Ученик успешно добавлен.');
    }
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $scores = Score::where('student_id', $id)->get();
        
        return view('journal.edit', compact('student', 'scores'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'score' => 'required|integer',
            'date' => 'required|date',
        ]);

        $student = Student::findOrFail($id);

        $score = new Score([
            'score' => $request->score,
            'date' => $request->date,
        ]);

        $student->scores()->save($score);

        return redirect()->route('journal.index')->with('success', 'Баллы успешно добавлены.');
    }
}
