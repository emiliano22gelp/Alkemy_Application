<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    public function creator(){ 
      return $this->belongsTo(User::class, 'user_id');
  }

  	public function category(){ 
      return $this->belongsTo(Category::class, 'category_id');
  }
}
