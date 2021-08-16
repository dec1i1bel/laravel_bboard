<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Bbs;

class BbsController extends Controller
{
    /**
     * вывод списка постов
     */
    public function index() {
        $bbs = Bbs::latest()->get();
        
        return view('/index', compact('bbs'));
    }

    /**
     * сохранение поста
     */
    public function store(Request $request) {
        $file = $request->file('file')->store('public');

        $bbs = new Bbs();

        $bbs->title = request('title');
        $bbs->content = request('content');
        $bbs->price = request('price'); 
        $bbs->file = Storage::url($file);

        $bbs->save();

        return redirect('/');
    }

    /**
     * вывод детальной страницы поста
     */
    public function detail($bb) {
        
    }
}
