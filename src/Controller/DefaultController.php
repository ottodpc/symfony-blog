<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Comment;
use App\Form\AddArticleFormType;
use App\Form\CommentType;
use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    // / liste les articles
    /**
     * @Route("/", name="liste_articles", methods={"GET"})
     */
    public function liste_article(ArticleRepository $articleRepository): Response
    {
        /** generateUrl : method from AbstractController class
         * // $url1 = $this->generateUrl(route:'article', parameters: ['id' => 1]);
         * // $url2 = $this->generateUrl(route:'article', parameters: ['id' => 2]);
         * $url3 = $this->generateUrl(route:'article', parameters: ['id' => 3]);
         * // return new Response(content:
         * //     "<ul>
         * //         <li><a href='".$url1."'>Article 1</a></li>
         * //        <li><a href='".$url2."'>Article 2</a></li>
         * //        <li><a href='".$url3."'>Article 3</a></li>
         * //    </ul>");
         */
        $articles = $articleRepository->findAll();
        // dd($article);
        // return new Response(content: "<h1>Article ".$id."<p>Contenu de l'article ".$id."</p>");
        $twig_view = $this->render('default/index.html.twig',
            [
                # "controller_name" => "[{src: 'imgSrc', name: 'Name'}, {src: 'imgSrc', name: 'Name'}]"
                'url1' => $this->generateUrl(route: 'article', parameters: ['id' => 1]),
                'url2' => $this->generateUrl(route: 'article', parameters: ['id' => 2]),
                'url3' => $this->generateUrl(route: 'article', parameters: ['id' => 3]),
                'articles' => $articles

            ]);

        return $twig_view;
    }


    // /id affiche un article
    // requirement est typage du params. Format identique aux ExpReg
    /**
     * @Route("/{id}", name="article", requirements={"id"="\d+"}, methods={"GET", "POST"})
     */
    public function get_article(Article $article, Request $req, EntityManagerInterface $manager): Response
    {
        // public function get_article(ArticleRepository $articleRepository, $id, Request $req): Response{

        $comment = new Comment();
        $comment->setArticle($article); // Pour ne pas avoir une liste déroulante actuellement
        $form = $this->createForm(CommentType::class, $comment);
        $form->handleRequest($req);

        $page = $this->render("default/article.html.twig", ["article" => $article, "form" => $form->createView()]);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($comment);
            $manager->flush();
            return $page;
        }

        // $article = $articleRepository->find($id);
        // $article = $articleRepository->findByCreationDate(new \DateTime(2022-05-30)); // marche pas
        // dd($article);
        // return new Response(content: "<h1>Article ".$id."<p>Contenu de l'article ".$id."</p>");
        return $page;
    }

    // => why can not get formulaire on front when we put mehtod props
    #[Route('/article/add', name: 'add_article', methods: ["POST", "GET"])]
    public function add_article(Request $request, EntityManagerInterface $entityManager): Response
    {
        $article = new Article();
        // $form = $this->createFormBuilder()
        $form = $this->createForm(AddArticleFormType::class, $article); // $article mapé par le formulaire
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($article);
            $entityManager->flush();
            return $this->redirectToRoute("liste_articles");
        }
        return $this->render("default/add_article.html.twig", ["form" => $form->createView()]);
    }

    // route test
    #[Route('/test', name: 'test', methods: "GET")]
    public function liste(): Response
    {
        $res = new Response(content: "");
        return $res;
    }
}