<?php

namespace App\Http\Controllers;

use App\Http\Requests\MobilRequest;
use App\Http\Resources\MobilResource;
use App\Models\Mobil;
use App\Repositories\Stok\StokRepository;
use App\Services\Mobil\MobilService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MobilController extends Controller
{
    private MobilService $mobilService;

    public function __construct(MobilService $mobilService)
    {
        $this->mobilService = $mobilService;
    }

    public function index()
    {
        $data = $this->mobilService->index();
        return MobilResource::collection($data);
    }

    public function store(MobilRequest $request)
    {
        $data = $this->mobilService->store($request->all());
        return $data;
    }

    public function update(MobilRequest $request, Mobil $mobil)
    {
        $data = $this->mobilService->update($request->all(), $mobil);
        return $data;
    }
    public function destroy(Mobil $mobil)
    {
        $data = $this->mobilService->destroy($mobil);
        return $data;
    }

}
