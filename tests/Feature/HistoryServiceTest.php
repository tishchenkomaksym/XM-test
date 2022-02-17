<?php

namespace Tests\Unit;

use App\Service\HistoryService;
use Tests\TestCase;

class HistoryServiceTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testGetHistoricalQuotes()
    {
        $historyService = new HistoryService();
        $this->assertIsString($historyService->getHistoricalQuotes('AAIT'));
    }
}
