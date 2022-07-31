<?php

namespace App\Http\Controllers\Admin;

use App\Models\Result;
use App\Models\Question;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\ResultRequest;

/* what does Result Controller do?
 * - create a new result
 * - edit a existing result
 * - delete an existing result
 * - list results
 */

class ResultController extends Controller
{
   
    public function index(): View
    {
        $results = Result::all();

        return view('admin.results.index', compact('results'));
    }

    public function create(): View
    {
        $questions = Question::all()->pluck('question_text', 'id');

        return view('admin.results.create', compact('questions'));
    }

    public function store(ResultRequest $request): RedirectResponse
    {
        $result = Result::create($request->validated() + ['user_id' => auth()->id()]);
        $result->questions()->sync($request->input('questions', []));

        return redirect()->route('admin.results.index')->with([
            'message' => 'Erfolgreich erstellt!',
            'alert-type' => 'success'
        ]);
    }

    public function show(Result $result): View
    {
        return view('admin.results.show', compact('result'));
    }

    public function edit(Result $result): View
    {
        $questions = Question::all()->pluck('question_text', 'id');

        return view('admin.results.edit', compact('result', 'questions'));
    }

    public function update(ResultRequest $request, Result $result): RedirectResponse
    {
        $result->update($request->validated() + ['user_id' => auth()->id()]);
        $result->questions()->sync($request->input('questions', []));

        return redirect()->route('admin.results.index')->with([
            'message' => 'Erfolreich verändert!',
            'alert-type' => 'info'
        ]);
    }

//     destroy zerstört und leitet dann weiter zurück zur Liste der Results

    public function destroy(Result $result): RedirectResponse
    {
        $result->delete();

        return back()->with([
            'message' => 'Erfolgreich gelöscht!',
            'alert-type' => 'danger'
        ]);
    }

    public function massDestroy()
    {
        Result::whereIn('id', request('ids'))->delete();

        return response()->noContent();
    }
}
