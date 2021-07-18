<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        return view('index', [
            'todos' => $todos,
            'input' => ''
        ]);
    }

    public function create(Request $request)
    {
        $this->validate($request, Todo::$rules);
        $form = $request->all();
        Todo::create($form);
        return redirect('/');
    }

    public function update(Request $request)
    {
        $this->validate($request, Todo::$rules);
        $form = $request->all();
        $form = $request->except(['_token']);
        unset($form['_token']);
        Todo::where('id', $request->id)->update($form);
        return redirect('/');
    }

    public function delete(Request $request)
    {
        Todo::find($request->id)->delete();
        return redirect('/');
    }

    public function redirect()
    {
        return redirect('/');
    }
}
