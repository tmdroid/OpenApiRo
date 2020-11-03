<?php

namespace tmdroid\OpenApiRo\Traits;

use Illuminate\Database\Eloquent\Collection;
use tmdroid\OpenApiRo\Facades\OpenApiRo;
use tmdroid\OpenApiRo\Models\Company\Company;
use tmdroid\OpenApiRo\Models\Company\CompanyBalance;

trait CompanyEndpoints
{

    /**
     * @param string $cif
     * @return Company
     */
    public static function byCif(string $cif)
    {
        return OpenApiRo::company($cif);
    }

    /**
     * @param string $name
     * @param null $judet
     * @param bool $radiata
     * @return Collection|Company[]
     */
    public static function search(string $name, $judet = null, $radiata = false)
    {
        return OpenApiRo::search($name, $judet, $radiata);
    }

    /**
     * @param $cif
     * @return Collection|CompanyBalance[]
     */
    public static function balances($cif)
    {
        return OpenApiRo::balances($cif);
    }

    /**
     * @param $cif
     * @param $year
     * @return CompanyBalance
     */
    public static function balance($cif, $year)
    {
        return OpenApiRo::balance($cif, $year);
    }

}
