<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

if (! function_exists('me')) {

    function me()
    {
        return Auth::user();
    }
}

if(!function_exists('dateDifference')){
    function dateDifference($date): int
    {
        $startDate = Carbon::createFromDate($date);
        $endDate = Carbon::now();

        return $startDate->diffInDays($endDate) - 1;
    }
}
