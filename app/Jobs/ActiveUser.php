<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ActiveUser implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $users_id;
    // public function __construct($users_id)
    // {
    //     $this->users_id = $users_id;
    // }

    public function handle()
    {
        //$users = User::where('status', 0)->pluck('id');
        // $users = $this->users_id;
        // foreach ($users as $user) {
        //     User::where('id', $user)->update(['status' => 0]);
        // }
    }
}
