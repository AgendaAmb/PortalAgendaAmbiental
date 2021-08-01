<?php

namespace App\Jobs;

use App\Mail\VerifyEmail;
use App\Models\Auth\User;
use App\Models\Module;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendVerificationEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Final user.
     * @var User
     */
    public $user;

    /**
     * User module.
     * @var Module
     */
    public $module;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user, Module $module)
    {
        $this->user = $user;
        $this->module = $module;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->user)->queue(new VerifyEmail($this->module, $this->user));
    }
}
