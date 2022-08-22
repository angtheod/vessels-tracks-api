<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Api\V1\Position;
use App\Http\Resources\Api\V1\PositionResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\PositionRequest;
use App\Http\Resources\Collections\Api\V1\PositionCollection;
use Illuminate\Http\Response;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     * GET /positions
     *
     * @return PositionCollection
     */
    public function index(): PositionCollection
    {
        //$this->authorize('viewAny', Position::class);

        $positions = Position::all();

        return new PositionCollection($positions);
    }

    /**
     * Store a newly created resource in storage.
     * POST /positions
     *
     * @param PositionRequest $request
     *
     * @return PositionResource
     */
    public function store(PositionRequest $request): PositionResource
    {
        // 1. Authenticate user/ip/etc..
        // 2. Authorize action $this->authorize('create', Position::class);
        // 3. Sanitize/Filter input
        // 4. Validate input data $this->validate($request, $request->rules());

        $position = Position::query()->create(json_decode($request->getContent(), true));

        return new PositionResource($position);

    }

    /**
     * Display the specified resource.
     * GET /positions/{id}
     *
     * @param  int $id
     * @return PositionResource
     */
    public function show(int $id): PositionResource
    {
        //$this->authorize('view', Position::class);

        $position = Position::query()->findOrFail($id);

        return new PositionResource($position);

    }

    /**
     * Update the specified resource in storage.
     * PUT /positions/{id}
     *
     * @param PositionRequest $request
     * @param int             $id
     *
     * @return PositionResource
     * @throws \Throwable
     */
    public function update(PositionRequest $request, int $id): PositionResource
    {
        //$this->authorize('update', Position::class);

        $position = Position::query()->findOrFail($id);
        $position->updateOrFail(json_decode($request->getContent(), true));

        return new PositionResource($position);

    }

    /**
     * Remove the specified resource from storage.
     * DELETE /positions/{id}
     *
     * @param int $id
     *
     * @return null
     * @throws \Throwable
     */
    public function destroy(int $id)
    {
        //$this->authorize('delete', Position::class);

        Position::query()->findOrFail($id)->deleteOrFail();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
