<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::with([
            'user',
            'category',
        ])
            ->latest()
            ->paginate(25);

        return view('questions.index', [
            'questions' => $questions,
        ]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('questions.create', [
            'categories' => $categories,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        $question = Question::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('questions.show', $question);
    }

    public function show(Question $question)
    {
        $userId = Auth::id();

        $question->load([
            'user',
            'category',

            'answers' => fn($query) => $query->with([
                'user',
                'hearts' => fn($query) => $query->where('user_id', $userId),
                'comments' => fn($query) => $query->with([
                    'user',
                    'hearts' => fn($query) => $query->where('user_id', $userId),
                ]),
            ]),

            'comments' => fn($query) => $query->with([
                'user',
                'hearts' => fn($query) => $query->where('user_id', $userId),
            ]),

            'hearts' => fn($query) => $query->where('user_id', $userId),
        ]);

        return view('questions.show', [
            'question' => $question,
        ]);
    }

    public function edit(Question $question)
    {
        $categories = Category::all();
        return view('questions.edit', [
            'question' => $question,
            'categories' => $categories,
        ]);
    }

    public function update(Request $request, Question $question)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        $question->update([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('questions.show', $question);
    }

    public function destroy(Question $question)
    {
        $question->delete();

        return redirect()->route('home');
    }
}
