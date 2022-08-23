<?php

namespace App\Models\Api\V1;

use Illuminate\Database\Eloquent\Model;

class ApiLogResponse extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'request_id',
        'content',
        'status_code',
        'status_message',
        'created_at',
        'updated_at'
    ];
    protected $guarded = [];
    protected $hidden = ['id'];
    protected $table = 'api_log_responses';
    public $timestamps = true;
}
