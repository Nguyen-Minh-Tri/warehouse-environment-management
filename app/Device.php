<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    // Table Name
    protected $table = 'devices';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;

    public function Post(){
        return $this->belongsTo('App\Post');
    }
}
