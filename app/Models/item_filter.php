<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class item_filter extends Model
{
    use HasFactory;
    protected $guarded =[];
    public $timestamps= false;
    public function title_filters(){
        return $this->belongsTo(title_filter::class);
    }
    public function products(){
        return $this->hasMany(product::class);
    }
}
