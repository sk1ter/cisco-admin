<?php


namespace App\Http\Controllers;


use App\Models\Contact;
use App\Models\PointOfSale;

class PanelController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        $contactsCount = Contact::count('id');
        $contactsToday = Contact::whereDate('created_at', today())->count();
        return view('panel.index', compact('contacts', 'contactsCount', 'contactsToday'));
    }

    public function pointOfSales()
    {
        $pointOfSales = PointOfSale::paginate(20);
        return view('panel.point-of-sales', compact('pointOfSales'));
    }
}
