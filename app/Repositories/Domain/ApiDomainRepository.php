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
     *
     * @param Taxonomy $taxonomy
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
    public function getDomainData($domain)
    {
        try {
            $rawData = $this->whoIs->lookup($domain,false);
            // Check if domain is supported
            if (!empty($rawData['regrinfo']['registered']) && $rawData['regrinfo']['registered'] === 'unknown') {
                return ['status' => false, 'message' => 'Unsupported Domain'];
            } elseif (!empty($rawData['regrinfo']['registered']) && $rawData['regrinfo']['registered'] === 'no') {
                return ['status' => false, 'message' => 'Domain not registered'];
            } elseif (!empty($rawData['regrinfo']['registered']) && $rawData['regrinfo']['registered'] == 'yes') {
                $date = collect($rawData['rawdata'])->filter(function ($dataItem) {
                    return str_contains($dataItem, 'Registry Expiry Date');
                })->first();
                if (preg_match('/\d{4}-\d{2}-\d{2}T\d{2}:\d{2}:\d{2}Z/', $date, $matches)) {
                    return [
                        'status'  => true,
                        'date'    => 'Expiry Date: '. Carbon::parse($matches[0])->toDateTimeString(),
                        'message' => 'Success'
                    ];
                }
                return ['status' => false, 'message' => 'Date not found'];
            }
        } catch (Exception $e) {
            logger('Something Wrong here '+ $e->getMessage());
            return ['status' => false, 'message' => 'Error'];
        }

    }
}
