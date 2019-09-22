<?php

namespace tmdroid\OpenApiRo\Models\Company;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CompanyBalance
 * @package tmdroid\OpenApiRo\Models
 *
 * @property string balance_type
 * @property string caen_code
 * @property CompanyBalanceData data
 * @property CompanyBalanceMeta meta
 * @property integer year
 *
 * @method static Collection hydrate($json_decode)
 */
class CompanyBalance extends Model
{

}