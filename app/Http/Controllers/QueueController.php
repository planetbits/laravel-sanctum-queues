<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class QueueController extends Controller
{
    public function showPendingJobs()
    {
        $pendingJobs = DB::table('jobs')->count();
        return view('queue.pending', ['pendingJobs' => $pendingJobs]);
    }
}
