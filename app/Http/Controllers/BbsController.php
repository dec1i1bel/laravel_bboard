<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Bb;

class BbsController extends Controller
{
    /**
     * вывод списка постов
     */
    public function index() {
        $context = ['bbs' => Bb::latest()->get()];

        /**
         * index - имя шаблона без ".blade.php"
         * $context - контекст шаблона
         */
        return view('index', $context);
    }

    /**
     * сохранение поста
     */
    public function store(Request $request) {
        $file = $request->file('file')->store('public');

        $bb = new Bb();

        $bb->title = request('title');
        $bb->content = request('content');
        $bb->price = request('price'); 
        $bb->file = Storage::url($file);

        $bb->save();

        return redirect('/');
    }

    /**
     * вывод детальной страницы поста
     */
    public function detail(Bb $bb) {
        return view('detail', ['bb' => $bb]);
    }
}
