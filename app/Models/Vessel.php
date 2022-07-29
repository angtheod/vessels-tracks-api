<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vessel extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $hidden = ['id'];
    protected $table = 'vessels';
    public $timestamps = true;
}
