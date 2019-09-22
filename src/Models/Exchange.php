<?php


namespace tmdroid\OpenApiRo\Models;


use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 *
 * Class Exchange
 * @package tmdroid\OpenApiRo\Models
 *
 * @property string date
 * @property string query_date
 * @property string rate
 *
 * @method static Collection hydrate(array $array)
 */
class Exchange extends Model
{

    protected $casts = [
        'query_date' => 'datetime'
    ];

    protected $dateFormat = 'Y-m-d';

}