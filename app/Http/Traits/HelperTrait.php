<?php


namespace App\Http\Traits;


use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

trait HelperTrait
{
    function setTimeZone($timezone){
        config(['app.timezone' => $timezone]);
        date_default_timezone_set($timezone);
        $now = new \DateTime();
        $mins = $now->getOffset() / 60;
        $sgn = ($mins < 0 ? -1 : 1);
        $mins = abs($mins);
        $hrs = floor($mins / 60);
        $mins -= $hrs * 60;
        $offset = sprintf('%+d:%02d', $hrs*$sgn, $mins);
        //dd($offset);
        DB::update('SET time_zone = ?', [$offset]);
    }

}
