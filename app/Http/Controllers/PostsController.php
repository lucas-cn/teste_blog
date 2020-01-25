<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    
    public function get()
    {
        return Post::all();
    }

    public function store(PostRequest $request)
    {
        $posts = new Post;
        $posts->autor       = $request->autor;
        $posts->titulo      = $request->titulo;
        $posts->conteudo    = $request->conteudo;
        $posts->publicacao  = $request->publicacao;
        $posts->save();
        return redirect()->route('/')->with('message', 'Post criado com sucesso!');
    }
  
    public function show($id)
    {
        //
    }
  
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit',compact('product'));
    }
  
    public function update(ProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->name        = $request->name;
        $product->description = $request->description;
        $product->quantity    = $request->quantity;
        $product->price       = $request->price;
        $product->save();
        return redirect()->route('products.index')->with('message', 'Product updated successfully!');
    }
  
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('products.index')->with('alert-success','Product hasbeen deleted!');
    }
}
