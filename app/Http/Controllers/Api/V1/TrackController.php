<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Api\V1\Track;
use App\Http\Resources\Api\V1\TrackResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\TrackRequest;
use App\Http\Resources\Collections\Api\V1\TrackCollection;

class TrackController extends Controller
{
    /**
     * Display a listing of the resource.
     * GET /tracks/{id}
     *
     * @return TrackCollection
     */
    public function index()
    {
        $this->authorize('viewAny', Track::class);

        $tracks = Track::all();

        return new TrackCollection($tracks);

    }

    /**
     * Store a newly created resource in storage.
     * POST /tracks
     *
     * @param  TrackRequest  $request
     * @return TrackResource
     */
    public function store(TrackRequest $request)
    {
        $this->authorize('create', Track::class);

        $track = Track::create($request->validated());

        return new TrackResource($track);

    }

    /**
     * Display the specified resource.
     * GET /tracks/{id}
     *
     * @param  Track  $track
     * @return TrackResource
     */
    public function show(Track $track)
    {
        $this->authorize('view', $track);

        return new TrackResource($track);

    }

    /**
     * Update the specified resource in storage.
     * PUT /tracks/{id}
     *
     * @param  TrackRequest  $request
     * @param  Track  $track
     * @return TrackResource
     */
    public function update(TrackRequest $request, Track $track)
    {
        $this->authorize('update', $track);

        $track->update($request->validated());

        return new TrackResource($track);

    }

    /**
     * Remove the specified resource from storage.
     * DELETE /tracks/{id}
     *
     * @param  Track  $track
     * @return null
     */
    public function destroy(Track $track)
    {
        $this->authorize('delete', $track);

        $track->delete();

        return null;

    }
}
