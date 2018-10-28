<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Certificate;
use Image;
use Toastr;
use File;
use Validator;

class CertificateController extends Controller
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
                'link' => route('admin.certificates.index'),
                'text' => 'Certificates'
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
        $certificates = Certificate::orderBy('id', 'DESC') -> get();
        return view('admin.certificates.index') -> with('certificates', $certificates) -> with('breadCrumb', $this -> breadCrumb);
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
        return view('admin.certificates.create') -> with('breadCrumb', $this -> breadCrumb);
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
            'image' => 'required|image'
        ]);

        if ($validator->fails()) {
            return redirect() -> back()
            ->withErrors($validator)
            ->withInput();
        }

        $certificate = new Certificate;
        $certificate -> name = $request -> name;

        if($request -> hasFile('image')){
            //storing image in database and directory
            $image = $request -> file('image');
            $filename = time().rand(1,1000).'_certificate'.'.'.$image -> getClientOriginalExtension();//image intervention
            $location = public_path('uploads/images/certificates/'.$filename);
            Image::make($image) -> save($location);
            
            //saving in database
            $certificate -> image = $filename;
        }

        $certificate -> save();

        Toastr::success('Certificate saved successfully!', 'Success');
        return redirect() -> route('admin.certificates.index');
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
        $certificate = Certificate::findOrFail($id);
        return view('admin.certificates.edit') -> with('certificate', $certificate) -> with('breadCrumb', $this -> breadCrumb);
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
            'image' => 'sometimes|image'
        ]);

        if ($validator->fails()) {
            return redirect() -> back()
            ->withErrors($validator)
            ->withInput();
        }

        $certificate = Certificate::findOrFail($id);
        $certificate -> name = $request -> name;

        if($request -> hasFile('image')){
            //storing image in database and directory
            $image = $request -> file('image');
            $filename = time().rand(1,1000).'_client'.'.'.$image -> getClientOriginalExtension();//image intervention
            $location = public_path('uploads/images/certificates/'.$filename);
            Image::make($image) -> save($location);

            //old image name
            $oldImage = $certificate -> image;
            
            //saving new image in database
            $certificate -> image = $filename;

            //deleting old image
            File::delete(public_path('uploads/images/certificates/'. $oldImage));
        }

        $certificate -> save();

        Toastr::success('Certificate updated successfully!', 'Success');
        return redirect() -> route('admin.certificates.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $certificate = Certificate::findOrFail($id);
        $image = $certificate -> image;

        $certificate -> delete();
        File::delete(public_path('uploads/images/certificates/'.$image));

        Toastr::success('Certificate Deleted Successfully!', 'Success');
        return redirect() -> route('admin.certificates.index');
    }

    public function deleteMultiple(Request $request){

        $ids = $request->ids;
        $ids = explode(",", $ids);
        foreach($ids as $id){
            $certificate = Certificate::findOrFail($id);
            $imageName = $certificate -> image;
            $certificate -> delete();
            File::delete(public_path('uploads/images/certificates/'. $imageName));
        }

        return response()->json(['status'=>true,'message'=>"Certificate(s) deleted successfully."]);
    }
}
