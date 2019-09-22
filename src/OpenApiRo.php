<?php

namespace tmdroid\OpenApiRo;

use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Collection;
use tmdroid\OpenApiRo\Models\Bic;
use tmdroid\OpenApiRo\Models\Cnp\Cnp;
use tmdroid\OpenApiRo\Models\Company\Cif;
use tmdroid\OpenApiRo\Models\Company\Company;
use tmdroid\OpenApiRo\Models\Company\CompanyBalance;
use tmdroid\OpenApiRo\Models\Company\CompanySearchResult;
use tmdroid\OpenApiRo\Models\Exchange;
use tmdroid\OpenApiRo\Models\Iban;

class OpenApiRo
{
    /** @var Client */
    private $client;

    public function __construct()
    {
        $this->client = new Client([
            'headers' => [
                'x-api-key' => config('openapiro.apikey')
            ],
            'base_uri' => config('openapiro.url')
        ]);
    }

    /**
     * Generic wrapper for Guzzle client requests
     *
     * @param $url
     * @param string $method
     * @param array $payload
     * @return mixed
     */
    private function fetch($url, $method = 'GET', $payload = [])
    {
        $method = strtolower($method);

        return $this->client->{$method}($url, $payload)->getBody()->getContents();
    }

    /**
     * @param string $cif
     * @return Company | null
     */
    public function company($cif)
    {
        $contents = $this->fetch("/api/companies/{$cif}");

        return Company::hydrate(
            [
                json_decode($contents, true)
            ]
        )->first();
    }

    /**
     * @param $q
     * @param null $judet
     * @param bool $radiata
     * @return Collection|Company
     */
    public function search($q, $judet = null, $radiata = false)
    {
        $contents = $this->fetch("/api/companies/search", 'post', [
            'json' => [
                'q' => $q,
                'judet' => $judet,
                'include_radiata' => $radiata
            ]
        ]);

        return CompanySearchResult::hydrate(
            json_decode($contents)
        );
    }


    /**
     * @param string $cif
     * @return Collection|CompanyBalance[]
     */
    public function balances(string $cif)
    {
        $contents = $this->fetch("/api/companies/{$cif}/balances");

        return CompanyBalance::hydrate(
            json_decode($contents, true)
        );

    }

    /**
     * @param string $cif
     * @param int $year
     * @return CompanyBalance
     */
    public function balance(string $cif, int $year)
    {
        $contents = $this->fetch("/api/companies/{$cif}/balances/{$year}");

        return CompanyBalance::hydrate(
            [
                json_decode($contents, true)
            ]
        )->first();
    }

    /**
     * @param string $cif
     * @return Cif|null
     */
    public function validateCif(string $cif)
    {
        $contents = $this->fetch("/api/validate/cif/{$cif}");

        return Cif::hydrate(
            [
                json_decode($contents, true)
            ]
        )->first();
    }

    /**
     * @param string $cnp
     * @return Cnp|null
     */
    public function validateCnp(string $cnp)
    {
        $contents = $this->fetch("/api/validate/cnp/{$cnp}");

        return Cnp::hydrate(
            [
                json_decode($contents, true)
            ]
        )->first();
    }

    /**
     * @param string $iban
     * @return Iban|null
     */
    public function validateIban(string $iban)
    {
        $contents = $this->fetch("/api/validate/iban/{$iban}");

        return Iban::hydrate(
            [
                json_decode($contents, true)
            ]
        )->first();
    }

    /**
     * @param string $bic
     * @return Iban|null
     */
    public function validateBic(string $bic)
    {
        $contents = $this->fetch("/api/validate/bic/{$bic}");

        return Bic::hydrate(
            [
                json_decode($contents, true)
            ]
        )->first();
    }

    /**
     * @param string $currency
     * @param null $date
     * @return Exchange|null
     */
    public function exchange(string $currency, $date = null)
    {
        $date = null ? now() : $date;
        $formatted = $date->format('Y-m-d');

        $contents = $this->fetch("/api/exchange/{$currency}?date={$formatted}");

        return Exchange::hydrate(
            [
                json_decode($contents, true)
            ]
        )->first();
    }


}