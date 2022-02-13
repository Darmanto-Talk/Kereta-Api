<?php

namespace App\Http\Controllers;

use App\Http\Requests\jadwal\JadwalCreateRequest;
use App\Http\Requests\jadwal\JadwalUpdateRequest;
use App\Http\Resources\JadwalResource;
use App\Models\Jadwal;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index()
    {
        $jadwal = Jadwal::with('kereta', 'stasiun_asal', 'stasiun_tujuan');

        foreach (['stasiun_asal_id', 'tanggal', 'jam'] as $param) {
            if (request($param)) {
                $jadwal = $jadwal->where($param, request($param));
            }
        }
        $jadwal = $jadwal->get();
        $response = JadwalResource::collection($jadwal);
        return response()->json($response);
    }
    public function store(JadwalCreateRequest $request)
    {
        $jadwal = Jadwal::create(request()->all());
        $response['status'] = 'success';
        $response['description'] = "Create data jadwal success";
        $response['result'] = new JadwalResource($jadwal);
        return response()->json($response);
    }
    public function show($id)
    {
        $jadwal = Jadwal::find($id);
        if (!$jadwal) {
            $response['status'] = 'failed';
            $response['description'] = "Data Jadwal Not Found ";
            return response()->json($response);
        }
        $response['status'] = 'success';
        $response['description'] = " Data Jadwal";
        $response['result'] = new JadwalResource($jadwal);
        return response()->json($response);
    }

    public function update($id, JadwalUpdateRequest $request)
    {
        $jadwal = Jadwal::find($id);

        if (!$jadwal) {
            $response['status'] = 'failed';
            $response['description'] = "Data Jadwal Not Found ";
            return response()->json($response);
        }
        $jadwal->update(request(['nama']));
        $response['status'] = 'success';
        $response['description'] = "Data Jadwal Update ";
        $response['result'] = new JadwalResource($jadwal);
        return response()->json($response);
    }
    public function destroy($id)
    {
        $jadwal = Jadwal::find($id);

        if (!$jadwal) {
            $response['status'] = 'failed';
            $response['description'] = "Data jdwal Not Found ";
            return response()->json($response);
        }
        $jadwal->delete();
        $response['status'] = 'success';
        $response['description'] = "Data Jadwal Dihapus ";
        return response()->json($response);
    }
}
