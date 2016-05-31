<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Product;

use Request as RequestFacade;
use Session;
use Illuminate\Support\Facades\Input;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        $products = $product->all();

        return view('products/index')->withProducts($products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $product = new Product;

      return view('products/create')->withProduct($product);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Product $product)
    {
      // validate the data
      $this->validate($request, array(
        'name'    => 'required',
        'price' => 'required',
        'stock' => 'required|integer'
      ));

      // store in the database
      $product->name = $request->name;
      $product->price = $request->price;
      $product->stock = $request->stock;
      $product->save();

      // Make a session message
      Session::flash('success', 'Produto adicionado com sucesso');

      // redirect
      return redirect()->route('products.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = new Product;
        $product = $product->find($id);

        return view('products.edit')->withProduct($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, Product $product)
    {
      // validate the data
      $this->validate($request, [
        'name'    => 'required',
        'price' => 'required',
        'stock' => 'required|integer'
      ]);

      // store in the database
      $product = $product->find($id);
      $product->name = $request->name;
      $product->price = $request->price;
      $product->stock = $request->stock;

      $product->save();

      // Make a session message
      Session::flash('success', 'Produto atualizado com sucesso');

      // redirect
      return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      if(!RequestFacade::ajax())
        return "Error";

      $product = new Product;
      $product = $product->find($id);
      $product->delete();

      return "Produto excluído com sucesso";
    }


    public function save()
    {
      if(!RequestFacade::ajax())
        return "Error";

      $products = Input::all();

      foreach($products['products'] as $product){
        $product_aux = new Product;
        $product_aux = $product_aux->find($product['id']);
        $product_aux->stock = $product['stock'];
        $product_aux->save();
      }

      return "Estoques salvos com sucesso";
    }
}
