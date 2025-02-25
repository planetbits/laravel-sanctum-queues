<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Queue;

class ListQueueWorkers extends Command
{
    protected $signature = 'queue:list-workers';
    protected $description = 'List queue workers and job counts';

    public function handle()
    {
        $queues = ['default', 'emails', 'SendEmail']; // Add your queue names here

        foreach ($queues as $queue) {
            $count = Queue::size($queue);
            $this->info("Queue: $queue - Jobs: $count");
        }
    }
}
