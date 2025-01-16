<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class aboutbanner extends Model
{
    use HasFactory;
    
     protected $table = 'aboutbanners';

   
     protected $fillable = [
         'heading',
         'text',
         'image',
       
     ];
}
