<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Client;
use Toastr;
use Validator;
use Image;
use File;

class ClientController extends Controller
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
        $clients = Client::orderBy('id', 'DESC') -> get();
        return view('admin.clients.index') -> with('clients', $clients) -> with('breadCrumb', $this -> breadCrumb);
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
        return view('admin.clients.create') -> with('breadCrumb', $this -> breadCrumb);
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
            'link' => 'required|max:255',
            'image' => 'required|image'
        ]);

        if ($validator->fails()) {
            return redirect() -> back()
            ->withErrors($validator)
            ->withInput();
        }

        $client = new Client;
        $client -> link = $request -> link;

        //storing person image
        if($request -> hasFile('image')){
            //storing image in database and directory
            $image = $request -> file('image');
            $filename = time().rand(1,1000).'_client'.'.'.$image -> getClientOriginalExtension();//image intervention
            $location = public_path('uploads/images/clients/'.$filename);
            Image::make($image) -> save($location);
            
            //saving in database
            $client -> image = $filename;
        }

        $client -> save();

        Toastr::success('Client Saved Successfully!', 'Success');
        return redirect() -> route('admin.clients.index');
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
        $client = Client::findOrFail($id);
        return view('admin.clients.edit') -> with('client', $client) -> with('breadCrumb', $this -> breadCrumb);
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
            'link' => 'required|max:255',
            'image' => 'sometimes|image'
        ]);

        if ($validator->fails()) {
            return redirect() -> back()
            ->withErrors($validator)
            ->withInput();
        }

        $client = Client::findOrFail($id);
        $client -> link = $request -> link;

        //storing person image
        if($request -> hasFile('image')){
            //storing image in database and directory
            $image = $request -> file('image');
            $filename = time().rand(1,1000).'_client'.'.'.$image -> getClientOriginalExtension();//image intervention
            $location = public_path('uploads/images/clients/'.$filename);
            Image::make($image) -> save($location);

            //old image name
            $oldImage = $client -> image;
            
            //saving new image in database
            $client -> image = $filename;

            //deleting old image
            File::delete(public_path('uploads/images/clients/'. $oldImage));
        }

        $client -> save();

        Toastr::success('Client Edited Successfully!', 'Success');
        return redirect() -> route('admin.clients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        $image = $client -> image;

        $client -> delete();
        File::delete(public_path('uploads/images/clients/'.$image));

        Toastr::success('Client Deleted Successfully!', 'Success');
        return redirect() -> route('admin.clients.index');
    }

    public function deleteMultiple(Request $request){
        // $ids = $request->ids;
        // Client::whereIn('id',explode(",",$ids))->delete();
        $ids = $request->ids;
        $ids = explode(",", $ids);
        foreach($ids as $id){
            $client = Client::findOrFail($id);
            $imageName = $client -> image;
            $client -> delete();
            File::delete(public_path('uploads/images/clients/'. $imageName));
        }

        return response()->json(['status'=>true,'message'=>"Client(s) deleted successfully."]);
    }
}
