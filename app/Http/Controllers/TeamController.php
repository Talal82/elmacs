<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Team;
use Validator;
use Image;
use File;
use Toastr;

class TeamController extends Controller
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
                'link' => route('admin.teams.index'),
                'text' => 'Teams'
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
        $teams = Team::orderBy('id', 'DESC') -> get();

        return view('admin.teams.index') -> with('teams', $teams) -> with('breadCrumb',$this ->breadCrumb);
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
        return view('admin.teams.create') -> with('breadCrumb', $this -> breadCrumb);
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
            'name' => 'required|string',
            'role' => 'required|string',
            'detail' => 'required',
            'image' => 'required|image',
        ]);

        if ($validator->fails()) {
            return redirect() -> back()
            ->withErrors($validator)
            ->withInput();
        }

        $member = new Team;
        $member -> name = $request -> name;
        $member -> role = $request -> role;
        $member -> detail = $request -> detail;

        if($request -> hasFile('image')){
            //storing image in database and directory
            $image = $request -> file('image');
            $filename = time().rand(1,1000).'_member'.'.'.$image -> getClientOriginalExtension();//image intervention
            $location = public_path('uploads/images/teams/'.$filename);
            Image::make($image) -> save($location);
            
            //saving in database
            $member -> image = $filename;
        }

        $member -> save();

        Toastr::success('Team Member saved successfully!', 'Success');
        return redirect() -> route('admin.teams.index');
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
            'text' => 'Create'
        );
        array_push($this -> breadCrumb, $crumb);
        $member = Team::findOrFail($id);
        return view('admin.teams.edit') -> with('member', $member) -> with('breadCrumb', $this -> breadCrumb);
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
            'name' => 'required|string',
            'role' => 'required|string',
            'detail' => 'required',
            'image' => 'sometimes|image',
        ]);

        if ($validator->fails()) {
            return redirect() -> back()
            ->withErrors($validator)
            ->withInput();
        }

        $member = Team::findOrFail($id);
        $member -> name = $request -> name;
        $member -> role = $request -> role;
        $member -> detail = $request -> detail;
        if($request -> hasFile('image')){
            //storing image in database and directory
            $image = $request -> file('image');
            $filename = time().rand(1,1000).'_member'.'.'.$image -> getClientOriginalExtension();//image intervention
            $location = public_path('uploads/images/teams/'.$filename);
            Image::make($image) -> save($location);

            //old image name
            $oldImage = $member -> image;
            
            //saving new image in database
            $member -> image = $filename;

            //deleting old image
            File::delete(public_path('uploads/images/teams/'. $oldImage));
        }

        $member -> save();

        Toastr::success('Member Updated Successfully!', 'Success');
        return redirect() -> route('admin.teams.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $member = Team::findOrFail($id);
        $image = $member -> image;

        $member -> delete();
        File::delete(public_path('uploads/images/teams/'.$image));

        Toastr::success('Member Deleted Successfully!', 'Success');
        return redirect() -> route('admin.teams.index');
    }

    public function deleteMultiple(Request $request){
        $ids = $request->ids;
        $ids = explode(",", $ids);
        foreach($ids as $id){
            $member = Team::findOrFail($id);
            $imageName = $member -> image;
            $member -> delete();
            File::delete(public_path('uploads/images/teams/'. $imageName));
        }

        return response()->json(['status'=>true,'message'=>"Member(s) deleted successfully."]);
    }
}
