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
     * @OA\Get (
     *     tags={"Positions"},
     *     path="/positions",
     *     description="Get a Collection of Position resources",
     *     @OA\Response (
     *         response="200",
     *         description="successful operation",
     *         @OA\JsonContent (ref="#/components/schemas/Position")
     *     )
     * )
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
     * @OA\Post (
     *     tags={"Positions"},
     *     path="/positions",
     *     description="Create and save a new resource",
     *     @OA\Response (
     *         response="201",
     *         description="successful operation",
     *         @OA\JsonContent (ref="#/components/schemas/Position")
     *     )
     * )
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
     * @OA\Get (
     *     tags={"Positions"},
     *     path="/positions/{id}",
     *     description="Get a specified resource",
     *     @OA\Response (
     *         response="200",
     *         description="successful operation",
     *         @OA\JsonContent (ref="#/components/schemas/Position")
     *     )
     * )
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
     * @OA\Put (
     *     tags={"Positions"},
     *     path="/positions/{id}",
     *     description="Update the specified resource in storage",
     *     @OA\Response (
     *         response="200",
     *         description="successful operation",
     *         @OA\JsonContent (ref="#/components/schemas/Position")
     *     )
     * )
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
     * @OA\Delete (
     *     tags={"Positions"},
     *     path="/positions/{id}",
     *     description="Remove the specified resource from storage",
     *     @OA\Response (
     *         response="204",
     *         description="successful operation",
     *         @OA\JsonContent (ref="#/components/schemas/Position")
     *     )
     * )
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
