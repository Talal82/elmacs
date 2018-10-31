<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\SubProject;
use App\MainProject;
use Toastr;
use Session;

class StatusController extends Controller
{
    public function changeSubFeatured($id){
    	$project = SubProject::findOrFail($id);
        if($project -> featured == true){
            $project -> featured = false;
        }
        else{
            $project -> featured = true;
        }

        $project -> save();

        Toastr::success('Status changed successfully!', 'Success');
        return redirect() -> back();
    }

     public function changeMainFeatured($id){
        $project = MainProject::findOrFail($id);
        if($project -> featured == true){
            $project -> featured = false;
        }
        else{
            $project -> featured = true;
        }

        $project -> save();

        Toastr::success('Status changed successfully!', 'Success');
        return redirect() -> back();
    }

    public function changeSubVisibility($id){
    	$project = SubProject::findOrFail($id);
        if($project -> visibility == true){
            $project -> visibility = false;
        }
        else{
            $project -> visibility = true;
        }

        $project -> save();

        Toastr::success('Status changed successfully!', 'Success');
        return redirect() -> back();
    }

    public function changeMainVisibility($id){
        $project = MainProject::findOrFail($id);
        if($project -> visibility == true){
            $project -> visibility = false;
        }
        else{
            $project -> visibility = true;
        }

        $project -> save();

        Toastr::success('Status changed successfully!', 'Success');
        return redirect() -> back();
    }


}
