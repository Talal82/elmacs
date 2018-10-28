<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Footer;
use App\SocialIcon;
use Validator;
use Toastr;
use File;
use Image;

class SettingsController extends Controller
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
            array(
                'link' => '',
                'text' => 'General Settings'
            )
        );
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $footer = Footer::first();
        $socialIcons = SocialIcon::first();
        return view('admin.settings.general_settings') -> with('socialIcons', $socialIcons) -> with('footer', $footer) -> with('breadCrumb', $this -> breadCrumb);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'logo' => 'sometimes|image',
            'detail' => 'required',
            'contact_title' => 'required|string',
            'contact_detail' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect() -> back()
            ->withErrors($validator)
            ->withInput();
        }

        $footer = Footer::findOrFail($id);
        $footer -> detail = $request -> detail;
        $footer -> contact_title = $request -> contact_title;
        $footer -> contact_detail = $request -> contact_detail;

        //storing person image
        if($request -> hasFile('logo')){
            //storing image in database and directory
            $image = $request -> file('logo');
            $filename = time().rand(1,1000).'_logo'.'.'.$image -> getClientOriginalExtension();//image intervention
            $location = public_path('uploads/images/logos/'.$filename);
            Image::make($image) -> save($location);

            //old image name
            $oldImage = $footer -> logo;
            
            //saving new image in database
            $footer -> logo = $filename;

            //deleting old image
            File::delete(public_path('uploads/images/logos/'. $oldImage));
        }

        $footer -> save();

        Toastr::success('Information Edited Successfully!', 'Success');
        return redirect() -> route('admin.settings.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
