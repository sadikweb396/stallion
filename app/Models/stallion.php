<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stallion extends Model
{
    use HasFactory;

    protected $table = 'stallions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'owner_id',
        'name',
        'performancehistory',
        'lifetime_story',
        'registration_details',
        'height',
        'gender',
    ];


    public function stallionImages()
    {
        return $this->hasMany(StallionImage::class);
    }

    public function progeny()
    {
        return $this->hasMany(Progeny::class)->where('exceptional_progeny',0);
    }

    public function progenylistImage()
    {
        return $this->hasMany(Progeny::class);
    }

    public function exceptionalProgeny()
    {
        return $this->hasMany(Progeny::class)->where('exceptional_progeny',1);
    }

    public function stallionvideo()
    {
        return $this->hasMany(stallionvideo::class);
    }

    public function firststallionvideo()
    {
        return $this->hasOne(stallionvideo::class)->latest();
    }

    public function firstImage()
    {
        return $this->hasOne(StallionImage::class)->latest(); 
    }

    public function primaryImage()
    {
        return $this->hasOne(StallionImage::class); // One-to-one relationship
    }
}
   