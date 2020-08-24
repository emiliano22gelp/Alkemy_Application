<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App;

class ApplicationController extends Controller
{
	public function __construct(){
    	$this->middleware('auth');
	}

    public function index(){
    	$user_id=\Auth::user()->id;
    	$user= App\User::where('id', $user_id)->get();
    	$user_role = $user[0]->role;
    	return view('options', compact('user_role'));
    }

    public function newApplication(){
    	$user_id = \Auth::user()->id;
    	$user= App\User::where('id', $user_id)->get();
    	$user_role = $user[0]->role;
    	if($user_role != 'Desarrollador') {
    		return redirect()->route('index');
    	}
    	$categories = App\Category::all();
    	return view('add_app', compact('user_id', 'categories'));
    }

    public function createApp(Request $request){ 
        $request->validate([
                'name'=> 'required',
                'image'=> 'required',
                'price'=> 'required'
            ]);
        if($request->hasFile('image')){
    		$image = $request->file('image');
    		$photo = $image->getClientOriginalName();
		}
		$destination = base_path() . '/public/css';
		$image->move($destination, $photo);
        $newApp = new App\Application;
        $newApp->name = $request->name;
        $newApp->image = $photo;
        $newApp->price = $request->price;
        $newApp->category_id = $request->category_id;
        $newApp->user_id = $request->user_id;
        $newApp->save(); //se guarda el nuevo objeto
        return back()->with('mensaje', 'La aplicacion fue registrada exitosamente!');
    }

    public function myApps(){
    	$user_id = \Auth::user()->id;
    	$apps = App\Application::where('user_id', $user_id)->get();
    	return view('myApps', compact('apps'));
    }

    public function application_detail($id){
        $app = App\Application::findOrFail($id);
        if(\Auth::user()->id == $app->user_id){
        	return view('app_detail', compact('app'));
        }
        else{
        	return redirect()->route('index');
        }
    }

    public function delete_application($id){
        $app = App\Application::findOrFail($id);
        $app->delete();
        return back()->with('mensaje', 'La aplicacion fue borrada exitosamente!!');
    }

     public function editApplication($id){
        $app = App\Application::findOrFail($id);
        $user_id = \Auth::user()->id;
        $user= App\User::where('id', $user_id)->get();
        $user_role = $user[0]->role;
        if($user_role != 'Desarrollador') {
            return redirect()->route('index');
        }
        if(\Auth::user()->id == $app->user_id){
            return view('editApplication', compact('app'));   
        }
        else{
            return redirect()->route('index');
        }
    }

    public function updateApp(Request $request, $id){
        $request->validate([
                'price'=> 'required'
            ]);
        $app = App\Application::findOrFail($id);
        $app->name = $request->name;
        if($request->hasFile('image')){
            $image = $request->file('image');
            $photo = $image->getClientOriginalName();
            $destination = base_path() . '/public/css';
            $image->move($destination, $photo);
            $app->image = $photo;
        }
        else{
            $app->image = $request->img;
        }
        $app->price = $request->price;
        $app->category_id = $request->category_id;
        $app->user_id = $request->user_id;
        $app->save();
        return back()->with('mensaje', 'La aplicacion se actualizo exitosamente!');
    }

    public function allCategories(){
        $user_id = \Auth::user()->id;
        $user= App\User::where('id', $user_id)->get();
        $user_role = $user[0]->role;
        if($user_role != 'Cliente') {
            return redirect()->route('index');
        }
        else{
            $categories = DB::table('applications')->select(array('categories.*', DB::raw('COUNT(applications.category_id) as umount')))->rightJoin('categories', 'category_id', '=', 'categories.id')->groupBy('categories.id')->get();
            return view('allCategories', ['categories' => $categories]);
        }
    }

    public function apps($id){
        $category = App\Category::findOrFail($id); // para verificar que la categoria recibida realmente exista
        $category_name = $category->name;
        $user_id = \Auth::user()->id;
        $user= App\User::where('id', $user_id)->get();
        $user_role = $user[0]->role;
        if($user_role != 'Cliente') {
            return redirect()->route('index');
        }
        else{
            $count = App\Application::where('category_id', $id)->count();
            $apps = App\Application::where('category_id', $id)->get();
            return view('category_app', compact('category_name', 'count', 'apps'));
        }
    }

}
