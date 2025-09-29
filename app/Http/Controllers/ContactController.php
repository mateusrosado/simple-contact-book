<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function index() {
        $contacts = Contact::where('user_id', Auth::user()->id)->get();
        return view('contacts', ['contacts' => $contacts]);
    }
    
    public function store(Request $request, Contact $contact)
    {
        $validated = $request->validate([
            'name' => ['required'],
            'phone' => ['required'],
            'email' => ['required','email'],
        ], [
            'name.required' => 'O campo nome é obrigatório!',
            'phone.required' => 'O campo telefone e obrigatório!',
            'email.required' => 'O campo email é obrigatório!',
            'email.email' => 'O e-mail não é válido.',
        ]);
        try {
            $contact = $contact->fill($validated);
            $contact->user_id = Auth::user()->id;
            $contact->save();

            return redirect()->intended('contacts');
        }
        catch (\Exception $e) {
            return "Ocorreu algum problema ao realizar a inserção";
        }

    }
}
