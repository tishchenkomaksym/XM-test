<?php

namespace App\Http\Controllers;


use App\Service\HistoryService;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    /**
     * @var HistoryService
     */
    private HistoryService $historyService;

    public function __construct(HistoryService $historyService)
    {
        $this->historyService = $historyService;
    }

    public function index()
    {
        $historyPrices = json_decode($this->historyService->getHistoricalQuotes())->prices;

        return view('history.index', compact('historyPrices'));
    }
}
