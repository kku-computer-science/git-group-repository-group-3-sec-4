<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stichoza\GoogleTranslate\GoogleTranslate;

class TestTranslateController extends Controller
{
    public function index()
    {
        return "Test Translate Controller is working!";
    }
}
