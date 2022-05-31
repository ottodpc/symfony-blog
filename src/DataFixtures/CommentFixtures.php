<?php

namespace App\DataFixtures;

use App\Entity\Comment;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CommentFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i <= 10; $i++) {
            $comment = new Comment();
            $comment->setContenu("Le contenu du comment comment");
            $comment->setAuthor("OTTO Dieu-Puissant");
            $comment->setDateComment(new \DateTime());

            $comment->setArticle($this->getReference("article-1"));

            $manager->persist($comment);

            $manager->flush();
        }
    }
    public function getDependencies() {
        return [
            ArticleFixtures::class
        ];
    }
}
