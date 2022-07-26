<?php

namespace App\Http\Controllers\Admin;

use App\Models\Option;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\OptionRequest;
use App\Models\Question;

/* what does my Option Controller to?
 * - create a new option
 * - edit an existing option
 * - delete an existing option
 * - list options
 */

class OptionController extends Controller
{
   
    public function index(): View
    {
        $options = Option::all();

        return view('admin.options.index', compact('options'));
    }

    public function create(): View
    {
        $questions = Question::all()->pluck('question_text', 'id');

        return view('admin.options.create', compact('questions'));
    }

    public function store(OptionRequest $request): RedirectResponse
    {
        Option::create($request->validated());

        return redirect()->route('admin.options.index')->with([
            'message' => 'Erfolreich erstellt!',
            'alert-type' => 'success'
        ]);
    }

    public function show(Option $option): View
    {
        return view('admin.options.show', compact('option'));
    }

    public function edit(Option $option): View
    {
        $questions = Question::all()->pluck('question_text', 'id');

        return view('admin.options.edit', compact('option', 'questions'));
    }

    public function update(OptionRequest $request, Option $option): RedirectResponse
    {
        $option->update($request->validated());

        return redirect()->route('admin.options.index')->with([
            'message' => 'Erfolgreich geändert!',
            'alert-type' => 'info'
        ]);
    }

    public function destroy(Option $option): RedirectResponse
    {
        $option->delete();

        return back()->with([
            'message' => 'Erfolgreich gelöscht!',
            'alert-type' => 'danger'
        ]);
    }

    public function massDestroy()
    {
        Option::whereIn('id', request('ids'))->delete();

        return response()->noContent();
    }
}
