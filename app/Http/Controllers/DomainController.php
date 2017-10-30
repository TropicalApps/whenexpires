<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DomainController extends Controller
{
    public function index()
    {
        $whois = new \Whois();
        $query = 'tropicalapps.com';
        $result = $whois->lookup($query,false);
        dd($result);
    }
}
