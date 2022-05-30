<?php

namespace App\Controller;

use App\Entity\Article;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    // / liste les articles
    /**
     * @Route("/", name="liste_articles", methods={"GET"})
     */
    public function liste_article(): Response {
        // generateUrl : method from AbstractController class
        $url1 = $this->generateUrl(route:'article', parameters: ['id' => 1]);
        $url2 = $this->generateUrl(route:'article', parameters: ['id' => 2]);
        $url3 = $this->generateUrl(route:'article', parameters: ['id' => 3]);
        // return new Response(content:
        //     "<ul>
        //         <li><a href='".$url1."'>Article 1</a></li>
        //        <li><a href='".$url2."'>Article 2</a></li>
        //        <li><a href='".$url3."'>Article 3</a></li>
        //    </ul>");
        $articles = [
            [
                'nom' => 'Article 1',
                'url' => $url1,
                'id' => 1,
            ],
            [
                'nom' => 'Article 2',
                'url' => $url2,
                'id' => 2,
            ],
            [
                'nom' => 'Article 3',
                'url' => $url3,
                'id' => 3,
            ]
        ];
        $twig_view = $this->render('default/index.html.twig',
        [
            # "controller_name" => "[{src: 'imgSrc', name: 'Name'}, {src: 'imgSrc', name: 'Name'}]"
            'url1' => $this->generateUrl(route:'article', parameters: ['id' => 1]),
            'url2' => $this->generateUrl(route:'article', parameters: ['id' => 2]),
            'url3' => $this->generateUrl(route:'article', parameters: ['id' => 3]),
            'articles' => $articles

        ]);

        return $twig_view;
    }


    // /id affiche un article
    // requirement est typage du params. Format identique aux ExpReg
    /**
     * @Route("/{id}", name="article", requirements={"id"="\d+"}, methods={"GET"})
     */
    public function get_article($id): Response{
        // dd($id);
        // return new Response(content: "<h1>Article ".$id."<p>Contenu de l'article ".$id."</p>");
        return $this->render("default/article.html.twig", ["id" => $id]);
    }

    #[Route('/article/add', name: 'add_article', methods: "GET")]
    public function add_article(EntityManagerInterface $manager): Response
    {
        // obj creation
        $article = new Article();
        $article ->setTitre("Le titre");
        $article->setContenu("Le contenu");
        #  '\' devant un obj native php
        $article->setCreationDate(new \DateTime());
        // save in db thx to entity manager by dependence injection
        $manager->persist($article); // creation in db with an id
        $manager->flush(); // save in db with an id
        dd($article);
        return $article;
    }
    // route test
    #[Route('/test', name: 'test', methods: "GET")]
    public function liste(): Response
    {
        $res = new Response(content: "test");
        return $res;
    }

}
