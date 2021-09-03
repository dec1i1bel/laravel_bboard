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
        // $context = ['bbs' => Bb::latest()->get()];
        
        // return view('index', $context);
        return view('index');
    }

    /**
     * вывод детальной страницы поста
     */
    public function detail(Bb $bb) {
        return view('detail', ['bb' => $bb]);
    }
}
