<?php

namespace App\DataFixtures;

use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ArticleFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i <= 10; $i++) {

            // obj creation
            $article = new Article();
            $article->setTitre("Le titre");
            $article->setContenu("Le contenu");
            #  '\' devant un obj native php
            $date = new \DateTime();
            $date->modify("-".$i.'days');
            $article->setCreationDate($date);

            // ref to be used any where
            $this->addReference("article-".$i, $article);

            // save in db thx to entity manager by dependence injection
            $manager->persist($article); // creation in db with an id

            $manager->flush(); // save in db
        }
    }

}
