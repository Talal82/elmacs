<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\Middleware\ShareErrorsFromSession;

use App\Http\Requests;
use App\Career;
use Toastr;
use Validator;

class CareerController extends Controller
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
                'link' => route('admin.careers.index'),
                'text' => 'Careers'
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
        $careers = Career::orderBy('id', 'DESC') -> get();
        return view('admin.careers.index') -> with('careers', $careers) -> with('breadCrumb', $this -> breadCrumb);
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
        return view('admin.careers.create') -> with('breadCrumb', $this -> breadCrumb);
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
            'title' => 'required|string|max:255',
            'seats' => 'required|numeric',
            'detail' => 'required|string|max:1000',
        ]);

        if ($validator->fails()) {
            return redirect() -> back()
            ->withErrors($validator)
            ->withInput();
        }

        $career = new Career;
        $career -> title = $request -> title;
        $career -> seats = $request -> seats;
        $career -> detail = $request -> detail;

        $career -> save();

        Toastr::success('Job Created Successfully!', 'Success');
        return redirect() -> route('admin.careers.index');
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
        $career = Career::findOrFail($id);
        return view('admin.careers.edit') -> with('career', $career) -> with('breadCrumb', $this -> breadCrumb);
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
            'title' => 'required|string|max:255',
            'seats' => 'required|numeric',
            'detail' => 'required|string|max:1000',
        ]);

        if ($validator->fails()) {
            return redirect() -> back()
            ->withErrors($validator)
            ->withInput();
        }

        $career = Career::findOrFail($id);
        $career -> title = $request -> title;
        $career -> seats = $request -> seats;
        $career -> detail = $request -> detail;

        $career -> save();

        Toastr::success('Job Edited Successfully!', 'Success');
        return redirect() -> route('admin.careers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $career = Career::findOrFail($id);
        $career -> delete();

        Toastr::success('Job Deleted Successfully!', 'Success');
        return redirect() -> route('admin.careers.index');
    }

    public function deleteMultiple(Request $request){
        $ids = $request->ids;
        Career::whereIn('id',explode(",",$ids))->delete();
        return response()->json(['status'=>true,'message'=>"Job(s) deleted successfully."]);
    }
}
