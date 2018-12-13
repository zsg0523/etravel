<?php

namespace App\Http\Requests\Api;

class RuleRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'POST':
                return [
                    'rule_category_id' => 'required|integer',
                    'rule' => 'required|string'
                ];
                break;
            
            case 'PATCH':
                return [
                    'rule_category_id' => 'integer',
                    'rule' => 'string'
                ];
                break;
        }
    }
}
