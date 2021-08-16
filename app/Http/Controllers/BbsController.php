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
    public function detail(Bbs $bb) {
        $s = $bb->title . '<br><br>';
        $s .= $bb->content . '<br>';
        $s .= $bb->price . ' руб.<br>';
        $s .= '<img class="img-item-detail" src="'.$bb->file.'" style="width:700px;height:700px;"><br>';

        return response($s)
            ->header('Content-type', 'text/html');
    }
}
