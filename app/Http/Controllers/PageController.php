<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;

class PageController extends Controller
{
    public function home() { return view('home'); }
    public function about() { return view('pages.about'); }
    public function services() { return view('pages.services'); }
    // Return the top-level contacts view (resources/views/contacts.blade.php)
    // The project currently places the contact template at resources/views/contacts.blade.php
    // so return that instead of the non-existent 'pages.contact' view.
    public function contact() { return view('contacts'); }
    public function products() {
        $products = Product::latest()->get();
        return view('pages.products', compact('products'));
    }
}
