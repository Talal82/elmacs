<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $table = 'sub_categories';

    public function mainCategory(){
    	return $this -> belongsTo('App\mainCategory', 'main_category_id');
    }

    public function subProjects(){
    	return $this -> hasMany('App\SubProject', 'sub_category_id');
    }
}
