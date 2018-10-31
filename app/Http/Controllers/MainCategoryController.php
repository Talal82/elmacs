<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;
use Toastr;
use App\MainCategory;
use App\SubCategory;
use Session;

class MainCategoryController extends Controller
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
                'link' => route('admin.main-categories.index'),
                'text' => 'Project Categories',
            ),
            array(
                'link' => '',
                'text' => 'Main Category',
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
        $mainCategories = MainCategory::orderBy('id', 'DESC') -> get();
        return view('admin.main_categories.index') -> with('mainCategories', $mainCategories) -> with('breadCrumb', $this -> breadCrumb);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.main_categories.create') -> with('breadCrumb', $this -> breadCrumb);
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

        $category = new MainCategory;
        $category -> name = $request -> name;

        $category -> save();

        Toastr::success('Category Saved Successfully!', 'Success');
        return redirect() -> route('admin.main-categories.index');
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
        $category = MainCategory::findOrFail($id);
        return view('admin.main_categories.edit') -> with('category', $category) -> with('breadCrumb', $this -> breadCrumb);
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

        $category = MainCategory::findOrFail($id);
        $category -> name = $request -> name;

        $category -> save();

        Toastr::success('Category edited Successfully!', 'Success');
        return redirect() -> route('admin.main-categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = MainCategory::findOrFail($id);
        $projects = $category -> mainProjects;
        $subs = $category -> subCategories;
        if(count($subs) > 0){
            Session::flash('error', 'This category cannot be deleted because it has sub categories.');
            return redirect() -> back();
        }
        else if(count($projects) > 0){
            Session::flash('error', 'This category cannot be deleted because it has projects.');
            return redirect() -> back();
        }
        else{
            $category -> delete();

            Toastr::success('Category deleted successfully!', 'Success');
            return redirect() -> route('admin.main-categories.index');
        }
    }
}
