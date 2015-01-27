<?php

namespace SONUser\Fixture;

use Doctrine\Common\DataFixtures\AbstractFixture,
    Doctrine\Common\Persistence\ObjectManager;

use SONUser\Entity\User;

class LoadUser extends AbstractFixture
{
    public function load(ObjectManager $manager) 
    {
        $user = new User();
        $user->setNome('Rogério Silva')
                ->setEmail('ress.rogerio@gmail.com')
                ->setPassword(123456)
                ->setActive(TRUE);
        
        $manager->persist($user);
        $manager->flush();
    }
}
