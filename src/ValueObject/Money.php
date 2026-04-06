<?php

declare(strict_types=1);

namespace App\SharedBundle\ValueObject;

final readonly class Money
{
    public function __construct(
        private int $amount,
        private string $currency = 'USD',
    ) {
        if ($amount < 0) {
            throw new \InvalidArgumentException('Money amount cannot be negative.');
        }

        if ($currency === '') {
            throw new \InvalidArgumentException('Currency cannot be empty.');
        }
    }

    public static function fromFloat(float $value, string $currency = 'USD'): self
    {
        return new self((int) round($value * 100), $currency);
    }

    public function getAmount(): int
    {
        return $this->amount;
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }

    public function asFloat(): float
    {
        return $this->amount / 100;
    }

    public function equals(self $other): bool
    {
        return $this->amount === $other->amount
            && $this->currency === $other->currency;
    }

    public function add(self $other): self
    {
        $this->assertSameCurrency($other);

        return new self($this->amount + $other->amount, $this->currency);
    }

    public function subtract(self $other): self
    {
        $this->assertSameCurrency($other);

        $result = $this->amount - $other->amount;

        if ($result < 0) {
            throw new \DomainException('Money result cannot be negative.');
        }

        return new self($result, $this->currency);
    }

    private function assertSameCurrency(self $other): void
    {
        if ($this->currency !== $other->currency) {
            throw new \DomainException('Currencies must match.');
        }
    }
}