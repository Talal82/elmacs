<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Toastr;
use Hash;
use Session;
use Validator;
use Auth;
use App\User;

class AccountsController extends Controller
{
    protected $breadCrumb;
	public function __construct(){
		$this -> middleware('auth');
		$this -> breadCrumb = array(
            array(
                'link' => route('home'),
                'text' => 'Dashboard'
            ),
        );
	}

    public function getAccountSettings(){
    	$crumb = array(
            'link' => '',
            'text' => 'Account Settings'
        );
        array_push($this -> breadCrumb, $crumb);
        return view('admin.settings.accounts') ->with('breadCrumb', $this -> breadCrumb);
    }
    public function updateAccountSettings(Request $request, $id){
        $errors = [];
        //validate data
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'new_password' => 'required|same:comfirm_password',
            'email' => 'required|email|unique:users,email,'.$id,
        ]);
        //return validation errors
        if ($validator->fails()) {
            return redirect()
            -> back()
            ->withErrors($validator)
            ->withInput();
        }
        //check if password is valid
        if($request -> password != ''){
            if(Hash::check($request -> password, Auth::user()-> password) == false){
                Session::flash('error', 'Your old password is invalid!');
                return redirect() -> back();
            }

            if($request -> password == $request -> new_password){
                Session::flash('error', 'Your new password should be different from the previous one.');
                return redirect() -> back();
            }
        }else{
            Session::flash('error', 'Your old password field is empty');
            return redirect() -> back();
        }
        if (count($errors) > 0) {
            return redirect()
                ->back()
                ->withErrors($errors)
                ->withInput();
        }
        $user = User::findOrFail(Auth::user() -> id);
        $user -> name = $request -> name;
        $user -> email = $request -> email;
        //here we are not encrypting the password because that method is added in User Model.. Which will automatically encrypt user password whenever password is saved in database
        $user -> password = Hash::make($request -> new_password);
        $user -> save();
        Session::flash('success', 'Password Changed Successfully!');
        // Toastr::success('Password Changed Successfully!', 'Success');
        return redirect() -> back();
    }
}
