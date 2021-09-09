<?php

use App\Mail\RegisteredToMMUSConference;
use App\Models\Auth\Extern;
use App\Models\Auth\Student;
use App\Models\Auth\Worker;
use App\Models\Workshop;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Mail;

class SendEmail extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $workshop = Workshop::firstWhere('name', 'curso movilidad y urbanismo');

        Student::whereHas('workshops', function($query) use ($workshop){
            $query->where('id', $workshop->id);
        })->get()
        ->each(function($user) use ($workshop){
            $user->workshops()->updateExistingPivot($workshop->id, [
                'sent' => true,
                'sent_at' => Carbon::now()->timezone('America/Mexico_City')
            ]);

            Mail::to($user)->send(new RegisteredToMMUSConference);
        });

        Extern::whereHas('workshops', function($query) use ($workshop){
            $query->where('id', $workshop->id);
        })->get()
        ->each(function($user) use ($workshop){
            $user->workshops()->updateExistingPivot($workshop->id, [
                'sent' => true,
                'sent_at' => Carbon::now()->timezone('America/Mexico_City')
            ]);

            Mail::to($user)->send(new RegisteredToMMUSConference);
        });

        Worker::whereHas('workshops', function($query) use ($workshop){
            $query->where('id', $workshop->id);
        })->get()
        ->each(function($user) use ($workshop){
            $user->workshops()->updateExistingPivot($workshop->id, [
                'sent' => true,
                'sent_at' => Carbon::now()->timezone('America/Mexico_City')
            ]);

            Mail::to($user)->send(new RegisteredToMMUSConference);
        });
    }
}