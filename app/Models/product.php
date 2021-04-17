<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    protected $guarded =[];

    public function all_menus(){
        return $this->belongsTo(all_menu::class , 'menu_id' , 'id');
    }
    public function down_all_menus(){
        return $this->belongsTo(all_menu::class);
    }
    public function brands(){
        return $this->belongsTo(brand::class);
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
