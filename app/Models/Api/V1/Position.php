<?php

namespace App\Models\Api\V1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'mmsi',
        'status',
        'stationId',
        'speed',
        'lon',
        'lat',
        'course',
        'heading',
        'rot',
        'timestamp'
    ];
    protected $guarded = [];
    protected $hidden = ['id'];
    protected $table = 'positions';
    public $timestamps = true;

}