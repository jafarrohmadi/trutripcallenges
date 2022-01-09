<?php

namespace App\Http\Controllers;

use App\Http\Requests\TripStoreRequest;
use App\Http\Requests\TripUpdateRequest;
use App\Models\Trip;
use App\Resources\TripCollection;
use App\Resources\TripResource;
use Exception;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TripController extends Controller
{
    /**
     * @param  Request  $request
     * @return ResponseFactory|Response
     */
    public function index(Request $request)
    {
        $trip = Trip::paginate($request->limit ?? 10);

        return $this->returnSuccess(new TripCollection($trip));
    }

    /**
     * @param  TripStoreRequest  $request
     * @return ResponseFactory|Response
     */
    public function store(TripStoreRequest $request)
    {
        try {
            $input                  = $request->validated();
            $input['user_id']       = me()->id;
            $input['how_many_days'] = dateDifference($request->start_date, $request->end_date);

            Trip::create($input);

            return $this->returnSuccess([]);
        } catch (Exception $e) {
            return $this->returnFalse($e->getMessage());
        }
    }

    /**
     * @param $id
     * @return ResponseFactory|Response
     */
    public function show($id)
    {
        try {
            $trip = Trip::find($id);

            return $this->returnSuccess(new TripResource($trip));
        } catch (Exception $e) {
            return $this->returnFalse($e->getMessage());
        }
    }

    /**
     * @param  TripUpdateRequest  $request
     * @param $id
     * @return ResponseFactory|Response
     */
    public function update(TripUpdateRequest $request, $id) {
        try {
            $input                  = $request->validated();
            $input['how_many_days'] = dateDifference($request->start_date, $request->end_date);

            Trip::where('id', $id)->update($input);

            return $this->returnSuccess([]);
        } catch (Exception $e) {
            return $this->returnFalse($e->getMessage());
        }
    }

    /**
     * @param $id
     * @return ResponseFactory|Response
     */
    public function destroy($id)
    {
        Trip::destroy($id);

        return $this->returnSuccess([]);
    }
}
