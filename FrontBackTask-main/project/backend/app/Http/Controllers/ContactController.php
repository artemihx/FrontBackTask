<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Возвращает данные контактов.
     */
    public function index()
    {
        $contact = Contact::first();

        if (!$contact) {
            return response()->json(['error' => 'Contact data not found'], 404);
        }

        return response()->json([
            'address' => $contact->address,
            'work_hours' => $contact->work_hours,
            'phone' => $contact->phone,
            'email' => $contact->email,
            'social_links' => $contact->social_links,
            'room_type' => $contact->room_type,
        ]);
    }

    /**
     * Обновляет данные контактов.
     */
    public function update(Request $request)
    {
        $contact = Contact::first();

        if (!$contact) {
            return response()->json(['error' => 'Contact data not found'], 404);
        }

        $validated = $request->validate([
            'address' => 'required|string|max:255',
            'work_hours' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'social_links' => 'nullable|array',
            'room_type' => 'nullable|string|in:Стандарт,Плюс,Элит',
        ]);

        $contact->update($validated);

        return response()->json(['message' => 'Contact updated successfully']);
    }
}
