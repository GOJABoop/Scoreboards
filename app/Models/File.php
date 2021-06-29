<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;
    protected $fillable = ['original_name','path','mime'];
    protected $dates = ['created_at', 'updated_at'];
    
    public function guide(){
        return $this->belongsTo(Guide::class);
    }
}
