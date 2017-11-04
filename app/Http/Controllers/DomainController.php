<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Domain\DomainRepository as Domain;

class DomainController extends Controller
{
    protected $domain;
    /**
     * Constructor
     *
     * @param Article $article repository
     */
    public function __construct(Domain $domain)
    {
        $this->domain = $domain;
    }

    /**
     * Get Domain information
     *
     * @param  String $domainName Domain's Name
     * @return Array             Request Data
     */
    public function query(Request $request)
    {
        return $this->domain->get($request->domain);
    }
}
