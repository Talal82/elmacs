<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MainProject extends Model
{
    protected $table = 'main_projects';

    public function mainCategory(){
    	return $this -> belongsTo('App\MainProject', 'main_category_id');
    }
}
