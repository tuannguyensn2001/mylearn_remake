<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'name' => 'required',
            'slug' => 'required',
            'price' => 'required',
            'tag_id' => 'required',
            'level' => 'required',
            'status' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Tên khóa học không được để trống',
            'slug.required' => 'Slug không được để trống',
            'price.required' => 'Giá khóa học không được để trống',
            'tag_id.required' => 'Chủ đề không được để trống',
            'level.required' => 'Độ khó không được để trống',
            'status.required' => 'Trạng thái không được để trống',
        ];
    }

}
