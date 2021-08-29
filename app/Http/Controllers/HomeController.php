<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Bb;

class HomeController extends Controller
{
    /**
     * валидаторы полей форм создания и редактирования поста
     */
    private const BB_VALIDATOR = [
        'title' => 'required|max:50',
        'content' => 'required',
        'price' => 'required|numeric',
        'file' => 'nullable|image|max:1024'
    ];

    /**
     * сообщения об ошибках для валидаторов
     */
    private const BB_ERROR_MESSAGES = [
        'price.required' => 'У товара должна быть цена',
        'required' => 'Поле должно быть заполнено',
        'max' => 'Длина вводимого значения не должна быть больше :max символов',
        'numeric' => 'Допустимы только цифры',
        'file.image' => 'Загружаемый файл должен быть изображением',
        'file.max' => 'размер изображения - не более 1 Мб'
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

    /**
     * сохранение поста, валидация
     * 
     * @return redirect()
     */
    public function storeBb(Request $request)
    {
        $validated = $request->validate(
            self::BB_VALIDATOR,
            self::BB_ERROR_MESSAGES
        );

        if (isset($validated['file']) && null !== $validated['file']) {
            $file = $validated['file'];
            $fstore = Storage::putFile('public', $file);
        } else {
            $fstore = false;
        }

        Auth::user()->bbs()->create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'price' => $validated['price'],
            'file' => $fstore
        ]);

        return redirect()->route('home');
    }

    /**
     * вывод формы редактирования поста
     * 
     * @param Bb $bb модель поста
     * 
     * @return view
     */
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
