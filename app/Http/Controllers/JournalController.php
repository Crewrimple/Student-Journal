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

     public function store(Request $request)
    {
        $request->validate([
            'score' => 'required|integer',
            'date' => 'required|date',
            'student_id' => 'required|exists:students,id',
        ]);

        Score::create([
            'score' => $request->score,
            'date' => $request->date,
            'student_id' => $request->student_id,
        ]);

        return redirect()->route('journal.index');
    }

    public function update(Request $request, Score $score)
    {
        $request->validate([
            'score' => 'required|integer',
            'date' => 'required|date',
        ]);

        $score->update([
            'score' => $request->score,
            'date' => $request->date,
        ]);

        return redirect()->route('journal.index');
    }
}
