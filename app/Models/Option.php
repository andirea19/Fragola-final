<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//Wie mache ich hier Prozent oÄ?

class Option extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function question(){
        return $this->belongsTo(Question::class);
    }
}
