<?php

namespace App\Http\Controllers;

use App\Models\Score;
use App\Models\Student;
use Illuminate\Http\Request;

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

        Score::query()->create([
            'score' => $request->score,
            'date' => $request->date,
            'student_id' => $request->student_id,
        ]);

        return response()->json([
            'data' => 'success store'
        ]);
     
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

        return response()->json(['data' => 'success update']);
       
    }
}
