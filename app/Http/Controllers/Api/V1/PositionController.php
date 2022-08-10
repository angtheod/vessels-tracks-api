<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Api\V1\Position;
use App\Http\Resources\Api\V1\PositionResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\PositionRequest;
use App\Http\Resources\Collections\Api\V1\PositionCollection;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     * GET /positions/{id}
     *
     * @return PositionCollection
     */
    public function index()
    {
        $this->authorize('viewAny', Position::class);

        $positions = Position::all();

        return new PositionCollection($positions);

    }

    /**
     * Store a newly created resource in storage.
     * POST /positions
     *
     * @param  PositionRequest  $request
     * @return PositionResource
     */
    public function store(PositionRequest $request)
    {
        $this->authorize('create', Position::class);

        $position = Position::create($request->validated());

        return new PositionResource($position);

    }

    /**
     * Display the specified resource.
     * GET /positions/{id}
     *
     * @param  Position  $position
     * @return PositionResource
     */
    public function show(Position $position)
    {
        $this->authorize('view', $position);

        return new PositionResource($position);

    }

    /**
     * Update the specified resource in storage.
     * PUT /positions/{id}
     *
     * @param  PositionRequest  $request
     * @param  Position  $position
     * @return PositionResource
     */
    public function update(PositionRequest $request, Position $position)
    {
        $this->authorize('update', $position);

        $position->update($request->validated());

        return new PositionResource($position);

    }

    /**
     * Remove the specified resource from storage.
     * DELETE /positions/{id}
     *
     * @param  Position  $position
     * @return null
     */
    public function destroy(Position $position)
    {
        $this->authorize('delete', $position);

        $position->delete();

        return null;

    }
}
