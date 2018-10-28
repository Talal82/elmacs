<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\HomeAbout;
use Validator;
use File;
use Image;
use Toastr;

class HomeAboutController extends Controller
{
    protected $breadCrumb;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this -> breadCrumb = array(
            array(
                'link' => route('home'),
                'text' => 'Dashboard'
            ),
        );
    }

    public function shortAbout(){
    	$crumb = array(
            'link' => '',
            'text' => 'Short About'
        );
        array_push($this -> breadCrumb, $crumb);
        $about = HomeAbout::first();
        return view('admin.home_about.short_about') -> with('about', $about) -> with('breadCrumb', $this -> breadCrumb);
    }

    public function updateShortAbout(Request $request, $id){
    	$validator = Validator::make($request->all(), [
            'short_about' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect() -> back()
            ->withErrors($validator)
            ->withInput();
        }

        $about = HomeAbout::findOrFail($id);
        $about -> short_about = $request -> short_about;
        $about -> save();

        Toastr::success('Home About updated successfully!', 'Success');
        return redirect() -> back();
    }

    public function chairmanInfo(){
    	$crumb = array(
            'link' => '',
            'text' => 'Chairman Info'
        );
        array_push($this -> breadCrumb, $crumb);
        $about = HomeAbout::first();
        return view('admin.home_about.chairman_info') -> with('about', $about) -> with('breadCrumb', $this -> breadCrumb);
    }

    public function updateChairmanInfo(Request $request, $id){
    	$validator = Validator::make($request->all(), [
            'message_title' => 'required|max:255',
            'message_detail' => 'required',
            'chairman_image' => 'sometimes|image',
            'bg_image' => 'sometimes|image',
        ]);

        if ($validator->fails()) {
            return redirect() -> back()
            ->withErrors($validator)
            ->withInput();
        }

        $about = HomeAbout::findOrFail($id);
        $about -> message_title = $request -> message_title;
        $about -> message_detail = $request -> message_detail;

        //storing person image
        if($request -> hasFile('chairman_image')){
            //storing image in database and directory
            $image = $request -> file('chairman_image');
            $filename = time().rand(1,1000).'_chairman_image'.'.'.$image -> getClientOriginalExtension();//image intervention
            $location = public_path('uploads/images/chairman/'.$filename);
            Image::make($image) -> save($location);

            //old image name
            $oldImage = $about -> chairman_image;
            
            //saving new image in database
            $about -> chairman_image = $filename;

            //deleting old image
            File::delete(public_path('uploads/images/chairman/'. $oldImage));
        }

        //storing person image
        if($request -> hasFile('bg_image')){
            //storing image in database and directory
            $image = $request -> file('bg_image');
            $filename = time().rand(1,1000).'_bg_image'.'.'.$image -> getClientOriginalExtension();//image intervention
            $location = public_path('uploads/images/chairman/'.$filename);
            Image::make($image) -> save($location);

            //old image name
            $oldImage = $about -> bg_image;
            
            //saving new image in database
            $about -> bg_image = $filename;

            //deleting old image
            File::delete(public_path('uploads/images/chairman/'. $oldImage));
        }

        $about -> save();

        Toastr::success('Chairman Info updated successfully!', 'Success');
        return redirect() -> back();
    }
}
