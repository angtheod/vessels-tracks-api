<?php

namespace App\Http\Resources\Collections\Api\V1;

use Illuminate\Http\Resources\Json\ResourceCollection;

class TrackCollection extends ResourceCollection
{
    /**
     * The resource that this resource collects.
     *
     * @var string
     */
    public $collects = 'App\Http\Resources\Api\V1\TrackResource';

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
