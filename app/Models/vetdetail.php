<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vetdetail extends Model
{
    use HasFactory;

    protected $table = 'vetdetails';

    protected $fillable = [
        'semencontracts_id',
        'name_of_clinic',
        'address',
        'vet_name',
        'phone',
        'email',
        'clinic_number',
    ];
}
