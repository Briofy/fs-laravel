<?php

namespace Database\Factories;

use Briofy\FileSystem\Enums\Type;
use Briofy\FileSystem\Models\Attachment;
use Illuminate\Database\Eloquent\Factories\Factory;

class AttachmentFactory extends Factory
{
    protected $model = Attachment::class;

    public function definition()
    {
        return [
            'user_id' => str()->uuid()->toString(),
            'disk' => $this->faker->slug(),
            'path' => $this->faker->word(),
            'type' => array_rand(Type::toArray()),
        ];
    }
}
