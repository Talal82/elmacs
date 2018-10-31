<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;
use Toastr;
use Session;
use App\SubCategory;
use App\MainCategory;

class SubCategoryController extends Controller
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
                'text' => 'Sub Categories',
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

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCategories($id)
    {
        $parentCategory = MainCategory::findOrFail($id);
        $subCategories = SubCategory::where('main_category_id', $id) -> get();
        return view('admin.sub_categories.index')-> with('parentCategory', $parentCategory) -> with('subCategories', $subCategories) -> with('breadCrumb', $this -> breadCrumb); 
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createCategory($id)
    {
        $parentCategory = MainCategory::findOrFail($id);
        return view('admin.sub_categories.create') -> with('parentCategory', $parentCategory) -> with('breadCrumb', $this -> breadCrumb); 
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function storeCategory(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect() -> back()
            ->withErrors($validator)
            ->withInput();
        }

        $category = new SubCategory;
        $category -> name = $request -> name;
        $category -> main_category_id = $id;

        $category -> save();

        Toastr::success('Category Saved Successfully!', 'Success');
        return redirect() -> route('admin.sub-categories.get', $id); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mainCategories = MainCategory::all();
        return view('admin.sub_categories.create') -> with('mainCategories', $mainCategories) -> with('breadCrumb', $this -> breadCrumb);
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
        $category = SubCategory::findOrFail($id);
        return view('admin.sub_categories.edit') -> with('category', $category) -> with('breadCrumb', $this -> breadCrumb);
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

        $category = SubCategory::findOrFail($id);
        $category -> name = $request -> name;

        $category -> save();

        Toastr::success('Category edited Successfully!', 'Success');
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
        $category = SubCategory::findOrFail($id);
        $parentId = $category -> main_category_id;
        $projects = $category -> subProjects;
        if(count($projects) > 0){
            Session::flash('error', 'This sub category cannot be deleted because it has projects');
            return redirect() -> route('admin.sub-categories.get', $parentId);
        }
        else{
            $category -> delete();
            
            Toastr::success('Sub Category Deleted Successfully!', 'Success');
            return redirect() -> route('admin.sub-categories.get', $parentId);
        }
    }
}
