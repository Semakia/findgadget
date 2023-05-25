<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Gadget;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class GadgetController extends Controller
{
    //

    public function addgadget(){
        $categories = Category::get()->pluck('category_name');
        //print($categories);
        return view('admin.addgadget')->with('categories', $categories);
    }

    public function savegadget(Request $request){

        $this->validate($request,[
                                'gadget_name' =>'required|unique:gadgets',
                                  'gadget_price' => 'required',
                                   'gadget_description' => 'required',
                                   'gadget_image'=>'image|nullable|max:20000',
                                   'gadget_category'=>'required']);
        if($request->hasFile('gadget_image')){
            //1: get file name wwith ext
            $fileNameWithExt=$request->file('gadget_image')->getClientOriginalName();
            //2: get just file Name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //3: get just file extension
            $extension = $request->file('gadget_image')->getClientOriginalExtension();
            //4: file name to store 
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;

            //5: uploader l'image

            $path = $request->file('gadget_image')->storeAs('public/gadget_images',$fileNameToStore);
            
        }
        else{
            $fileNameToStore = 'noimage.jpg';
        }


        $gadget = new Gadget();
        $category = Category::where('category_name', $request->input('gadget_category'))->first();

        $gadget->gadget_name = $request -> input('gadget_name');
        $gadget->gadget_price = $request -> input('gadget_price');
        $gadget->description = $request -> input('gadget_description');
        $gadget->gadget_category = $request -> input('gadget_category');
        $gadget->gadget_image =$fileNameToStore;
        $gadget->category_id = optional($category)->id;
        $gadget->status = 1 ;
        $gadget->save();

        return redirect('/addgadget')->with('status', 'the gadget.'.$gadget->gadget_name.' has been successfully added !');

    }

    public function edit_gadget($id){
        $categories = Category::All()->pluck('category_name', 'category_name');
        $gadget = Gadget::find($id);
        return view('admin.editgadget')->with('gadget', $gadget)->with('categories', $categories);
    }


    public function editgadget(Request $request){
       
        $this->validate($request,[
            'gadget_name' =>'required',
              'gadget_price' => 'required',
               'gadget_description' => 'required',
               'gadget_image'=>'image|nullable|max:1999',
               'gadget_category'=>'required']);


        $gadget =  Gadget::find($request->input('id'));

        $gadget->gadget_name = $request -> input('gadget_name');
        $gadget->gadget_price = $request -> input('gadget_price');
        $gadget->description = $request -> input('gadget_description');
        $gadget->gadget_category = $request -> input('gadget_category');
        
               
        if($request->hasFile('gadget_image')){
             //1: get file name wwith ext
            $fileNameWithExt=$request->file('gadget_image')->getClientOriginalName();
            //2: get just file Name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //3: get just file extension
            $extension = $request->file('gadget_image')->getClientOriginalExtension();
            //4: file name to store 
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;

            //5: uploader l'image

            $path = $request->file('gadget_image')->storeAs('public/gadget_images',$fileNameToStore);

            if($gadget->gadget_image != 'noimage.jpg'){
                Storage::delete('public/gadget_images/'.$gadget->gadget_image);

                $gadget->gadget_image = $fileNameToStore;
            }

            $gadget->update();

            return redirect('/gadgetslist')->with('status', 'the gadget.'.$gadget->gadget_name.' has been successfully edited !');

           

        }
    }

    public function deletegadget($id){
        $gadget = Gadget::find($id);

        $gadget->delete();

        return redirect('/gadgetslist')->with('status', 'Gadget  '.$gadget->gadget_name.' deleted successfully');
    }
    
    public function activer_gadget($id){
        $gadget = Gadget::find($id);

        $gadget -> status = 1;

        $gadget->update();

        return redirect('/gadgetslist')->with('status', 'The gadget '.$gadget->gadget_name.' is now available ');

    }

    public function desactiver_gadget($id){
        $gadget = Gadget::find($id);

        $gadget -> status = 0;

        $gadget->update();

        return redirect('/gadgetslist')->with('status', 'The gadget '.$gadget->gadget_name.'  is now unavailable ');

    }

}
