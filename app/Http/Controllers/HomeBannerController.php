<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\HomeBanner;
use Image;
use File;
use Toastr;
use Validator;

class HomeBannerController extends Controller
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
                'link' => route('admin.clients.index'),
                'text' => 'Clients'
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
        $crumb = array(
            'link' => '',
            'text' => 'Index'
        );
        array_push($this -> breadCrumb, $crumb);
        $banners = HomeBanner::orderBy('id', 'DESC') -> get();
        return view('admin.home_banners.index') -> with('banners', $banners) -> with('breadCrumb', $this -> breadCrumb);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $crumb = array(
            'link' => '',
            'text' => 'Index'
        );
        array_push($this -> breadCrumb, $crumb);
        return view('admin.home_banners.create') -> with('breadCrumb', $this -> breadCrumb);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'text' => 'sometimes|max:255',
            'image' => 'required|image'
        ]);

        if ($validator->fails()) {
            return redirect() -> back()
            ->withErrors($validator)
            ->withInput();
        }

        $banner = new HomeBanner;
        $banner -> text = $request -> text;

        //storing person image
        if($request -> hasFile('image')){
            //storing image in database and directory
            $image = $request -> file('image');
            $filename = time().rand(1,1000).'_home_banner'.'.'.$image -> getClientOriginalExtension();//image intervention
            $location = public_path('uploads/images/banners/'.$filename);
            Image::make($image) -> save($location);
            
            //saving in database
            $banner -> image = $filename;
        }

        $banner -> save();

        Toastr::success('Banner Saved Successfully!', 'Success');
        return redirect() -> route('admin.home-banners.index');
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
        $crumb = array(
            'link' => '',
            'text' => 'Edit'
        );
        array_push($this -> breadCrumb, $crumb);
        $banner = HomeBanner::findOrFail($id);
        return view('admin.home_banners.edit') -> with('banner', $banner) -> with('breadCrumb', $this -> breadCrumb);
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
            'text' => 'sometimes|max:255',
            'image' => 'sometimes|image'
        ]);

        if ($validator->fails()) {
            return redirect() -> back()
            ->withErrors($validator)
            ->withInput();
        }

        $banner = HomeBanner::findOrFail($id);
        $banner -> text = $request -> text;

        if($request -> hasFile('image')){
            //storing image in database and directory
            $image = $request -> file('image');
            $filename = time().rand(1,1000).'_home_banner'.'.'.$image -> getClientOriginalExtension();//image intervention
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

        Toastr::success('Banner updated Successfully!', 'Success');
        return redirect() -> route('admin.home-banners.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = HomeBanner::findOrFail($id);
        $image = $banner -> image;

        $banner -> delete();
        File::delete(public_path('uploads/images/banners/'.$image));

        Toastr::success('Banner Deleted Successfully!', 'Success');
        return redirect() -> route('admin.home-banners.index');
    }

    public function deleteMultiple(Request $request){
        $ids = $request->ids;
        $ids = explode(",", $ids);
        foreach($ids as $id){
            $banner = HomeBanner::findOrFail($id);
            $imageName = $banner -> image;
            $banner -> delete();
            File::delete(public_path('uploads/images/banners/'. $imageName));
        }

        return response()->json(['status'=>true,'message'=>"Banner(s) deleted successfully."]);
    }
}
