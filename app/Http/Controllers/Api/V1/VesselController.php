<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\Collections\Api\V1\PositionCollection;
use App\Models\Api\V1\Vessel;
use App\Http\Resources\Api\V1\VesselResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\VesselRequest;
use App\Http\Resources\Collections\Api\V1\VesselCollection;
use Illuminate\Http\Response;

class VesselController extends Controller
{
    /**
     * @OA\Get (
     *     tags={"Vessels"},
     *     path="/vessels",
     *     description="Get a Collection of Vessel resources",
     *     @OA\Response (
     *         response="200",
     *         description="successful operation",
     *         @OA\JsonContent (ref="#/components/schemas/Vessel")
     *     )
     * )
     *
     * @return VesselCollection
     */
    public function index(): VesselCollection
    {
        //$this->authorize('viewAny', Vessel::class);

        $vessels = Vessel::all();

        return new VesselCollection($vessels);
    }

    /**
     * @OA\Post (
     *     tags={"Vessels"},
     *     path="/vessels",
     *     description="Create and save a new resource",
     *     @OA\Response (
     *         response="201",
     *         description="successful operation",
     *         @OA\JsonContent (ref="#/components/schemas/Vessel")
     *     )
     * )
     *
     * @param  VesselRequest  $request
     *
     * @return VesselResource
     */
    public function store(VesselRequest $request): VesselResource
    {
        // 1. Authenticate user/ip/etc..
        // 2. Authorize action $this->authorize('create', Vessel::class);
        // 3. Sanitize/Filter input
        // 4. Validate input data $this->validate($request, $request->rules());

        $vessel = Vessel::query()->create(json_decode($request->getContent(), true));

        return new VesselResource($vessel);
    }

    /**
     * @OA\Get (
     *     tags={"Vessels"},
     *     path="/vessels/{id}",
     *     description="Get the specified resource",
     *     @OA\Response (
     *         response="200",
     *         description="successful operation",
     *         @OA\JsonContent (ref="#/components/schemas/Vessel")
     *     )
     * )
     *
     * @param  int $id
     *
     * @return VesselResource
     */
    public function show(int $id): VesselResource
    {
        //$this->authorize('view', Vessel::class);

        $vessel = Vessel::query()->findOrFail($id);

        return new VesselResource($vessel);
    }

    /**
     * @OA\Get (
     *     tags={"Vessels"},
     *     path="/vessels/{id}/positions",
     *     description="Get all positions of specified vessel",
     *     @OA\Response (
     *         response="200",
     *         description="successful operation",
     *         @OA\JsonContent (ref="#/components/schemas/Position")
     *     )
     * )
     *
     * @param  int $id
     *
     * @return PositionCollection
     */
    public function showPositions(int $id): PositionCollection
    {
        //$this->authorize('view', Vessel::class);

        $positions = Vessel::query()->findOrFail($id)->positions;

        return new PositionCollection($positions);
    }

    /**
     * @OA\Put (
     *     tags={"Vessels"},
     *     path="/vessels/{id}",
     *     description="Update the specified resource in storage",
     *     @OA\Response (
     *         response="200",
     *         description="successful operation",
     *         @OA\JsonContent (ref="#/components/schemas/Vessel")
     *     )
     * )
     *
     * @param VesselRequest $request
     * @param int           $id
     *
     * @return VesselResource
     * @throws \Throwable
     */
    public function update(VesselRequest $request, int $id): VesselResource
    {
        //$this->authorize('update', Vessel::class);

        $vessel = Vessel::query()->findOrFail($id);
        $vessel->updateOrFail(json_decode($request->getContent(), true));

        return new VesselResource($vessel);
    }

    /**
     * @OA\Delete (
     *     tags={"Vessels"},
     *     path="/vessels/{id}",
     *     description="Remove the specified resource from storage",
     *     @OA\Response (
     *         response="204",
     *         description="successful operation",
     *         @OA\JsonContent (ref="#/components/schemas/Vessel")
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
        //$this->authorize('delete', Vessel::class);

        Vessel::query()->findOrFail($id)->deleteOrFail();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
