<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QueueController extends Controller
{
    public function getPendingJobs()
    {
        $pendingJobs = DB::table('jobs')->count();
        return response()->json(['pending_jobs' => $pendingJobs]);
    }
}
