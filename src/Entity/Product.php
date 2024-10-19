<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Embedded;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Money\Money;

#[Entity]
final class Product
{
    #[Column(type: Types::INTEGER), Id, GeneratedValue('IDENTITY')]
    public readonly int $id;

    public function __construct(
        #[Embedded]
        public Money $price,
    ) {}
}
