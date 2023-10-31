<?php

namespace App\DTO;

use Spatie\DataTransferObject\Attributes\MapFrom;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;

class CreateUserAnswerDTO extends Data
{
    public function __construct(
        public string $value,
        public int $user_id,
        public int $question_id,
        public int $question_response_id
    )
    {
    }
}