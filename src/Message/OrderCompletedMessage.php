<?php

declare(strict_types=1);

namespace App\SharedBundle\Message;

final readonly class OrderCompletedMessage
{
    public function __construct(
        public string $orderId,
        public string $productId,
        public string $customerName,
        public int $quantityOrdered,
        public string $orderStatus,
    ) {
    }
}