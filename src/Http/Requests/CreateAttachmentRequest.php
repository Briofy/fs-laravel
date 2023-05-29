<?php

namespace Briofy\FileSystem\Http\Requests;

use Briofy\FileSystem\Enums\Type;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateAttachmentRequest extends FormRequest
{
    protected $stopOnFirstFailure = true;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        // todo: handle mimetypes with Briofy\FileSystem\Enums\MimesType::class
        $mimes = [
            Type::IMAGE->value => 'png,jpg,jpeg',
            Type::DOCUMENT->value => 'zip,rar',
        ];

        return [
            'type' => ['required', 'integer', Rule::in(Type::toArray())],
            'file' => [
                'required',
                'file',
                'mimes:'.$mimes[$this->type],
                'max:'.config('briofy-filesystem.attachments.max_file_size'),
            ],
        ];
    }
}
