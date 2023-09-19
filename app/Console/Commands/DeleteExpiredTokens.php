<?php

namespace App\Console\Commands;

use App\Models\randomcode;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

class DeleteExpiredTokens extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tokens:delete-expired';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete expired tokens';

    /**
     * Execute the console command.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $now = Carbon::now();

        // ค้นหาและลบข้อมูลที่ถูกเลยเวลา
        randomcode::where('end_date', '<=', $now)->delete();

        $this->info('Expired tokens deleted successfully.');
    }
}
