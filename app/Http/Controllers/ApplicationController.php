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
        $user= App\User::where('id', $user_id)->get();
        $user_role = $user[0]->role;
        if($user_role == 'Cliente') {
            $count = App\Purchase::where('user_id', $user_id)->count();
            $apps = DB::table('purchases')->select(array('applications.*'))->join('applications', 'purchases.application_id', '=', 'applications.id')->where('purchases.user_id', $user_id)->get();
            return view('myPurchases', ['apps' => $apps, 'count' => $count]);
        }
        else{
    	$apps = App\Application::where('user_id', $user_id)->get();
    	return view('myApps', compact('apps'));
        }
    }

    public function application_detail($id){
        $app = App\Application::findOrFail($id);
        $user_id = \Auth::user()->id;
        $user= App\User::where('id', $user_id)->get();
        $user_role = $user[0]->role;
        if($user_role == 'Desarrollador') {
            if(\Auth::user()->id == $app->user_id){
        	   return view('app_detail', compact('app', 'user_role'));
            }
            else{
        	   return redirect()->route('index');
            }
        }
        else{
                $purchase = $this->purchased_application($id);
                $saved_app = $this->saved_application($id);
                return view('app_detail', compact('app', 'user_role', 'purchase', 'saved_app'));
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

    public function purchased_application($app_id){   //verifica si la aplicacion recibida fue comprada por el usuario logueado
        $user_id = \Auth::user()->id;
        $purchase = App\Purchase::where('application_id', $app_id)->where('user_id', $user_id)->count();
        if($purchase == 0){
            return false;
        }
        else{
            return true;
        }
    }

    public function saved_application($app_id){   //verifica si la aplicacion recibida se encuentra en el carrito del usuario logueado
        $user_id = \Auth::user()->id;
        $saved_app = App\Shopping_Cart::where('application_id', $app_id)->where('user_id', $user_id)->count();
        if($saved_app == 0){
            return false;
        }
        else{
            return true;
        }
    }

    public function save(Request $request){       //Agrega la aplicacion recibida por ajax al carrito del usuario
        $user_id = \Auth::user()->id;
        $new_scart = new App\Shopping_Cart;
        $new_scart->user_id = $user_id;
        $new_scart->application_id = $request->app_id;
        $new_scart->save();
        echo('');
    }

    public function myShoppingCart(){
        $user_id = \Auth::user()->id;
        $user= App\User::where('id', $user_id)->get();
        $user_role = $user[0]->role;
        if($user_role != 'Cliente') {
            return redirect()->route('index');
        }
        $count = App\Shopping_Cart::where('user_id', $user_id)->count();
        $apps = DB::table('shopping__carts')->select(array('applications.*'))->join('applications', 'shopping__carts.application_id', '=', 'applications.id')->where('shopping__carts.user_id', $user_id)->get();
        return view('myShoppingCart', ['apps' => $apps, 'count' => $count]);       
    }

    public function buy(Request $request){        //Compra la aplicacion recibida por ajax y la borra del carrito
        $user_id = \Auth::user()->id;
        $new_purchase = new App\Purchase;
        $new_purchase->user_id = $user_id;
        $new_purchase->application_id = $request->app_id;
        $new_purchase->save();
        DB::table('shopping__carts')->where('user_id', $user_id)->where('application_id', $request->app_id)->delete();
        echo('');
    }

}
