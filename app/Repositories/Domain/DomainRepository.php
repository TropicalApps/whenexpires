<?php

namespace App\Repositories\Domain;

/**
 * WhenExpires Domain repository interface
 */
interface DomainRepository
{
    public function get($domainName);
}
