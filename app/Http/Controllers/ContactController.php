<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ContactController extends Controller
{
    
    public function index(Request $request)
    {
        $query = Contact::where('user_id', Auth::id());

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                  ->orWhere('email', 'like', "%$search%");
            });
        }

        $contacts = $query->get();

        $editContact = null;
        if ($request->has('edit')) {
            $editContact = Contact::where('user_id', Auth::id())
                                  ->find($request->edit);
        }

        return view('components.modal', compact('contacts', 'editContact'));
    }

    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                Rule::unique('contacts')->where(function ($query) {
                    return $query->where('user_id', Auth::id());
                }),
            ],
            'phone' => [
                'required',
                'digits:11',
                Rule::unique('contacts')->where(function ($query) {
                    return $query->where('user_id', Auth::id());
                }),
            ],
            'email' => 'required|email',
            'address' => 'nullable',
        ], [
            'name.required' => 'O campo nome é obrigatório!',
            'name.unique' => 'Já existe um contato com este nome!',
            'phone.required' => 'O campo telefone é obrigatório!',
            'phone.digits' => 'O telefone deve ter exatamente 11 dígitos!',
            'phone.unique' => 'Já existe um contato com este telefone!',
            'email.required' => 'O campo email é obrigatório!',
            'email.email' => 'O e-mail não é válido.',
        ]);

        Contact::create([
            'user_id' => Auth::id(),
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'email' => $validated['email'],
            'address' => $validated['address'] ?? null,
        ]);

        return redirect()->route('contacts');
    }

    
    public function update(Request $request, Contact $contact)
    {
        if ($contact->user_id != Auth::id()) {
            return redirect()->route('contacts')->withErrors('Você não tem permissão para editar este contato.');
        }

        $validated = $request->validate([
            'name' => [
                'required',
                Rule::unique('contacts')->ignore($contact->id)->where(function ($query) {
                    return $query->where('user_id', Auth::id());
                }),
            ],
            'phone' => [
                'required',
                'digits:11',
                Rule::unique('contacts')->ignore($contact->id)->where(function ($query) {
                    return $query->where('user_id', Auth::id());
                }),
            ],
            'email' => 'required|email',
            'address' => 'nullable',
        ], [
            'name.required' => 'O campo nome é obrigatório!',
            'name.unique' => 'Já existe um contato com este nome!',
            'phone.required' => 'O campo telefone é obrigatório!',
            'phone.digits' => 'O telefone deve ter exatamente 11 dígitos!',
            'phone.unique' => 'Já existe um contato com este telefone!',
            'email.required' => 'O campo email é obrigatório!',
            'email.email' => 'O e-mail não é válido.',
        ]);

        $contact->update($validated);

        return redirect()->route('contacts');
    }

    
    public function destroy(Contact $contact)
    {
        if ($contact->user_id != Auth::id()) {
            return redirect()->route('contacts')->withErrors('Você não tem permissão para excluir este contato.');
        }

        $contact->delete();

        return redirect()->route('contacts');
    }
}
