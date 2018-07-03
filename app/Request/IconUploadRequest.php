<?php

namespace App\Request;

use App\Request\BaseRequest;
use Illuminate\Foundation\Http\FormRequest;

class IconUploadRequest extends BaseRequest
{
    /**
     * 定义字段别名
     * 
     * @return array 
    */
    public function attributes()
    {
        return [
            'photo' => '文件'
        ];
    }

    public function diyMessages(){
        return ['max'   => ':attribute 长度不能超过1MB'];

    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'photo' => 'required|max:1000|mimes:jpg,png,gif,jpeg'
        ];
    }

}
