<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagLogController extends Controller
{
    public function index()
    {
    	return view('index.tag_log');
    }
}
