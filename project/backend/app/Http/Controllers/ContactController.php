<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    // Хранение сообщений
    public function store(Request $request)
    {
        // Валидация входных данных
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:5000',
        ]);

        // Сохранение сообщения в базу данных
        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ]);

        return response()->json(['message' => 'Ваше сообщение успешно отправлено!'], 201);
    }

    // Просмотр всех сообщений (только для администраторов)
    public function index()
    {
        // Получение всех сообщений из базы
        $contacts = Contact::orderBy('created_at', 'desc')->get();
        return response()->json($contacts);
    }
}
