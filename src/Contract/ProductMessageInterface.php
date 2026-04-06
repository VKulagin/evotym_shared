<?php

declare(strict_types=1);

namespace App\SharedBundle\Contract;

use App\SharedBundle\DTO\ProductPayload;

interface ProductMessageInterface
{
    public function getProduct(): ProductPayload;
}