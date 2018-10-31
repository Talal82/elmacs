<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubProject extends Model
{
    protected $table = 'sub_projects';

    public function subCategory(){
    	return $this -> belongsTo('App\SubCategory', 'sub_category_id');
    }
}
