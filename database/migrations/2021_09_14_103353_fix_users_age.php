<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class FixUsersAge extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $externs = DB::table('externs')->select('id', 'age', 'curp')->selectSub('select \'externs\'', 'table')->whereNull('age')->whereNotNull('curp')->get();
        $workers = DB::table('workers')->select('id', 'age', 'curp')->selectSub('select \'workers\'', 'table')->whereNull('age')->whereNotNull('curp')->get();
        $students = DB::table('students')->select('id', 'age', 'curp')->selectSub('select \'students\'', 'table')->whereNull('age')->whereNotNull('curp')->get();

        foreach ($externs->merge($workers)->merge($students) as $user)
        {
            $birth_string = Str::substr($user->curp, 4, 6);
            $year = Str::substr($birth_string, 0, 2);
            $month = Str::substr($birth_string, 2, 2);
            $day = Str::substr($birth_string, 4, 2);

            $date = Carbon::parse($year.'-'.$month.'-'.$day);
            $age = Carbon::now()->diffInYears($date);

            DB::table($user->table)->where('id', $user->id)->update(['age' => $age]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('externs')->whereNotNull('age')->whereNotNull('curp')->update(['age' => null]);
        DB::table('workers')->whereNotNull('age')->whereNotNull('curp')->update(['age' => null]);
        DB::table('students')->whereNotNull('age')->whereNotNull('curp')->update(['age' => null]);
    }
}
