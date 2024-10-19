<?php

declare(strict_types=1);

namespace App;

use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Money\Money;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand('demo')]
final class DemoCommand extends Command
{
    public function __construct(
        private readonly EntityManagerInterface $entityManager,
    )
    {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $product = new Product(Money::RUB('10000'));
        $this->entityManager->persist($product);
        $this->entityManager->flush();
        $productId = $product->id;

        unset($product);
        $this->entityManager->clear();

        dump($this->entityManager->find(Product::class, $productId));

        return self::SUCCESS;
    }
}
