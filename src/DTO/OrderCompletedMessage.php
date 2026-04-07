<?php

declare(strict_types=1);

namespace App\SharedBundle\DTO;

final readonly class OrderCompletedMessage
{
    public function __construct(
        public string $orderId,
        public string $productId,
        public string $customerName,
        public int $quantityOrdered,
        public string $orderStatus,
    )
    {
    }

    public function toArray(): array
    {
        return [
            'orderId' => $this->orderId,
            'productId' => $this->productId,
            'customerName' => $this->customerName,
            'quantityOrdered' => $this->quantityOrdered,
            'orderStatus' => $this->orderStatus,
        ];
    }
}