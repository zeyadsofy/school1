<?php

namespace App\Http\Controllers\Students\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Degree;
use App\Models\Question;
use App\Models\Quizze;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExamsController extends Controller
{
    public function index()
    {
        $quizzes = Quizze::where('grade_id', auth()->user()->Grade_id)
            ->where('classroom_id', auth()->user()->Classroom_id)
            ->where('section_id', auth()->user()->section_id)
            ->orderBy('id', 'DESC')
            ->get();
        return view('pages.Students.dashboard.exams.index', compact('quizzes'));
    }

    public function fetchQuestion()
    {
        $quizze = Quizze::where('grade_id', auth()->user()->Grade_id)
            ->where('classroom_id', auth()->user()->Classroom_id)
            ->where('section_id', auth()->user()->section_id)
            ->orderBy('id', 'DESC')
            ->first();
        
        $question = $quizze->questions()->first();
        return response()->json($question);
    }

    public function nextQuestion(Request $request)
    {
        $question_id = $request->input('question_id');
        $score = $request->input('score');
        $answer = $request->input('answer');
        $right_answer = $request->input('right_answer');

        $degree = Degree::firstOrNew([
            'quizze_id' => $request->input('quizze_id'),
            'student_id' => Auth::user()->id
        ]);

        if (strcmp(trim($answer), trim($right_answer)) === 0) {
            $degree->score += $score;
        }

        $degree->save();

        $nextQuestion = Question::where('quizze_id', $request->input('quizze_id'))
            ->where('id', '>', $question_id)
            ->orderBy('id', 'asc')
            ->first();

        return response()->json(['success' => true, 'nextQuestion' => $nextQuestion]);
    }

    public function show($quizze_id)
{
    $student_id = Auth::user()->id;

    $quizze = Quizze::findOrFail($quizze_id);

    $questions = Question::where('quizze_id', $quizze_id)->get();

    return view('pages.Students.dashboard.exams.show', compact('quizze', 'student_id', 'questions'));
}


}
