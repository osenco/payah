<?php

namespace App\Http\Requests\Admin\Payout;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdatePayout extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.payout.edit', $this->payout);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'user_id'        => ['sometimes', 'numeric'],
            'method'         => ['sometimes', 'string'],
            'status'         => ['sometimes', 'string'],
            'amount'         => ['sometimes', 'numeric'],
            'currency'       => ['sometimes', 'string'],
            'reference'      => ['nullable', 'string'],
            'transaction_id' => ['nullable', 'string'],

        ];
    }

    /**
     * Modify input data
     *
     * @return array
     */
    public function getSanitized(): array
    {
        $sanitized = $this->validated();

        //Add your code for manipulation with request data here

        return $sanitized;
    }
}
