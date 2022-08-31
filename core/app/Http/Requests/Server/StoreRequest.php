<?php


namespace App\Http\Requests\Server;


use App\Models\ServerRam;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => ['required', 'string'],
            'asset_id' => ['required', Rule::unique('servers', 'asset_id')],
            'price' => ['required', 'numeric', 'min:0.01'],
            'ram_modules' => ['required', 'array', 'min:1'],
            'ram_modules.*' => ['required', 'array'],
            'ram_modules.*.size' => ['required', 'numeric'],
            'ram_modules.*.type' => ['required', 'string', Rule::in(ServerRam::RAM_TYPES)],
            'ram_modules.*.amount' => ['required', 'integer', 'min:1'],
            'brand_id' => ['required', Rule::exists('brands', 'id')]
        ];
    }
}
