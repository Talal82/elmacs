<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Office;
use Validator;
use Toastr;

class OfficeController extends Controller
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
                'link' => route('admin.offices.index'),
                'text' => 'Offices'
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
        $offices = Office::orderBy('id', 'DESC') -> get();
        return view('admin.offices.index') -> with('offices', $offices) -> with('breadCrumb', $this -> breadCrumb);
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
        return view('admin.offices.create') -> with('breadCrumb', $this -> breadCrumb);
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
            'map_link' => 'required',
            'detail' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect() -> back()
            ->withErrors($validator)
            ->withInput();
        }

        $office = new Office;
        $office -> name = $request -> name;
        $office -> map_link = $request -> map_link;
        $office -> detail = $request -> detail;

        $office -> save();

        Toastr::success('Office created successfully!', 'Success');
        return redirect() -> route('admin.offices.index');
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
        $office = Office::findOrFail($id);
        return view('admin.offices.edit') -> with('office', $office) -> with('breadCrumb', $this -> breadCrumb);
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
            'map_link' => 'required',
            'detail' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect() -> back()
            ->withErrors($validator)
            ->withInput();
        }

        $office = Office::findOrFail($id);
        $office -> name = $request -> name;
        $office -> map_link = $request -> map_link;
        $office -> detail = $request -> detail;

        $office -> save();

        Toastr::success('Office updated successfully!', 'Success');
        return redirect() -> route('admin.offices.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $office = Office::findOrFail($id);
        $office -> delete();

        Toastr::success('Office deleted successfully!', 'Success');
        return redirect() -> route('admin.offices.index');
    }

    public function deleteMultiple(Request $request){
        $ids = $request->ids;
        $ids = explode(",", $ids);
        foreach($ids as $id){
            $office = Office::findOrFail($id);
            $office -> delete();
        }
        return response()->json(['status'=>true,'message'=>"Office(s) deleted successfully."]);
    }
}
