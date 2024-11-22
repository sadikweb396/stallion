<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class progeny extends Model
{
    use HasFactory;

    protected $table ='progenies';

    protected $fillable = [
        'stallion_id',
        'progeny_name',
        'sale',
        'sold',
        'date_of_birth',
        'gender',
        'color',
        'registration_number',
        'breeder',
        'performance_history',
        'trainer',
    ];

    public function progenyImages()
    {
        return $this->hasMany(progenyimage::class);
    }
}
