<?php

namespace App\DataFixtures;

use App\Entity\Agencia;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;


class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        // criando objetos a serem persistido no banco
        for ($i = 1; $i < 9; $i++) {
            $agencia = new Agencia();
            $agencia->setNumeroAgencia('2000-'. $i);
            $agencia->setNome('Paraíba'.$i);
            $agencia->setGerente('gerente'.$i);
            $agencia->setEndereco('rua principal 00 ' . $i);
            $agencia->setCreated(new \DateTime());
            $manager->persist($agencia);
        }

        $manager->flush();
    }
}
