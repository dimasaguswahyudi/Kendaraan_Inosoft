<?php

namespace App\Http\Controllers;

use App\Http\Requests\MobilRequest;
use App\Http\Resources\MobilResource;
use App\Models\Mobil;
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

    public function update(MobilRequest $request, Mobil $mobil): JsonResponse
    {
        return $this->mobilService->updateMobil($request->all(), $mobil);
    }
    public function destroy(Mobil $mobil)
    {
        try {
            $this->mobilService->destroy($mobil);
            return $this->ResReturn(true, "Data Berhasil Dihapus");
        } catch (\Throwable $th) {
            return $this->ResReturn(false, "Data Gagal Dihapus");
        }
    }

}
