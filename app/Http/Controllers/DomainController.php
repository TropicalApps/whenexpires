<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DomainController extends Controller
{
    /**
     * Get Domain information of given domain name
     *
     * @return Json Response
     */
    public function getDomain()
    {
        $whois = new \Whois();
        $query = 'tropicalapps.com';
        $result = $whois->lookup($query,false);
        dd($result);
    }
}
