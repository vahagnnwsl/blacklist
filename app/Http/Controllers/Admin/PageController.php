<?php

namespace App\Http\Controllers\Admin;

use App\Arendator;
use App\ArendatorViolation;
use App\Page;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Services\FileUploaderService;

class PageController extends Controller
{


    public function index(Request $request)
    {
        $pages = Page::paginate(15);
        return view('admin.pages.index', compact('pages'));

    }

    public function create(Request $request)
    {
        return view('admin.pages.create');
    }

    public function edit($id)
    {
        $page = Page::findOrFail($id);
        return view('admin.pages.edit', compact('page'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|string|unique:pages|max:255',
            'content' => 'required|string',
        ]);

        Page::create($request->all());

        flash()->message('Успешно добавленно!')->success();
        return redirect()->route('pages.index');

    }

    public function update(Request $request, $id)
    {
        $page = Page::findOrFail($id);
        $request->validate([
            'type' => 'required|string|max:255|unique:pages,type,' . $id,
            'content' => 'required|string',
        ]);

        $page->update($request->all());

        flash()->message('Успешно обновлено!')->success();


        return redirect()->route('pages.edit',$id);


    }

    public function destroy($id)
    {
        Page::destroy($id);
        flash()->message('Успешно удален!')->success();

        return redirect()->back();
    }


}
