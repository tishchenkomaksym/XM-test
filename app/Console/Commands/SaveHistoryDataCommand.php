<?php

namespace App\Console\Commands;

use App\Service\HistoryService;
use Illuminate\Console\Command;

class SaveHistoryDataCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'company:save-history';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Save company history';
    /**
     * @var HistoryService
     */
    private HistoryService $historyService;

    /**
     * Create a new command instance.
     *
     * @param HistoryService $historyService
     */
    public function __construct(HistoryService $historyService)
    {
        parent::__construct();
        $this->historyService = $historyService;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->historyService->saveHistory();
    }
}
