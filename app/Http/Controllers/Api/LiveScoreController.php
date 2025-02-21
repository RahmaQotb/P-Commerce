<?php

namespace App\Http\Controllers\Api;

use App\services\Api\LiveScoreService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LiveScoreController extends Controller
{
    protected $liveScoreService;

    public function __construct(LiveScoreService $liveScoreService)
    {
        $this->liveScoreService = $liveScoreService;
    }

    public function showLiveScores()
{
    try {
        $scores = $this->liveScoreService->getLiveScores();
        return response()->json($scores);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}

}
