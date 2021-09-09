<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateDateFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
        $current_bad_date = Carbon::now()->timezone('UTC');
        $current_good_date = Carbon::now()->timezone('America/Mexico_City');

        //dump($current_bad_date);
        dd($current_bad_date->diffInMinutes($current_good_date, false));*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /*
        $current_good_date = Carbon::now()->timezone('America/Mexico_City');
        $current_bad_date = Carbon::now()->timezone('UTC');

        dump($current_good_date->diffInHours($current_bad_date));*/
    }
}
