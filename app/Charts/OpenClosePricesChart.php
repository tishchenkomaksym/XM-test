<?php

declare(strict_types = 1);

namespace App\Charts;

use App\Models\History;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;

class OpenClosePricesChart extends BaseChart
{

    /**
     * Determines the chart name to be used on the
     * route. If null, the name will be a snake_case
     * version of the class name.
     */
    public ?string $name = 'open_close_prices';

    /**
     * Determines the name suffix of the chart route.
     * This will also be used to get the chart URL
     * from the blade directrive. If null, the chart
     * name will be used.
     */
    public ?string $routeName = 'chart_prices';

    /**
     * Determines the prefix that will be used by the chart
     * endpoint.
     */
//    public ?string $prefix = 'some_prefix';

    /**
     * Determines the middlewares that will be applied
     * to the chart endpoint.
     */
//    public ?array $middlewares = ['auth'];


    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     *
     * @param Request $request
     *
     * @return Chartisan
     */
    public function handler(Request $request): Chartisan
    {
        return Chartisan::build()
            ->labels(['Open', 'Close'])
            ->dataset('Open', History::pluck('open')->toArray())
            ->dataset('Close', History::pluck('close')->toArray());
    }
}
