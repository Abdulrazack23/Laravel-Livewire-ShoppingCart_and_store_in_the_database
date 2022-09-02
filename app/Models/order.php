<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    private $rules = array(
        'batchno_no' => 'nullable',
        // .. more rules here ..
    );
    protected $fillable = ['batchno_no','name','quantity','price'];
}
