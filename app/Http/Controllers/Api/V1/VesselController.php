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
     * GET /vessels/{id}
     *
     * @return VesselCollection
     */
    public function index()
    {
        $this->authorize('viewAny', Vessel::class);

        $vessel = Vessel::all();

        return new VesselCollection($vessel);

    }

    /**
     * Store a newly created resource in storage.
     * POST /vessels
     *
     * @param  VesselRequest  $request
     * @return VesselResource
     */
    public function store(VesselRequest $request)
    {
        $this->authorize('create', Vessel::class);

        $vessel = Vessel::create($request->validated());

        return new VesselResource($vessel);

    }

    /**
     * Display the specified resource.
     * GET /vessels/{id}
     *
     * @param  Vessel  $vessel
     * @return VesselResource
     */
    public function show(Vessel $vessel)
    {
        $this->authorize('view', $vessel);

        return new VesselResource($vessel);

    }

    /**
     * Update the specified resource in storage.
     * PUT /vessels/{id}
     *
     * @param  VesselRequest  $request
     * @param  Vessel  $vessel
     * @return VesselResource
     */
    public function update(VesselRequest $request, Vessel $vessel)
    {
        $this->authorize('update', $vessel);

        $vessel->update($request->validated());

        return new VesselResource($vessel);

    }

    /**
     * Remove the specified resource from storage.
     * DELETE /vessels/{id}
     *
     * @param  Vessel  $vessel
     * @return null
     */
    public function destroy(Vessel $vessel)
    {
        $this->authorize('delete', $vessel);

        $vessel->delete();

        return null;

    }
}
