<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;

class LogoutCommand extends Command
{
    protected $signature = 'auth:logout';

    protected $description = 'Logout the currently authenticated user';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        Auth::logout();
        $this->info('Logged out successfully.');
    }
}

