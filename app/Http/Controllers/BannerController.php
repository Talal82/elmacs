<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Banner;
use Image;
use File;
use Validator;
use Toastr;

class BannerController extends Controller
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
                'text' => 'Banners'
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
    public function show($type)
    {
        $banner = Banner::where('type', strtolower($type)) -> first();
        return view('admin.banners.show') -> with('banner', $banner) -> with('breadCrumb', $this -> breadCrumb);
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
            'image' => 'sometimes|image'
        ]);

        if ($validator->fails()) {
            return redirect() -> back()
            ->withErrors($validator)
            ->withInput();
        }

        $banner = Banner::findOrFail($id);

        if($request -> hasFile('image')){
            //storing image in database and directory
            $image = $request -> file('image');
            $filename = time().rand(1,1000).'_banner'.'.'.$image -> getClientOriginalExtension();//image intervention
            $location = public_path('uploads/images/banners/'.$filename);
            Image::make($image) -> save($location);

            //old image name
            $oldImage = $banner -> image;
            
            //saving new image in database
            $banner -> image = $filename;

            //deleting old image
            File::delete(public_path('uploads/images/banners/'. $oldImage));
        }

        $banner -> save();

        Toastr::success('Banner Updated Successfully!', 'Success');
        return redirect() -> back();
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
