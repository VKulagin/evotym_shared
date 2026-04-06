<?php

declare(strict_types=1);

namespace App\SharedBundle\Message;

use App\SharedBundle\Contract\ProductMessageInterface;
use App\SharedBundle\DTO\ProductPayload;

final readonly class ProductUpdatedMessage implements ProductMessageInterface
{
    public function __construct(
        private ProductPayload $product,
    ) {
    }

    public function getProduct(): ProductPayload
    {
        return $this->product;
    }
}