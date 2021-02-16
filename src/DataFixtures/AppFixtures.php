<?php

namespace App\DataFixtures;

use App\Entity\Contact;
use App\Entity\Produit;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $product = new Produit();
        $product->setName("produit")
         ->setPicture("https://source.unsplash.com/random/286x180")
         ->setDescription("description du produit")
         ->setPromo(true)
         ->setCreated(new \DateTime());

    
        $Contact = new Contact();
        $Contact -> setEmail("vv")
         ->setSubject("")
         ->setmessage("")
         ->setContactDate(new \DateTime())
         ->setCreated(new \DateTime());


      $manager->persist($product);
      $manager->persist($Contact);

        $manager->flush();
    }
}
