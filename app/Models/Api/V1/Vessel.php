<?php

namespace App\Models\Api\V1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @OA\Schema()
 */
class Vessel extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     * @var array
     * @OA\Property(
     *     property="fillable",
     *     type="array",
     *     @OA\Items(
     *         @OA\Property(property="mmsi", type="int"),
     *     )
     * )
     */
    protected $fillable = [
        'mmsi'
    ];
    protected $guarded = [];
    protected $hidden = ['id'];
    protected $table = 'vessels';
    public $timestamps = true;

    /**
     * @return HasMany
     */
    public function positions(): HasMany
    {
        return $this->hasMany(Position::class, 'mmsi', 'mmsi');
    }
}
