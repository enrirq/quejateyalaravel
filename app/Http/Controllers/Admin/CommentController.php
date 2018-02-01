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
        $comentary = new Comment();
        $comentary->description = $request->get('description');
        $comentary->published = $request->get('published');
        $comentary->user_created = 1;
        $comentary->save();
        return redirect()->route('admin.comments.index');
  }

  public function edit($id){
        $comentary = Comment::find($id);
        $view = view('admin.comments.edit');
        $view->with('comentary',$comentary);
        return $view;

  }

  public function update(Request $request, $id){
    $comentary = Comment::find($id);
    $comentary->description = $request->get('description');
    $comentary->published = $request->get('published');
    $comentary->user_modified = 1;
    $comentary->save();
    return redirect()->route('admin.comments.index');

  }

  public function show($id){
    $comentary = Comment::find($id);
    $view = view('admin.comments.show');
    $view->with('comentary',$comentary);
    return $view;

  }

  public function delete($id){
      $comentary = Comment::find($id);
      $comentary->delete();
      return redirect()->route('admin.comments.index');

  }
}
