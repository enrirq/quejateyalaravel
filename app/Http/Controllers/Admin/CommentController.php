<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;

class CommentController extends Controller
{
  //atributos

  //constructores

  //metodos aqui tenemos q crear lo de las Rutas
  public function index()
  {
        $comments = Comment::all();//asi se manda un parametro
        $view = view('admin.comments.index'); //la ruta admin.categories.index esta dentro de admin
        $view->with('comments',$comments);
        return $view;
  }

  public function create()
  {
        $view = view('admin.comments.create'); //la ruta admin.categories.index esta dentro de admin
        return $view;
  }
  public function store(Request $request)
  {
        $comment = new Comment();
        $comment->description = $request->get('description');
        $comment->published = $request->get('published');
        $comment->user_created = 1;
        $comment->save();
        return redirect()->route('admin.comments.index');
  }

  public function edit($id){
        $comment = Comment::find($id);
        $view = view('admin.comments.edit');
        $view->with('comment',$comment);
        return $view;

  }

  public function update(Request $request, $id){
    $comment = Comment::find($id);
    $comment->description = $request->get('description');
    $comment->published = $request->get('published');
    $comment->user_modified = 1;
    $comment->save();
    return redirect()->route('admin.comments.index');

  }

  public function show($id){
    $comment = Comment::find($id);
    $view = view('admin.comments.show');
    $view->with('comment',$comment);
    return $view;

  }

  public function delete($id){
      $comment = Comment::find($id);
      $comment->delete();
      return redirect()->route('admin.comments.index');

  }
}
