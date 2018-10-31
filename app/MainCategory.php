<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MainCategory extends Model
{
    protected $table = 'main_categories';

    public function subCategories(){
    	return $this -> hasMany('App\SubCategory', 'main_category_id');
    }

    public function mainProjects(){
    	return $this -> hasMany('App\MainProject', 'main_category_id');
    }
}
