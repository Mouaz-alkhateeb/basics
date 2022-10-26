<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class expiration extends Command
{
    protected $signature = 'user:expire';
    protected $description = 'check on user every 5 minutes automaticlly';

    public function handle()
    {
        $users = User::where('expire', 0)->get();
        foreach ($users as  $user) {
            $user->update(['expire' => 1]);
        }
        return Command::SUCCESS;
    }
}
