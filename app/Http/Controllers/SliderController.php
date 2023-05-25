<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\slider;

class SliderController extends Controller
{
    //
    public function addslider(){
        return view('admin.addslider');
    }

    public function sliders(){
        $sliders = slider::get();
        return view('admin.sliders')->with('sliders', $sliders);
    }
    

    public function saveslider(Request $request){

         $this->validate($request,[
                                'description1' =>'required',
                                'description2' => 'required',
                                'slider_image'=>'image|nullable|max:8999']);
        if($request->hasFile('slider_image')){
            //1: get file name wwith ext
            $fileNameWithExt=$request->file('slider_image')->getClientOriginalName();
            //2: get just file Name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //3: get just file extension
            $extension = $request->file('slider_image')->getClientOriginalExtension();
            //4: file name to store 
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;

            //5: uploader l'image

            $path = $request->file('slider_image')->storeAs('public/slider_images',$fileNameToStore);
            
        }
        else{
            $fileNameToStore = 'noimage.jpg';
        }


        $slider = new slider();

        $slider->Description_one = $request -> input('description1');
        $slider->Description_two = $request -> input('description2');
        $slider->slider_image =$fileNameToStore;
        $slider->status = 1 ;
        $slider->save();

        return redirect('/addslider')->with('status', 'the slider has been successfully added !');

    

    }

    public function edit_slider($id){
        $slider = slider::find($id);
        return view('admin.editslider')->with('slider', $slider);
    }

    public function editslider(Request $request){
        $this->validate($request,[
            'description1' =>'required',
            'description2' => 'required',
            'slider_image'=>'image|nullable|max:8999']);
        
        $slider = slider::find($request->input('id'));

        $slider->Description_one = $request -> input('description1');
        $slider->Description_two = $request -> input('description2');

        if($request->hasFile('slider_image')){
            //1: get file name wwith ext
            $fileNameWithExt=$request->file('slider_image')->getClientOriginalName();
            //2: get just file Name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //3: get just file extension
            $extension = $request->file('slider_image')->getClientOriginalExtension();
            //4: file name to store 
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;

            //5: uploader l'image

            $path = $request->file('slider_image')->storeAs('public/slider_images',$fileNameToStore);
            
        }
        if($slider->slider_image != 'noimage.jpg'){
            Storage::delete('public/slider_images/'.$slider->slider_image);

            $slider->slider_image = $fileNameToStore;

        }

        $slider->update();

        return redirect('/addslider')->with('status', 'the slider has been successfully edited !');
        
    }

    public function deleteslider($id){
        $slider = slider::find($id);

        $slider->delete();

        return redirect('/sliders')->with('status', 'slider   deleted successfully');
    }

    public function activer_slider($id){
        $slider = slider::find($id);

        $slider -> status = 1;

        $slider->update();

        return redirect('/sliders')->with('status', 'The slider  is now activated');
    }

    public function desactiver_slider($id){
        $slider = slider::find($id);

        $slider -> status = 0;

        $slider->update();

        return redirect('/sliders')->with('status', 'The slider  is now disabled ');
    }
}
