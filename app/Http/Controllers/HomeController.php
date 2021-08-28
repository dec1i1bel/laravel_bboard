<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Bb;

class HomeController extends Controller
{
    private const BB_VALIDATOR = [
        'title' => 'required|max:50',
        'content' => 'required',
        'price' => 'required|numeric'
    ];

    private const BB_ERROR_MESSAGES = [
        'price.required' => 'У товара должна быть цена',
        'required' => 'Поле должно быть заполнено',
        'max' => 'Длина вводимого значения не должна быть больше :max символов',
        'numeric' => 'Допустимы только цифры'
    ];
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view(
            'home',
            ['bbs' => Auth::user()->bbs()->latest()->get()]
        );
    }

    public function showAddBbForm() {
        return view('bb_add');
    }

    public function storeBb(Request $request)
    {
        // @toDo create validation rule fo file
        $file = request()->file;
        $fstore = Storage::putFile('public', $file);

        $validated = $request->validate(
            self::BB_VALIDATOR,
            self::BB_ERROR_MESSAGES
        );
        Auth::user()->bbs()->create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'price' => $validated['price'],
            'file' => $fstore
        ]);

        return redirect()->route('home');
    }

    public function showEditBbForm(Bb $bb)
    {
        return view('bb_edit', ['bb' => $bb]);
    }

    public function updateBb(Request $request, Bb $bb)
    {
        $validated = $request->validate(
            self::BB_VALIDATOR,
            self::BB_ERROR_MESSAGES
        );
        $bb->fill([
            // 'title' => $request->title,
            // 'content' => $request->content,
            // 'price' => $request->price
            'title' => $validated['title'],
            'content' => $validated['content'],
            'price' => $validated['price']
        ]);
        $bb->save();
        return redirect()->route('home');
    }

    public function showDeleteBbForm(Bb $bb)
    {
        return view('bb_delete', ['bb' => $bb]);
    }

    public function destroyBb(Bb $bb)
    {
        $bb->delete();
        return redirect()->route('home');
    }
}
