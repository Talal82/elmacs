<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Nationality;
use Validator;
use Toastr;

class NationalityController extends Controller
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
                'link' => route('admin.nationality.index'),
                'text' => 'Nationalities'
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
        $nationalities = Nationality::orderBy('id', 'DESC') -> get();
        return view('admin.nationalities.index') -> with('nationalities', $nationalities) -> with('breadCrumb', $this -> breadCrumb);
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
        return view('admin.nationalities.create') -> with('breadCrumb', $this -> breadCrumb);
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
        ]);

        if ($validator->fails()) {
            return redirect() -> back()
            ->withErrors($validator)
            ->withInput();
        }

        $nationality = new Nationality;
        $nationality -> name = $request -> name;

        $nationality -> save();

        Toastr::success('Nationality Saved Successfully!', 'Success');
        return redirect() -> route('admin.nationality.index');
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
       $nationality = Nationality::findOrFail($id);
       return view('admin.nationalities.edit') -> with('nationality', $nationality) -> with('breadCrumb', $this -> breadCrumb);
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
        ]);

        if ($validator->fails()) {
            return redirect() -> back()
            ->withErrors($validator)
            ->withInput();
        }

        $nationality = Nationality::findOrFail($id);
        $nationality -> name = $request -> name;

        $nationality -> save();

        Toastr::success('Nationality updated Successfully!', 'Success');
        return redirect() -> route('admin.nationality.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nationality = Nationality::findOrFail($id);

        $nationality -> delete();

        Toastr::success('Nationality Deleted Successfully!', 'Success');
        return redirect() -> route('admin.nationality.index');
    }

    public function deleteMultiple(Request $request){
        $ids = $request->ids;
        Nationality::whereIn('id',explode(",",$ids))->delete();
        return response()->json(['status'=>true,'message'=>"Nationality(s) deleted successfully."]);
    }
}
