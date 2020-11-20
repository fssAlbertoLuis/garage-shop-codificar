<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EstimateRequest extends FormRequest
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
            'customer_name' => 'required',
            'vendor_name' => 'required',
            'description' => 'required',
            'estimate_value' => 'required|numeric'
        ];
    }
    
    
    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'estimate_value' => str_replace(',', '.', $this->estimate_value),
        ]);
    }
    
   
    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'customer_name' => 'nome do cliente',
            'vendor_name' => 'nome do vendedor',
            'description' => 'descrição',
            'estimate_value' => 'valor do orçamento'
        ];
    }
}
