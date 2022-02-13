<?php

namespace App\Http\Controllers;

use App\Http\Requests\stasiun\StasiunCreateRequest;
use App\Http\Requests\stasiun\StasiunUpdateRequest;
use App\Http\Resources\StasiunResource;
use App\Models\Stasiun;
use Illuminate\Http\Request;

class StasiunController extends Controller
{
    public function index()
    {
        $stasiun = Stasiun::all();
        $response['status'] = 'success';
        $response['description'] = 'Data Kereta Stasiun';
        $response = StasiunResource::collection($stasiun);
        return response()->json($response);
    }
    public function store(StasiunCreateRequest $request)
    {
        $stasiun = Stasiun::create(request()->all());
        $response['status'] = 'success';
        $response['description'] = "Create data stasiun success";
        $response['result'] = new StasiunResource($stasiun);
        return response()->json($response);
    }
    public function update(StasiunUpdateRequest $request, $id)
    {
        $stasiun = Stasiun::find($id);

        if (!$stasiun) {
            $response['status'] = 'failed';
            $response['description'] = "Data Stasiun Not Found ";
            return response()->json($response);
        }
        $stasiun->update(request(['nama']));
        $response['status'] = 'success';
        $response['description'] = "Data Stasiun Update ";
        $response['result'] = new StasiunResource($stasiun);
        return response()->json($response);
    }
    public function destroy($id)
    {
        $stasiun = Stasiun::find($id);

        if (!$stasiun) {
            $response['status'] = 'failed';
            $response['description'] = "Data Stasiun Not Found ";
            return response()->json($response);
        }
        $stasiun->delete();
        $response['status'] = 'success';
        $response['description'] = "Data Stasiun Dihapus ";
        return response()->json($response);
    }
    public function show($id)
    {
        $stasiun = Stasiun::find($id);
        if (!$stasiun) {
            $response['status'] = 'failed';
            $response['description'] = "Data Stasiun Not Found ";
            return response()->json($response);
        }
        $response['status'] = 'success';
        $response['description'] = " Data Stasiun";
        $response['result'] = new StasiunResource($stasiun);
        return response()->json($response);
    }
}
