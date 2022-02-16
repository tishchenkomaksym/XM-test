<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function index()
    {
        return view('chart.prices');
    }
}
