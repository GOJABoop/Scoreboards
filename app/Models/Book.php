<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = []; //protected $fillable = ['title','author','type'];
    protected $dates = ['created_at', 'updated_at'];

    public function setTypeAttribute($value){
        $this->attributes['type'] = mb_strtoupper($value, 'UTF-8');
    }

    public function notes(){
        return $this->hasMany(Note::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

}
