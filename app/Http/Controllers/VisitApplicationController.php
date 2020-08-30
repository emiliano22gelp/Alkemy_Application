<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App;

class VisitApplicationController extends Controller
{
   
   public function visitCategories(){
        if (Auth::check()){
            return redirect()->route('index');
        }
        else{
            $categories = DB::table('applications')->select(array('categories.*', DB::raw('COUNT(applications.category_id) as umount')))->rightJoin('categories', 'category_id', '=', 'categories.id')->groupBy('categories.id')->orderBy('categories.name')->get();
            return view('allCategories', ['categories' => $categories]);
        }   
   }

   public function visitApps($id){
       if (Auth::check()){
           return redirect()->route('index');
       }
       else{
            $category = App\Category::findOrFail($id); // para verificar que la categoria recibida realmente exista
            $category_name = $category->name;
            $count = App\Application::where('category_id', $id)->count();
            $apps = App\Application::where('category_id', $id)->orderBy('created_at', 'desc')->paginate(10);
            return view('category_app', compact('category_name', 'count', 'apps'));
       }
   }

   public function visit_Detail_App($id){
       if (Auth::check()){
           return redirect()->route('index');
       }
       else{
            $app = App\Application::findOrFail($id);
            return view('app_detail', compact('app'));
       }
   }
   
}
