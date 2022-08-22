<?php

namespace App\Models\Api\V1;

use Illuminate\Database\Eloquent\Model;

class ApiLogRequest extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ip_address',
        'method',
        'uri',
        'params',
        'content'
    ];
    protected $guarded = [];
    protected $hidden = ['id'];
    protected $table = 'api_log_requests';
    public $timestamps = true;
}
