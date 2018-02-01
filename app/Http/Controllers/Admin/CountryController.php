<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Country;

class CountryController extends Controller
{
    //atributos

    //constructores

    //metodos aqui tenemos q crear lo de las Rutas
    public function index()
    {
          $countries = Country::all();//asi se manda un parametro
          $view = view('admin.countries.index'); //la ruta admin.categories.index esta dentro de admin
          $view->with('countries',$countries);
          return $view;
    }

    public function create()
    {
          $view = view('admin.countries.create'); //la ruta admin.categories.index esta dentro de admin
          return $view;
    }
    public function store(Request $request)
    {
          $country = new Country();
          $country->name = $request->get('name');
          $country->code = $request->get('code');
          $country->published = $request->get('published');
          $country->user_created = 1;
          $country->save();
          return redirect()->route('admin.countries.index');
    }

    public function edit($id){
          $country = Country::find($id);
          $view = view('admin.countries.edit');
          $view->with('country',$country);
          return $view;

    }

    public function update(Request $request, $id){
      $country = Country::find($id);
      $country->name = $request->get('name');
      $country->code = $request->get('code');
      $country->published = $request->get('published');
      $country->user_modified = 1;
      $country->save();
      return redirect()->route('admin.countries.index');

    }

    public function show($id){
      $country = Country::find($id);
      $view = view('admin.countries.show');
      $view->with('country',$country);
      return $view;

    }

    public function delete($id){
        $country = Country::find($id);
        $country->delete();
        return redirect()->route('admin.countries.index');

    }
}
