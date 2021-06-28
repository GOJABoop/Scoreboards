<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Note extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = []; //protected $fillable = ['body','description'];
    protected $dates = ['created_at', 'updated_at', 'due_date'];
    
    public function getDescriptionAttribute($value){
        return ucfirst($value);
    }

    public function getBodyAttribute($value){
        return ucfirst($value);
    }

    public function book(){
        return $this->belongsTo(Book::class);
    }
}
