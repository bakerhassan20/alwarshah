<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    use HasFactory;
    protected $guarded = [];

  public function service(){
      return $this ->belongsTo('App\Models\Service');
  }
}
