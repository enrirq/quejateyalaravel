<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Valuation;

class ValuationController extends Controller
{
  //atributos

  //constructores

  //metodos aqui tenemos q crear lo de las Rutas
  public function index()
  {
        $valuations = Valuation::all();//asi se manda un parametro
        $view = view('admin.valuations.index'); //la ruta admin.categories.index esta dentro de admin
        $view->with('valuations',$valuations);
        return $view;
  }

  public function create()
  {
        $view = view('admin.valuations.create'); //la ruta admin.categories.index esta dentro de admin
        return $view;
  }
  public function store(Request $request)
  {
        $valuation = new Valuation();
        $valuation->name = $request->get('name');
        $valuation->position = $request->get('position');
        $valuation->published = $request->get('published');
        $valuation->user_created = 1;
        $valuation->save();
        return redirect()->route('admin.valuations.index');
  }

  public function edit($id){
        $valuation = Valuation::find($id);
        $view = view('admin.valuations.edit');
        $view->with('valuation',$valuation);
        return $view;

  }

  public function update(Request $request, $id){
    $valuation = Valuation::find($id);
    $valuation->name = $request->get('name');
    $valuation->position = $request->get('position');
    $valuation->published = $request->get('published');
    $valuation->user_modified = 1;
    $valuation->save();
    return redirect()->route('admin.valuations.index');

  }

  public function show($id){
    $valuation = Valuation::find($id);
    $view = view('admin.valuations.show');
    $view->with('valuation',$valuation);
    return $view;

  }

  public function delete($id){
      $valuation = Valuation::find($id);
      $valuation->delete();
      return redirect()->route('admin.valuations.index');

  }
}
