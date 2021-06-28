<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $guarded = []; 
    //protected $fillable = ['title','description','due_date'];
    protected $dates = ['created_at', 'updated_at', 'due_date'];

    public function User(){
        return $this->belongsTo(User::class);
    }

    public function setTitleAttribute($value){
        $this->attributes['title'] = mb_strtoupper($value, 'UTF-8');
    }

    public function getDescriptionAttribute($value){
        return ucfirst($value);
    }
}
