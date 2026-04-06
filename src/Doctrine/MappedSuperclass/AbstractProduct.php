<?php

declare(strict_types=1);

namespace App\SharedBundle\Doctrine\MappedSuperclass;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\Uuid;
use App\SharedBundle\ValueObject\Money;

#[ORM\MappedSuperclass]
abstract class AbstractProduct
{
    #[ORM\Id]
    #[ORM\Column(type: 'uuid', unique: true)]
    protected Uuid $id;

    #[ORM\Column(length: 255)]
    protected string $name;

    #[ORM\Column(type: 'integer')]
    protected int $priceAmount;

    #[ORM\Column(type: 'string', length: 3)]
    protected string $priceCurrency = 'USD';

    #[ORM\Column(type: 'integer')]
    protected int $quantity;

    public function getId(): Uuid
    {
        return $this->id;
    }

    public function setId(Uuid $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getPrice(): Money
    {
        return new Money($this->priceAmount, $this->priceCurrency);
    }

    public function setPrice(Money $money): void
    {
        $this->priceAmount = $money->getAmount();
        $this->priceCurrency = $money->getCurrency();
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }
}