<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreSalesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'system_date_time' => 'required|date_format:'.config('app.date_format').' H:i:s',
            'volume_sold' => 'numeric|required',
            'volume_before_sales' => 'numeric|required',
//            'volume_after_sales' => 'numeric|required',
//            'amount' => 'numeric|required',
            'price_per_liter' => 'numeric|required',
        ];
    }
}
