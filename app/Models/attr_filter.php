<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class attr_filter extends Model
{
    use HasFactory;

    protected $guarded=[];

    public $timestamps = false;

    public function title_filters(){
        return $this->belongsTo(title_filter::class,'title_filter_id','id');
    }
}
