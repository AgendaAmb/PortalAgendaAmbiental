<?php

use App\Models\Auth\Extern;
use App\Models\Auth\Student;
use App\Models\Auth\Worker;
use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;

class ChangeDateColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $date = Carbon::parse('2021-09-09');

        $workers = Worker::where('created_at', '<', $date)->cursor();
        $students = Student::where('created_at', '<', $date)->cursor();
        $externs = Extern::where('created_at', '<', $date)->cursor();
        
        foreach ($workers->merge($students)->merge($externs) as $user)
        {
            $user->created_at = Carbon::parse($user->created_at)->subHours(5);
            $user->updated_at = Carbon::parse($user->updated_at)->subHours(5);
            $user->email_verified_at = Carbon::parse($user->email_verified_at)->subHours(5);

            $user->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $date = Carbon::parse('2021-09-09')->subHours(5);

        $workers = Worker::where('created_at', '<', $date)->cursor();
        $students = Student::where('created_at', '<', $date)->cursor();
        $externs = Extern::where('created_at', '<', $date)->cursor();
        
        foreach ($workers->merge($students)->merge($externs) as $user)
        {
            $user->created_at = Carbon::parse($user->created_at)->addHours(5);
            $user->updated_at = Carbon::parse($user->updated_at)->addHours(5);
            $user->email_verified_at = Carbon::parse($user->email_verified_at)->addHours(5);

            $user->save();
        }
    }
}
