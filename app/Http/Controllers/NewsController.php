<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\News;
use Validator;
use Toastr;
use File;
use Image;

class NewsController extends Controller
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
                'link' => route('admin.news.index'),
                'text' => 'News'
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
        $news = News::orderBy('id', 'DESC') -> get();
        return view('admin.news.index') -> with('news', $news) -> with('breadCrumb', $this -> breadCrumb);
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
        return view('admin.news.create') -> with('breadCrumb', $this -> breadCrumb);
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
            'heading' => 'required|max:255',
            'detail' => 'required',
            'image' => 'required|image'
        ]);

        if ($validator->fails()) {
            return redirect() -> back()
            ->withErrors($validator)
            ->withInput();
        }

        $news = new News;
        $news -> heading = $request -> heading;
        $news -> detail = $request -> detail;

        if($request -> hasFile('image')){
            //storing image in database and directory
            $image = $request -> file('image');
            $filename = time().rand(1,1000).'_news'.'.'.$image -> getClientOriginalExtension();//image intervention
            $location = public_path('uploads/images/news/'.$filename);
            Image::make($image) -> save($location);
            
            //saving in database
            $news -> image = $filename;
        }

        $news -> save();

        Toastr::success('News Saved successfully!', 'Success');
        return redirect() -> route('admin.news.index');
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
        $news = News::findOrFail($id);
        return view('admin.news.edit') -> with('news', $news) -> with('breadCrumb', $this -> breadCrumb);
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
            'heading' => 'required|max:255',
            'detail' => 'required',
            'image' => 'sometimes|image'
        ]);

        if ($validator->fails()) {
            return redirect() -> back()
            ->withErrors($validator)
            ->withInput();
        }

        $news = News::findOrFail($id);
        $news -> heading = $request -> heading;
        $news -> detail = $request -> detail;

        //storing person image
        if($request -> hasFile('image')){
            //storing image in database and directory
            $image = $request -> file('image');
            $filename = time().rand(1,1000).'_news'.'.'.$image -> getClientOriginalExtension();//image intervention
            $location = public_path('uploads/images/news/'.$filename);
            Image::make($image) -> save($location);

            //old image name
            $oldImage = $news -> image;
            
            //saving new image in database
            $news -> image = $filename;

            //deleting old image
            File::delete(public_path('uploads/images/news/'. $oldImage));
        }


        $news -> save();

        Toastr::success('News updated successfully!', 'Success');
        return redirect() -> route('admin.news.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::findOrFail($id);
        $image = $news -> image;

        $news -> delete();
        File::delete(public_path('uploads/images/news/'.$image));

        Toastr::success('News Deleted Successfully!', 'Success');
        return redirect() -> route('admin.news.index');
    }

    public function deleteMultiple(Request $request){

        $ids = $request->ids;
        $ids = explode(",", $ids);
        foreach($ids as $id){
            $news = News::findOrFail($id);
            $image = $news -> image;
            $news -> delete();
            File::delete(public_path('uploads/images/news/'. $image));
        }

        return response()->json(['status'=>true,'message'=>"News deleted successfully."]);
    }
}
