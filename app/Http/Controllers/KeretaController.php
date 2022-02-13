<?php

namespace App\Http\Controllers;

use App\Http\Requests\kereta\KeretaCreateRequest;
use App\Http\Requests\kereta\KeretaUpdateRequest;
use App\Http\Resources\kereta\KeretaResource;
use App\Models\Kereta;

use Illuminate\Http\Request;


class KeretaController extends Controller
{
    public function index()
    {
        $keretas = Kereta::all();
        $response['status'] = 'success';
        $response['description'] = 'Data Kereta Api';
        $response['result'] = KeretaResource::collection($keretas);
        return response()->json($response);
    }

    public function store(KeretaCreateRequest $request)
    {
        $kereta = Kereta::create(request()->all());
        $response['status'] = 'success';
        $response['description'] = "Create data kereta success";
        $response['result'] = new KeretaResource($kereta);
        return response()->json($response);
    }

    public function show($id)
    {
        $kereta = Kereta::find($id);
        if (!$kereta) {
            $response['status'] = 'failed';
            $response['description'] = "Data Kereta Not Found ";
            return response()->json($response);
        }
        $response['status'] = 'success';
        $response['description'] = "List Data Kereta";
        $response['result'] = new KeretaResource($kereta);
        return response()->json($response);
    }
    public function update(KeretaUpdateRequest $request, $id)
    {
        $kereta = Kereta::find($id);

        if (!$kereta) {
            $response['status'] = 'failed';
            $response['description'] = "Data Kereta Not Found ";
            return response()->json($response);
        }
        $kereta->update(request(['nama', 'kelas']));
        $response['status'] = 'success';
        $response['description'] = "Data Kereta Update ";
        $response['result'] = new KeretaResource($kereta);
        return response()->json($response);
    }

    public function destroy($id)
    {
        $kereta = Kereta::find($id);

        if (!$kereta) {
            $response['status'] = 'failed';
            $response['description'] = "Data Kereta Not Found ";
            return response()->json($response);
        }
        $kereta->delete();
        $response['status'] = 'success';
        $response['description'] = "Data Kereta Dihapus ";
        return response()->json($response);
    }
}
