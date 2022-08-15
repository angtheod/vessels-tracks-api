<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Api\V1\Vessel;
use App\Http\Resources\Api\V1\VesselResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\VesselRequest;
use App\Http\Resources\Collections\Api\V1\VesselCollection;

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
        //$this->authorize('create', Vessel::class);

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

        return response()->json(['status' => Vessel::query()->findOrFail($id)->deleteOrFail() ? 'success' : 'failure']);
    }
}
