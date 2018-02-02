<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Priority;

class PriorityController extends Controller
{
  //atributos

  //constructores

  //metodos aqui tenemos q crear lo de las Rutas
  public function index()
  {
        $priorities = Priority::all();//asi se manda un parametro
        $view = view('admin.priorities.index'); //la ruta admin.priorities.index esta dentro de admin
        $view->with('priorities',$priorities);
        return $view;
  }

  public function create()
  {
        $view = view('admin.priorities.create'); //la ruta admin.priorities.index esta dentro de admin
        return $view;
  }
  public function store(Request $request)
  {
        $priority = new Priority();
        $priority->name = $request->get('name');
        $priority->level = $request->get('level');
        $priority->color = $request->get('color');
        $priority->published = $request->get('published');
        $priority->user_created = 1;
        $priority->save();
        return redirect()->route('admin.priorities.index');
  }

  public function edit($id){
        $priority = Priority::find($id);
        $view = view('admin.priorities.edit');
        $view->with('priority',$priority);
        return $view;

  }

  public function update(Request $request, $id){
    $priority = Priority::find($id);
    $priority->name = $request->get('name');
    $priority->level = $request->get('level');
    $priority->color = $request->get('color');
    $priority->published = $request->get('published');
    $priority->user_modified = 1;
    $priority->save();
    return redirect()->route('admin.priorities.index');

  }

  public function show($id){
    $priority = Priority::find($id);
    $view = view('admin.priorities.show');
    $view->with('priority',$priority);
    return $view;

  }

  public function delete($id){
      $priority = Priority::find($id);
      $priority->delete();
      return redirect()->route('admin.priorities.index');

  }
}
