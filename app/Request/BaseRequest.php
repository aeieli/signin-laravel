<?php

namespace App\Request;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

use Dingo\Api\Exception\StoreResourceFailedException;

class BaseRequest extends FormRequest
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

    public function messages()
    {
        $messages = [
            'unique' => ':attribute已存在',
            'required' => ':attribute不能为空',
            'string'   => ':attribute格式错误',
            'min'   => ':attribute 长度最短为:min',
            'max'   => ':attribute 长度不能超过:max',
            'mimes' => ':attribute 类型错误'
        ];
        if (method_exists($this, 'diyMessages')) {
            $messages = array_merge($messages, $this->diyMessages());
        }
        return $messages;
    }

    protected function failedValidation(Validator $validator)
    {
        $message = $validator->errors()->first();
        $res = ['IES_PARAM_ERROR'];
        
        /*array(
            'status' => 'IES_PARAM_ERROR',
            'status_code' => '501',
            'message' => $message
        );*/
        // Exception $previous = null, $headers = [], $code = 0
        throw new StoreResourceFailedException($message, 
                                    $res, null, [], 501);
    }

}
