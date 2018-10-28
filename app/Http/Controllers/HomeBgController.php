<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\HomeBg;
use Toastr;
use Validator;
use Image;
use File;

class HomeBgController extends Controller
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
                'text' => 'Backgrounds'
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
        $bg = HomeBg::first();
        return view('admin.bg.index') -> with('bg', $bg) -> with('breadCrumb', $this -> breadCrumb);
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
            'hiring_bg' => 'sometimes|image',
            'advertisement_bg' => 'sometimes|image'
        ]);
        if ($validator->fails()) {
            return redirect() -> back()
            ->withErrors($validator)
            ->withInput();
        }

        $bg = HomeBg::findOrFail($id);
        //storing hiring image
        if($request -> hasFile('hiring_bg')){
            //storing image in database and directory
            $image = $request -> file('hiring_bg');
            $filename = time().rand(1,1000).'_hiring_bg'.'.'.$image -> getClientOriginalExtension();//image intervention
            $location = public_path('uploads/images/bg/'.$filename);
            Image::make($image) -> save($location);

            //old image name
            $oldImage = $bg -> hiring_bg;
            
            //saving new image in database
            $bg -> hiring_bg = $filename;

            //deleting old image
            File::delete(public_path('uploads/images/bg/'. $oldImage));
        }

        //storing person image
        if($request -> hasFile('advertisement_bg')){
            //storing image in database and directory
            $image = $request -> file('advertisement_bg');
            $filename = time().rand(1,1000).'_advertisement_bg'.'.'.$image -> getClientOriginalExtension();//image intervention
            $location = public_path('uploads/images/bg/'.$filename);
            Image::make($image) -> save($location);

            //old image name
            $oldImage = $bg -> advertisement_bg;
            
            //saving new image in database
            $bg -> advertisement_bg = $filename;

            //deleting old image
            File::delete(public_path('uploads/images/bg/'. $oldImage));
        }

        $bg -> save();

        Toastr::success('Background changed successfully!', 'Success');
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
