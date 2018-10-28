<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\HomeAdvertisement;
use Toastr;
use Validator;

class HomeAdvertisementController extends Controller
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
                'text' => 'Dashboard',
            ),
            array(
                'link' => route('admin.advertisements.index'),
                'text' => 'Advertisements',
            ),
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
        $advertisements = HomeAdvertisement::orderBy('id', 'DESC') -> get();
        return view('admin.home_advertisement.index') -> with('advertisements', $advertisements) -> with('breadCrumb', $this -> breadCrumb);
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
        return view('admin.home_advertisement.create') -> with('breadCrumb', $this -> breadCrumb);
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
            'count' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect() -> back()
            ->withErrors($validator)
            ->withInput();
        }

        $ad = new HomeAdvertisement;
        $ad -> name = $request -> name;
        $ad -> count = $request -> count;
        $ad -> save();

        Toastr::success('Ad saved successfully!', 'Success');
        return redirect() -> route('admin.advertisements.index');
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
        $ad = HomeAdvertisement::findOrFail($id);
        return view('admin.home_advertisement.edit') -> with('advertisement', $ad) -> with('breadCrumb', $this -> breadCrumb);
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
            'count' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect() -> back()
            ->withErrors($validator)
            ->withInput();
        }

        $ad = HomeAdvertisement::findOrFail($id);
        $ad -> name = $request -> name;
        $ad -> count = $request -> count;
        $ad -> save();

        Toastr::success('Ad edited successfully!', 'Success');
        return redirect() -> route('admin.advertisements.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ad = HomeAdvertisement::findOrFail($id);
        $ad -> delete();

        Toastr::success('Ad deleted successfully!', 'Success');
        return redirect() -> route('admin.advertisements.index');
    }

    public function deleteMultiple(Request $request){
        $ids = $request->ids;
        $ids = explode(",", $ids);
        foreach($ids as $id){
            $ad = HomeAdvertisement::findOrFail($id);
            $ad -> delete();
        }

        return response()->json(['status'=>true,'message'=>"Client(s) deleted successfully."]);
    }
}
