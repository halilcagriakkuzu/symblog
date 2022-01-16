<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{
    #[Route('/post/{slug}', name: 'postDetail')]
    public function postDetail(string $slug): Response
    {
        return $this->render('post/postDetail.html.twig', [
            'slug' => $slug,
        ]);
    }

    #[Route('/tag/{tag}/posts', name: 'postsByTag')]
    public function postsByTag(string $tag): Response
    {
        return $this->render('post/postsByTag.html.twig', [
            'tag' => $tag,
        ]);
    }
}
