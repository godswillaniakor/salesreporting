<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Sale
 *
 * @package App
 * @property string $system_date_time
 * @property double $volume_sold
 * @property double $volume_before_sales
 * @property double $volume_after_sales
 * @property double $amount
 * @property double $price_per_liter
*/
class Sale extends Model
{
    use SoftDeletes;

    protected $fillable = ['system_date_time', 'volume_sold', 'volume_before_sales', 'volume_after_sales', 'amount', 'price_per_liter'];
    
    

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setSystemDateTimeAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['system_date_time'] = Carbon::createFromFormat(config('app.date_format') . ' H:i:s', $input)->format('Y-m-d H:i:s');
        } else {
            $this->attributes['system_date_time'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getSystemDateTimeAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format') . ' H:i:s');

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d H:i:s', $input)->format(config('app.date_format') . ' H:i:s');
        } else {
            return '';
        }
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setVolumeSoldAttribute($input)
    {
        if ($input != '') {
            $this->attributes['volume_sold'] = $input;
        } else {
            $this->attributes['volume_sold'] = null;
        }
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setVolumeBeforeSalesAttribute($input)
    {
        if ($input != '') {
            $this->attributes['volume_before_sales'] = $input;
        } else {
            $this->attributes['volume_before_sales'] = null;
        }
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setVolumeAfterSalesAttribute($input)
    {
        if ($input != '') {
            $this->attributes['volume_after_sales'] = $input;
        } else {
            $this->attributes['volume_after_sales'] = null;
        }
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setAmountAttribute($input)
    {
        if ($input != '') {
            $this->attributes['amount'] = $input;
        } else {
            $this->attributes['amount'] = null;
        }
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setPricePerLiterAttribute($input)
    {
        if ($input != '') {
            $this->attributes['price_per_liter'] = $input;
        } else {
            $this->attributes['price_per_liter'] = null;
        }
    }
    
}
