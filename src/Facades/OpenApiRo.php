<?php

namespace tmdroid\OpenApiRo\Facades;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Facade;
use tmdroid\OpenApiRo\Models\Bic;
use tmdroid\OpenApiRo\Models\Cnp\Cnp;
use tmdroid\OpenApiRo\Models\Company\Cif;
use tmdroid\OpenApiRo\Models\Company\Company;
use tmdroid\OpenApiRo\Models\Company\CompanyBalance;
use tmdroid\OpenApiRo\Models\Exchange;
use tmdroid\OpenApiRo\Models\Iban;

/**
 * Class OpenApiRo
 * @package tmdroid\OpenApiRo\Facades
 *
 * @method static Company company($cif)
 * @method static Company[]|Collection search(string $q, string $judet = "", boolean $include_radiata = false);
 * @method static CompanyBalance[]|Collection balances($cif)
 * @method static CompanyBalance balance($cif, $year)
 * @method static Cif validateCif($cif)
 * @method static Cnp validateCnp($cnp)
 * @method static Iban validateIban($iban)
 * @method static Bic validateBic($bic)
 * @method static Exchange exchange($currency, $date = null)
 *
 *
 */
class OpenApiRo extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'openapiro';
    }
}
