<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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
     * @param  Request $request  Request Object
     *
     * @return Array             Request Data
     */
    public function query(Request $request)
    {
        $request->validate([
            'domain' => [
                'required',
                'regex:/^(?!:\/\/)(?:https?:\/\/)?(?:www\.)?(([a-zA-Z0-9-]+\.){0,5}[a-zA-Z0-9-][a-zA-Z0-9-]+\.[a-zA-Z]{2,64}?)$/u'
            ]
        ]);

        return $this->domain->get($request->domain);
    }
}
