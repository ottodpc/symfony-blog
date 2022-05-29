<?php

namespace App\Controller;

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
                'url' => $url1
            ],
            [
                'nom' => 'Article 2',
                'url' => $url2
            ],
            [
                'nom' => 'Article 3',
                'url' => $url3
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

    // route test
    #[Route('/test', name: 'test', methods: "GET")]
    public function liste(): Response
    {
        $res = new Response(content: "test");
        return $res;
    }
}
