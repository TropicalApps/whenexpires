<?php

namespace App\Repositories\Domain;

use Carbon\Carbon;

/**
 * ApiArticleRepository class
 *
 * This class handles all content related Article API calls
 */
class ApiDomainRepository implements DomainRepository
{
    protected $whoIs;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->whoIs = new \Whois;
    }

    /**
     * Get Domain Data
     *
     * @param  String  $domain  The slug or number of the post
     *
     * @return array
     */
    public function get($domain)
    {
        try {
            $domain = $this->formatDomain($domain);
            $rawData = $this->whoIs->lookup($domain, false);
            // Check if domain is supported
            if (!empty($rawData['regrinfo']['registered']) && $rawData['regrinfo']['registered'] === 'unknown') {
                return ['status' => false, 'message' => "Domain {$domain} is Unsupported", 'domain' => $domain];
            } elseif (!empty($rawData['regrinfo']['registered']) && $rawData['regrinfo']['registered'] === 'no') {
                return ['status' => false, 'message' => "Domain {$domain} not registered", 'domain' => $domain];
            } elseif (!empty($rawData['regrinfo']['registered']) && $rawData['regrinfo']['registered'] == 'yes') {
                $date = collect($rawData['rawdata'])->filter(function ($dataItem) {
                    return str_contains($dataItem, 'Registry Expiry Date');
                })->first();
                if (preg_match('/\d{4}-\d{2}-\d{2}T\d{2}:\d{2}:\d{2}Z/', $date, $matches)) {
                    return [
                        'status'  => true,
                        'date'    => Carbon::parse($matches[0])->format('M, d, Y'),
                        'message' => 'Success',
                        'domain' => $domain
                    ];
                }
                return ['status' => false, 'message' => 'Date not found'];
            }
        } catch (Exception $e) {
            logger('Something Wrong here '+ $e->getMessage());
            return ['status' => false, 'message' => 'Error'];
        }
    }
    /**
     * Get domain name from URL
     *
     * @param  String $url URL
     *
     * @return String Domain name
     */
    public function formatDomain($url)
    {
        $pattern = '/^(?!:\/\/)(?:https?:\/\/)?(?:www\.)?(([a-zA-Z0-9-]+\.){0,5}[a-zA-Z0-9-][a-zA-Z0-9-]+\.[a-zA-Z]{2,64}?)$/';
        preg_match($pattern, $url, $matches);
        return $matches[1];
    }
}
