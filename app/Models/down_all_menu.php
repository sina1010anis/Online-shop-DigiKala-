<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class down_all_menu extends Model
{
    use HasFactory;

    protected $guarded =[];

    public function products(){
        return $this->hasMany(product::class);
    }
    public function seb_all_menus(){
        return $this->hasMany(product::class);
    }
    public $timestamps = false;
}
