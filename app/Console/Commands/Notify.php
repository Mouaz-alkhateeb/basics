<?php

namespace App\Console\Commands;

use App\Mail\TestMail;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class Notify extends Command
{

    protected $signature = 'notify:email';

    protected $description = 'send email to user every 5 minutes automaticlly';


    public function handle()
    {
        $emails = User::pluck('email')->toArray();
        foreach ($emails as  $email) {
            Mail::to($email)->send(new TestMail());
        }
        return Command::SUCCESS;
    }
}
