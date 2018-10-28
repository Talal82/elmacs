<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\SocialIcon;
use Toastr;

class SocialIconController extends Controller
{
    public function update(Request $request, $id){
    	$social = SocialIcon::findOrFail($id);

    	$social -> youtube_link = $request -> youtube_link;
    	$social -> facebook_link = $request -> facebook_link;
    	$social -> linkedin_link = $request -> linkedin_link;
    	$social -> pinterest_link = $request -> pinterest_link;
    	$social -> instagram_link = $request -> instagram_link;
    	$social -> twitter_link = $request -> twitter_link;

    	$social -> save();

    	Toastr::success('Social Links Updated Successfully!', 'Success');
    	return redirect() -> route('admin.settings.index');
    }
}
