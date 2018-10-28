<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Service;
use File;
use Image;
use Toastr;
use Validator;

class ServiceController extends Controller
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
                'link' => route('admin.services.index'),
                'text' => 'Services'
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
        $services = Service::orderBy('id', 'DESC') -> get();
        return view('admin.services.index') -> with('services', $services) -> with('breadCrumb', $this -> breadCrumb);
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
            'text' => 'Create'
        );
        array_push($this -> breadCrumb, $crumb);
        return view('admin.services.create') -> with('breadCrumb', $this -> breadCrumb);
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
            'name' => 'required|max:255',
            'detail' => 'required',
            'main_image' => 'required|image',
        ]);

        if ($validator->fails()) {
            return redirect() -> back()
            ->withErrors($validator)
            ->withInput();
        }

        $service = new Service;
        $service -> name = $request -> name;
        $service -> detail = $request -> detail;


        if ($request->has('featured')) {
            $service -> featured = true;
        }
        else{
            $service -> featured = false;
        }

        //storing person image
        if($request -> hasFile('main_image')){
            //storing image in database and directory
            $image = $request -> file('main_image');
            $filename = time().rand(1,1000).'_service'.'.'.$image -> getClientOriginalExtension();//image intervention
            $location = public_path('uploads/images/services/'.$filename);
            Image::make($image) -> save($location);
            //saving in database
            $service -> main_image = $filename;
        }

        $service -> save();

        Toastr::success('Service saved successfully!', 'Success');
        return redirect() -> route('admin.services.index');
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
        $service = Service::findOrFail($id);
        return view('admin.services.edit') -> with('service', $service) -> with('breadCrumb', $this -> breadCrumb);
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
            'name' => 'required|max:255',
            'detail' => 'required',
            'main_image' => 'sometimes|image',
        ]);

        if ($validator->fails()) {
            return redirect() -> back()
            ->withErrors($validator)
            ->withInput();
        }

        $service = Service::findOrFail($id);
        $service -> name = $request -> name;
        $service -> detail = $request -> detail;


        if ($request->has('featured')) {
            $service -> featured = true;
        }
        else{
            $service -> featured = false;
        }

        //storing person image
        if($request -> hasFile('main_image')){
            //storing image in database and directory
            $image = $request -> file('main_image');
            $filename = time().rand(1,1000).'_service'.'.'.$image -> getClientOriginalExtension();//image intervention
            $location = public_path('uploads/images/services/'.$filename);
            Image::make($image) -> save($location);

            //old image name
            $oldImage = $service -> main_image;
            
            //saving new image in database
            $service -> main_image = $filename;

            //deleting old image
            File::delete(public_path('uploads/images/services/'. $oldImage));
        }


        $service -> save();

        Toastr::success('Service edited successfully!', 'Success');
        return redirect() -> route('admin.services.index');
    }

    public function changeFeatured($id){
        $service = Service::findOrFail($id);
        if($service -> featured == true){
            $service -> featured = false;
        }
        else{
            $service -> featured = true;
        }

        $service -> save();

        Toastr::success('Status changed successfully!', 'Success');
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
        $service = Service::findOrFail($id);
        $image = $service -> main_image;

        $service -> delete();
        File::delete(public_path('uploads/images/services/'.$image));

        Toastr::success('Service Deleted Successfully!', 'Success');
        return redirect() -> route('admin.services.index');
    }

    public function deleteMultiple(Request $request){
        $ids = $request->ids;
        $ids = explode(",", $ids);
        foreach($ids as $id){
            $service = Service::findOrFail($id);
            $imageName = $service -> main_image;
            $service -> delete();
            File::delete(public_path('uploads/images/services/'. $imageName));
        }

        return response()->json(['status'=>true,'message'=>"Service(s) deleted successfully."]);
    }
}
