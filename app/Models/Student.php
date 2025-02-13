<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ["name","email","class_id","section_id","created_at"];

    protected $with = ['classes','section'];
    
    public function classes(){
        return $this->belongsTo(Classes::class,'class_id');
    }

    public function section(){
        return $this->belongsTo(Section::class);
    }
}
