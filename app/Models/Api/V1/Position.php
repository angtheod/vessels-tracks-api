<?php

namespace App\Models\Api\V1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @OA\Schema()
 */
class Position extends Model
{
    use HasFactory;

    /**
     * @OA\Property(
     *     property="fillable",
     *     type="array",
     *     description="The attributes that are mass assignable.",
     *     @OA\Items(
     *         @OA\Property(property="mmsi", type="int"),
     *         @OA\Property(property="status", type="int"),
     *         @OA\Property(property="stationId", type="int"),
     *         @OA\Property(property="speed", type="int"),
     *         @OA\Property(property="lon", type="float"),
     *         @OA\Property(property="lat", type="float"),
     *         @OA\Property(property="course", type="int"),
     *         @OA\Property(property="heading", type="int"),
     *         @OA\Property(property="rot", type="string"),
     *         @OA\Property(property="timestamp", type="int"),
     *     )
     * )
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
    public $timestamps = false;

    /**
     * @return BelongsTo
     */
    public function vessel(): BelongsTo
    {
        return $this->belongsTo(Vessel::class);
    }
}
