<?php

namespace App\Http\Requests\Booking;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'fullname' => 'required',
            'phoneNumber' => 'required|size:10',
            'check_inDate' => 'date|after_or_equal:' . now()->toDateString(),
            'check_outDate' => 'date|after_or_equal:check_inDate',
            'amountOfPeople' => 'required|numeric|gt:0'
        ];
    }
    public function messages(): array
    {
        return [
            'fullname.required' => 'Không được để trống !',
            'phoneNumber.required' => 'Không được để trống !',
            'phoneNumber.size' => 'Số điện thoại không hợp lệ !',
            'check_inDate.after_or_equal' => 'Không hợp lệ !',
            'check_inDate.date' => 'Không hợp lệ !',
            'check_outDate.after_or_equal' => 'Không hợp lệ !',
            'check_outDate.date' => 'Không hợp lệ !',
            'amountOfPeople.required' => 'Không được để trống !',
            'amountOfPeople.numeric' => 'Hãy nhập 1 số !',
            'amountOfPeople.gt' => 'Hãy nhập 1 số lớn hơn 0 !',
        ];
    }
}
