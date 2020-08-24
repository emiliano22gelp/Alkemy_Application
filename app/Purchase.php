<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    public function owner(){ 
      return $this->belongsTo(User::class, 'user_id');
  }

  public function application(){ 
      return $this->belongsTo(Application::class, 'application_id');
  }
}
