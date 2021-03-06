<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\MainProject;
use App\MainCategory;
use App\SubCategory;
use Image;
use File;
use Toastr;
use Session;
use Validator;

class MainProjectController extends Controller
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
    			'link' => '',
    			'text' => 'Main Projects',
    		),
    	);
    }

    public function index($id){
    	$parentCategory = MainCategory::findOrFail($id);
    	$projects = MainProject::where('main_category_id', $id) -> orderBy('id', 'DESC') -> get();
    	return view('admin.main_projects.index') -> with('parentCategory', $parentCategory) -> with('projects', $projects) -> with('breadCrumb', $this -> breadCrumb);
    }

    public function create($id){
    	$parentCategory = MainCategory::findOrFail($id);
    	return view('admin.main_projects.create') -> with('parentCategory', $parentCategory) -> with('breadCrumb', $this -> breadCrumb);
    }

    public function store(Request $request, $id){
    	$validator = Validator::make($request->all(), [
    		'name' => 'required|max:255',
    		'detail' => 'required',
    		'main_image' => 'required|image',
    	]);

    	if ($validator->fails()) {
    		return redirect() -> back()
    		->withErrors($validator)
    		->withInput();
    	}
    	$project = new MainProject;
    	$project -> name = $request -> name;
    	$project -> detail = $request -> detail;
    	$project -> main_category_id = $id;
    	$project -> visibility = true;


    	if ($request->has('featured')) {
    		$project -> featured = true;
    	}
    	else{
    		$project -> featured = false;
    	}

        //storing project image
    	if($request -> hasFile('main_image')){
            //storing image in database and directory
    		$image = $request -> file('main_image');
            $filename = time().rand(1,1000).'_project'.'.'.$image -> getClientOriginalExtension();//image intervention
            $location = public_path('uploads/images/projects/'.$filename);
            Image::make($image) -> save($location);
            //saving in database
            $project -> main_image = $filename;
        }

        $project -> save();

        Toastr::success('Project saved successfully!', 'Success');
        return redirect() -> route('admin.main-projects.index', $id);
    }

    public function edit($id){
    	// $parentCategory = SubCategory::findOrFail($id);
    	$project = MainProject::findOrFail($id);
    	return view('admin.main_projects.edit') -> with('project', $project) -> with('breadCrumb', $this -> breadCrumb);
    }

    public function update(Request $request, $id){
    	$validator = Validator::make($request->all(), [
    		'name' => 'required|max:255',
    		'detail' => 'required',
    		'main_image' => 'sometimes|image',
    	]);

    	if ($validator->fails()) {
    		return redirect() -> back()
    		->withErrors($validator)
    		->withInput();
    	}
    	$project = MainProject::findOrFail($id);
    	$parentId = $project -> sub_category_id;
    	$project -> name = $request -> name;
    	$project -> detail = $request -> detail;

    	if ($request->has('featured')) {
    		$project -> featured = true;
    	}
    	else{
    		$project -> featured = false;
    	}

    	//storing person image
        if($request -> hasFile('main_image')){
            //storing image in database and directory
            $image = $request -> file('main_image');
            $filename = time().rand(1,1000).'_project'.'.'.$image -> getClientOriginalExtension();//image intervention
            $location = public_path('uploads/images/projects/'.$filename);
            Image::make($image) -> save($location);

            //old image name
            $oldImage = $project -> main_image;
            
            //saving new image in database
            $project -> main_image = $filename;

            //deleting old image
            File::delete(public_path('uploads/images/projects/'. $oldImage));
        }

        $project -> save();

        Toastr::success('Project edited successfully!', 'Success');
        return redirect() -> route('admin.main-projects.index', $parentId);
    }

    public function destroy($id){
    	$project = MainProject::findOrFail($id);
    	$image = $project -> main_image;

    	$project -> delete();
    	File::delete(public_path('uploads/images/projects/'.$image));

    	Toastr::success('Project Deleted Successfully!', 'Success');
    	return redirect() -> back();
    }

    public function deleteMultiple(Request $request){
    	$ids = $request->ids;
    	$ids = explode(",", $ids);
    	foreach($ids as $id){
    		$project = MainProject::findOrFail($id);
    		$imageName = $project -> main_image;
    		$project -> delete();
    		File::delete(public_path('uploads/images/projects/'. $imageName));
    	}

    	return response()->json(['status'=>true,'message'=>"Project(s) deleted successfully."]);
    }

}
