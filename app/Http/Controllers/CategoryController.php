<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
class CategoryController extends Controller
{


    public function addcategory(){
        return view('admin.addcategory');
    }

    public function savecategory(Request $request ){

        $this->validate($request, ['category_name' =>'required|unique:categories']);
        $category = new category();

        $category->category_name = $request -> input('category_name');

        $category->save();
        return redirect('/addcategory')->with('status', 'category '.$category->category_name.'added successfully');

       
   
    }

    public function edit_category($id){
        $category = category::find($id);

        return view('admin.editcategory')->with('category', $category);
    }

    public function editcategory(Request $request){
        
        $this->validate($request, ['category_name' =>'required|unique:categories']);

        $category = category::find($request->input('id'));

        $category->category_name = $request -> input('category_name');

        $category->update();
        return redirect('/gadgetslist')->with('status', 'category  '.$category->category_name.' edited successfully');
    }


    public function deletecategory($id){

        $category = category::find($id);

        $category->delete();

        return redirect('/gadgetslist')->with('status', 'category  '.$category->category_name.' deleted successfully');
    }

    



    


}
