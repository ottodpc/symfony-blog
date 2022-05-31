<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $sport = new Category();
        $sport->setName("Sport");
        $sport->addArticle($this->getReference("article-1"));// thx to ref
        $manager->persist($sport);

        $lecture = new Category();
        $lecture->setName("Lecture");
        $lecture->addArticle($this->getReference("article-2"));
        $manager->persist($lecture);

        $manager->flush();
    }
    // rattacher les cat & article
    public function getDependencies()
    {
        return [
            ArticleFixtures::class
        ];
    }
}
