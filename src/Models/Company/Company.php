<?php

namespace tmdroid\OpenApiRo\Models\Company;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use tmdroid\OpenApiRo\Facades\CompanyEndpoints;

/**
 * Class Company
 * @package tmdroid\OpenApiRo\Models
 *
 * @property string accize
 * @property string act_autorizare
 * @property string adresa
 * @property string cif
 * @property string cod_postal
 * @property string denumire
 * @property string fax
 * @property string impozit_micro
 * @property string impozit_profit
 * @property string judet
 * @property string numar_reg_com
 * @property boolean radiata
 * @property string stare
 * @property string telefon
 * @property string tva
 * @property array tva_la_incasare
 * @property CompanyMeta meta
 *
 * @method static Collection hydrate(array $array)
 */
class Company extends Model
{
    use CompanyEndpoints;

    protected $dateFormat = 'Y-m-d\TH:i:s.u\Z';
}