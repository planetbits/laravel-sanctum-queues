<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CheckPendingJobs extends Command
{
    protected $signature = 'queue:check-pending';

    public function handle()
    {
        $pendingJobs = DB::table('jobs')->count();
        $this->info("Pending jobs: " . $pendingJobs);
    }
}
