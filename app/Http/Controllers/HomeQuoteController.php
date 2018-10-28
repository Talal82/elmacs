<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\HomeQuote;
use Image;
use Validator;
use File;
use Toastr;

class HomeQuoteController extends Controller
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
                'text' => 'Home Quotes'
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
        $quote = HomeQuote::first();
        return view('admin.home_about.quotes') -> with('quote', $quote) -> with('breadCrumb', $this -> breadCrumb);
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
            'author_name' => 'required|max:255',
            'main_quote' => 'required|max:255',
            'sub_quote' => 'required',
            'bg_image' => 'sometimes|image',
        ]);

        if ($validator->fails()) {
            return redirect() -> back()
            ->withErrors($validator)
            ->withInput();
        }

        $quote = HomeQuote::findOrFail($id);
        $quote -> author_name = $request -> author_name;
        $quote -> main_quote = $request -> main_quote;
        $quote -> sub_quote = $request -> sub_quote;

        //storing person image
        if($request -> hasFile('bg_image')){
            //storing image in database and directory
            $image = $request -> file('bg_image');
            $filename = time().rand(1,1000).'_bg_image'.'.'.$image -> getClientOriginalExtension();//image intervention
            $location = public_path('uploads/images/quotes/'.$filename);
            Image::make($image) -> save($location);

            //old image name
            $oldImage = $quote -> bg_image;
            
            //saving new image in database
            $quote -> bg_image = $filename;

            //deleting old image
            File::delete(public_path('uploads/images/quotes/'. $oldImage));
        }

        $quote -> save();

        Toastr::success('Quotes updated successfully!', 'Success');
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
