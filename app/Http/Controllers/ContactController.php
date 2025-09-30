<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function index(Request $request) {
        $query = Contact::where('user_id', Auth::id());

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                  ->orWhere('email', 'like', "%$search%");
            });
        }

        $contacts = $query->get();

        return view('contacts', ['contacts' => $contacts]);
    }
    
    public function store(Request $request, Contact $contact)
    {
        $request->merge([
            'phone' => preg_replace('/[^0-9]/', '', $request->input('phone'))
        ]);

        $validated = $request->validate([
            'name' => ['required','unique:contacts'],
            'phone' => ['required','digits_between:10,11', 'unique:contacts'],
            'email' => ['required','email', 'unique:contacts'],
        ], [
            'name.required' => 'O campo nome é obrigatório!',
            'name.unique' => 'Já existe um contato com este nome!',
            'phone.required' => 'O campo telefone e obrigatório!',
            'phone.digits_between' => 'Por favor, preencha o telefone completo no formato (99) 99999-9999 ou (99) 9999-9999.',
            'phone.unique' => 'Já existe um contato com este telefone!',
            'email.required' => 'O campo email é obrigatório!',
            'email.email' => 'O e-mail não é válido.',
            'email.unique' => 'Já existe um contato com este email!',
        ]);
        try {
            $contact = $contact->fill($validated);
            $contact->user_id = Auth::id();
            $contact->save();
            
            return redirect()->route('contacts')->with('success', "O contato {$contact->name} foi criado com sucesso!");
        }
        catch (\Exception $e) {
            return redirect()->route('contacts')->with('problem', 'Ocorreu um erro ao cadastar.');
        }
    
    }

    public function update(Request $request, Contact $contact)
    {
        $request->merge([
            'phone' => preg_replace('/[^0-9]/', '', $request->input('phone'))
        ]);
        
        if ($contact->user_id != Auth::id()) {
            return back()->with('problem', 'Você não tem permissão para editar este contato.');
        }
        $validated = $request->validate([
            'name' => ['required', Rule::unique('contacts')->ignore($contact->id)],
            'phone' => ['required','digits_between:10,11', Rule::unique('contacts')->ignore($contact->id)],
            'email' => ['required','email', Rule::unique('contacts')->ignore($contact->id)],
        ], [
            'name.required' => 'O campo nome é obrigatório!',
            'name.unique' => 'Já existe um contato com este nome!',
            'phone.required' => 'O campo telefone e obrigatório!',
            'phone.digits' => 'Por favor, preencha o telefone completo no formato (99) 99999-9999 ou (99) 9999-9999.',
            'phone.unique' => 'Já existe um contato com este telefone!',
            'email.required' => 'O campo email é obrigatório!',
            'email.email' => 'O e-mail não é válido.',
            'email.unique' => 'Já existe um contato com este email!',
        ]);
        try {
            $contact->update($validated);

            return redirect()->route('contacts')->with('success', "O contato {$contact->name} foi editado com sucesso!");
        }
        catch (\Exception $e) {
            return redirect()->route('contacts')->with('problem', 'Ocorreu um erro ao salvar alterações.');
        }
    }

    public function destroy(Contact $contact)
    {
        if ($contact->user_id != Auth::id()) {
            return redirect()->route('contacts')->with('problem', 'Você não tem permissão para excluir este contato.');
        }

        try {
            $contact->delete();

            return redirect()->route('contacts')->with('success', "O contato {$contact->name} foi deletado com sucesso!");
        }
        catch (\Exception $e) {
            return redirect()->route('contacts')->with('problem', 'Ocorreu um erro ao deletar.');
        }
    }
}