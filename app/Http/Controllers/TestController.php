<?php

namespace App\Http\Controllers;

use App\Services\ParserService;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function __invoke()
    {
        $text = '# Heading 1 : title

        other line

        an another line

        ';


        return (new ParserService($text))->html();
    }
}
