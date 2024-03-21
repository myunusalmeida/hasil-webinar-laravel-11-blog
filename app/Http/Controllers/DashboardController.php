<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    public function index()
    {
        return view('pages.dashboard.index', [
            'title' => 'Dashboard',
            'articles' => Article::orderBy('id', 'DESC')->get()
        ]);
    }

    public function create()
    {
        return view('pages.dashboard.create', ['title' => 'Buat Artikel Baru']);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);
        $data['thumbnail'] = $request->file('thumbnail')->store('thumbnail', 'public');
        $data['user_id'] = Auth::user()->id;

        Article::create($data);
        return redirect()->route('dashboard.index');
    }

    public function edit($id)
    {
        return view('pages.dashboard.edit', [
            'title' => 'Edit Artikel',
            'article' => Article::find($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);
        if (!empty($data['thumbnail'])) {
            $data['thumbnail'] = $request->file('thumbnail')->store('thumbnail', 'public');
        } else {
            unset($data['thumbnail']);
        }

        Article::find($id)->update($data);
        return redirect()->route('dashboard.index');
    }

    public function destroy($id)
    {
        Article::find($id)->delete();
        return redirect()->back();
    }
}
