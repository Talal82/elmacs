<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\About;
use Validator;
use Toastr;
use Session;

class AboutController extends Controller
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
                'link' => route('admin.about.index'),
                'text' => 'About-Us'
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
        $abouts = About::orderBy('id', 'DESC') -> get();

        return view('admin.about.index') -> with('abouts', $abouts) -> with('breadCrumb',$this ->breadCrumb);
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
        return view('admin.about.create') -> with('breadCrumb', $this -> breadCrumb);
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
            'tab_name' => 'required|string',
            'tab_detail' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect() -> back()
            ->withErrors($validator)
            ->withInput();
        }

        $about = new About;
        $about -> tab_name = $request -> tab_name;
        $about -> tab_detail = $request -> tab_detail;

        $about -> save();

        Toastr::success('Tab saved successfully!', 'Success');
        return redirect() -> route('admin.about.index');
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
        $about = About::findOrFail($id);
        return view('admin.about.edit') -> with('about', $about) -> with('breadCrumb', $this -> breadCrumb);
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
            'tab_name' => 'required|string',
            'tab_detail' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect() -> back()
            ->withErrors($validator)
            ->withInput();
        }

        $about = About::findOrFail($id);
        $about -> tab_name = $request -> tab_name;
        $about -> tab_detail = $request -> tab_detail;

        $about -> save();

        Toastr::success('Tab saved successfully!', 'Success');
        return redirect() -> route('admin.about.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $about = findOrFail($id);
        $about -> delete();

        Toastr::success('Tab Delete Successfully!', 'Success');
        return redirect() -> route('admin.about.index');
    }

    public function deleteMultiple(Request $request){
        $ids = $request->ids;
        $ids = explode(",", $ids);
        foreach($ids as $id){
            $about = About::findOrFail($id);
            $about -> delete();
        }
        return response()->json(['status'=>true,'message'=>"Tab(s) deleted successfully."]);
    }
}
