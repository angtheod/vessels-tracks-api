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
     * Display a listing of the resource.
     * GET /vessels
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
     * Store a newly created resource in storage.
     * POST /vessels
     *
     * @param  VesselRequest  $request
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
     * Display the specified resource.
     * GET /vessels/{id}
     *
     * @param  int $id
     * @return VesselResource
     */
    public function show(int $id): VesselResource
    {
        //$this->authorize('view', Vessel::class);

        $vessel = Vessel::query()->findOrFail($id);

        return new VesselResource($vessel);
    }

    /**
     * Display all positions of requested vessel
     * GET /vessels/{id}/positions
     *
     * @param  int $id
     * @return PositionCollection
     */
    public function showPositions(int $id): PositionCollection
    {
        //$this->authorize('view', Vessel::class);

        $positions = Vessel::query()->findOrFail($id)->positions;

        return new PositionCollection($positions);
    }

    /**
     * Update the specified resource in storage.
     * PUT /vessels/{id}
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
     * Remove the specified resource from storage.
     * DELETE /vessels/{id}
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
