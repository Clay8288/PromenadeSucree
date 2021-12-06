<?php

namespace App\Controller;

use App\Entity\Categories;
use App\Entity\Pastries;
use App\Repository\CategoriesRepository;
use App\Repository\PastriesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PastriesController extends AbstractController
{
    /**
     * @Route("/pastries", name="pastries")
     */
    public function index(CategoriesRepository $categories): Response
    {
        //dd($categories);

        return $this->render('pastries/index.html.twig', [
            'categories' => $categories->findAll(),
        ]);
    }

    /**
     * @Route("/pastries/{id}", name="category")
     */
    public function show(CategoriesRepository $category, $id, PastriesRepository $pastries): Response
    {
            //dd($category->find($id));
            //dd($pastries->findByCategory($id));
        return $this->render('pastries/category.html.twig', [
            'category' => $category->find($id),
            'pastries' => $pastries->find($id),
            'pastry' => $pastries->findByCategory($id),
        ]);
    }
}
