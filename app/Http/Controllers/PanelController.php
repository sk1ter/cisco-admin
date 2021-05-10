<?php


namespace App\Http\Controllers;


use App\Models\Contact;

class PanelController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        $contactsCount = Contact::count('id');
        $contactsToday = Contact::whereDate('created_at', today())->count();
        return view('panel.index', compact('contacts', 'contactsCount', 'contactsToday'));
    }
}
