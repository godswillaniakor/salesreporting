<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Setup
 *
 * @package App
 * @property double $cvd
 * @property double $price_per_liter
*/
class Setup extends Model
{
    use SoftDeletes;

    protected $fillable = ['cvd', 'price_per_liter'];
    
    

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setCvdAttribute($input)
    {
        if ($input != '') {
            $this->attributes['cvd'] = $input;
        } else {
            $this->attributes['cvd'] = null;
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
