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
use Illuminate\Support\Facades\Cache;

class TripController extends Controller
{
    /**
     * @param  Request  $request
     * @return ResponseFactory|Response
     */
    public function index(Request $request)
    {
        $limit = $request->limit ?? 10;
        $page  = $request->page ?? 1;

        $trip = Cache::tags(['trip'])->rememberForever("trip_all-".me()->id.$limit.$page, function () use ($limit) {
            return Trip::where('user_id', me()->id)->paginate($limit);
        });

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

            Cache::tags(['trip'])->flush();

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
            $trip = Cache::rememberForever("trip".me()->id.$id, function () use ($id) {
                return Trip::where(['user_id' => me()->id, 'id' => $id,])->first();
            });

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
            $trip                   = Trip::where(['user_id' => me()->id, 'id' => $id,])->first();

            if (!$trip) {
                return $this->returnFalse('Not Found');
            }

            $trip->update($input);

            Cache::tags(['trip'])->flush();
            Cache::forget("trip".me()->id.$id);

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

        Cache::tags(['trip'])->flush();
        Cache::forget("trip".me()->id.$id);

        return $this->returnSuccess([]);
    }
}
