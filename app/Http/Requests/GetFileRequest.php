<?php

namespace App\Http\Requests;

use App\Enums\UserRole;
use App\Models\DocFile;
use Illuminate\Foundation\Http\FormRequest;

class GetFileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
//        $file = DocFile::find($this->route('id'));
//        if(!$file) {
//            return false;
//        }
//
//        if(\Auth::user()->id == $file->user_id) {
//            return true;
//        }
//
//        if(\Auth::user()->role == UserRole::Admin) {
//            return true;
//        }

        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
