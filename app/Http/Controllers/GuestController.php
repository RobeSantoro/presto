<?php

namespace App\Http\Controllers;

use App\Revisor;
use App\Product;
use App\Category;
use App\Mail\RevisorMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\RevisorRequest;

class GuestController extends Controller
{
    //HOME
    public function home_function()
    {
        return view('home'); 
    }

    //SEARCH RESULT
    public function search_function (Request $request) {
        $query = $request->input('query');
        $products = Product::search($query)->get();

        return view('search.search_result', compact('query' , 'products'));
    }

    // PRODUCTS INDEX
    public function index_products_function()
    {
        $products = Product::where('is_accepted', true)
        ->orderBy('created_at', 'desc')
        ->paginate(3);

        return view('products.index_products', compact('products'));
    }

    //PRODUCT SHOW
    public function show_product_function($id)
    {
        $product = Product::find($id);
        return view('products.show_product', compact('product'));
    }

    ///////////////////////////////////////////////////////////////////////////

    //PRODUCT BY CATEGORY
    public function productByCategory_function($name, $category_id)
    {
        $category = Category::find($category_id);       // Restistuisc l'intero record dell'Id cliccato
        $products = $category->products()
            ->where('is_accepted', true)
            ->orderBy('created_at', 'desc')
            ->paginate(3);

        return view('products.productsByCategory' , compact('category','products'));
    }

    ///////////////////////////////////////////////////////////////////////////

    // REVISORS INDEX
    public function index_revisors_function()
    {
        $Revisors = Revisor::all();
        return view('revisors.index_revisors', compact('Revisors'));
    }

    // REVISOR CREATE
    public function create_revisor_function()
    {
        return view('revisors.create_revisor');
    }

    // REVISOR STORE
    public function submit_function(RevisorRequest $request)
    {
        $Revisor = Revisor::create([
            'name' => $request->input('name'),
            'surname' => $request->input('surname'),
            'email' => $request->input('email'),
            'mobile' => $request->input('mobile'),
            'photo' => $request->file('photo')->store('public/photo')
        ]);

        Mail::to($Revisor->email)->send(new RevisorMail($Revisor));

        return redirect(route('thankyou_route'))->with('message', 'Grazie per averci contattato');
    }

    public function thankyou_function()
    {
        return view('thankyou_view');
    }



}
