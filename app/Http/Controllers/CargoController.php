<?php

namespace App\Http\Controllers;

use App\Cargo;
use App\Http\Resources\CargoResource;
use App\Http\Resources\CargosResource;
use App\Http\Resources\ListCargoResource;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CargoController extends Controller
{



    //static $limit_fot_list = ['length','width','height','curb_weight','load_capacity'];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Cargo::all();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function paginate($limit)
    {
        return ListCargoResource::collection(Cargo::paginate($limit));

    }

    public function filter(Request $request, Cargo $cargo)
    {
        //return $request->input('city');
        $cargo = $cargo->newQuery();
        // if($request->has('description')){
        //   $description = $request->input('description');
        //   $searchValues = preg_split('/\s+/', $description, -1, PREG_SPLIT_NO_EMPTY);
        //
        //   $cargo->where(function ($q) use ($searchValues) {
        //       foreach ($searchValues as $value) {
        //         $q->orWhere('description', 'like', "%{$value}%");
        //       }
        //     })->get();
        //
        // }
        if($request->has('description')){
          $cargo->where('description','like',$request->input('description'))->get();
        }
        if($request->has('cargo_model_id')){
          $cargo->where('cargo_model_id', $request->input('cargo_model_id'))->get();
        }
        if($request->has('charter_type_id')){
          $cargo->where('charter_type_id', $request->input('charter_type_id'))->get();
        }
        if($request->has('available_date')){
          $cargo->where('available_start', '<=',$request->input('available_date'))->get();
        }
        if($request->has('available_date')){

          $cargo->where('available_end', '>=',$request->input('available_date'))->get();
        }
        if($request->has('location')){
          $cargo->where('location', $request->input('location'))->get();
        }
        if($request->has('city')){
          $cargo->where('city', $request->input('city'))->get();
        }
        if($request->has('available_capacity')){
          $cargo->where('available_capacity', '>=',$request->input('available_capacity'))->get();
        }
        if($request->has('year_build')){
          $cargo->where('year_build', $request->input('year_build'))->get();
        }
         return ListCargoResource::collection($cargo->get());

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $cargo = Cargo::create($request->all());

      return response()->json($cargo, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function show(cargo $cargo)
    {
        return $cargo->load('imageCargos');
    }

    /**
     * Display the detail resource.
     *
     * @param  \App\cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function getDetail(cargo $cargo)
    {
        return new CargoResource($cargo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function edit(cargo $cargo)
    {
        return $cargo;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cargo $cargo)
    {
      $cargo->update($request->all());

      return response()->json($cargo, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function destroy(cargo $cargo)
    {
        $cargo->delete();

        return response()->json(null,204);
    }
}
