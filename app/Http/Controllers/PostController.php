<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    
    public function get()
    {
        return Post::with('category','autor')->get();
    }

    public function filter(Request $request)
    {

        $posts   = Post::when(!empty($request->search['autor']) , function ($query) use($request){
            return $query->where('autor', $request->search['autor']);
        })
        ->when(!empty($request->search['titulo']) , function ($query) use($request){
            return $query->where('titulo', 'like', "%".$request->search['titulo']."%");
        })
        ->when(!empty($request->categoria) , function ($query) use($request){
            return $query->leftJoin('categories', function ($join) {
                $join->on('posts.id_category', '=', 'categories.id');
            })
            ->where('categories.name', 'like', "%".$request->search['categoria']."%");
        })
        ->with('category','autor')
        ->orderBy('publicacao')
        ->get();

        //var_dump($request->search['titulo']);

        return $posts;
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
        $post = Post::findOrFail($id);
        return view('post.edit',compact('post'));
    }
  
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('post.edit',compact('post'));
    }
  
    public function update(ProductRequest $request, $id)
    {
        $post = Post::findOrFail($id);
        $posts->autor       = $request->autor;
        $posts->titulo      = $request->titulo;
        $posts->conteudo    = $request->conteudo;
        $posts->publicacao  = $request->publicacao;
        $post->save();
        return redirect()->route('/')->with('message', 'Product updated successfully!');
    }
  
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('/')->with('alert-success','Product hasbeen deleted!');
    }
}
