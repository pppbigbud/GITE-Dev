<?php

namespace App\Controller;

use App\Entity\Category;
use App\Form\CategoryType;
use App\Repository\CategoryRepository;
use App\Repository\SousCategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/boutique')]
class BoutiqueController extends AbstractController
{
    #[Route('/', name: 'app_boutique_index', methods: ['GET'])]
    public function index(CategoryRepository $categoryRepository, SousCategoryRepository $sousCategoryRepository): Response
    {
        return $this->render('boutique/index.html.twig', [
            'categories' => $categoryRepository->findAll(),
            'souscategories' => $sousCategoryRepository->findAll(),
        ]);
    }

    #[Route('boutique/{id}/detail', name: 'app_boutique_detail', methods: ['GET'])]
    public function show(CategoryRepository $categoryRepository, string $id): Response
    {
        return $this->render('boutique/detail.html.twig', [
            'categoryDetail' => $categoryRepository->find($id),
        ]);
    }

}





//    #[Route('category/{id}/details', name: 'app_category_detail')]
//    public function detailCat(CategoryRepository $categoryRepository, string $id): Response
//    {
//        $category =$categoryRepository->find($id);
//
//        return $this->render('category/index.html.twig', [
//            'category' => $category,
//        ]);
//    }

//    #[Route('/new', name: 'app_boutique_new', methods: ['GET', 'POST'])]
//    public function new(Request $request, CategoryRepository $categoryRepository): Response
//    {
//        $category = new Category();
//        $form = $this->createForm(CategoryType::class, $category);
//        $form->handleRequest($request);
//
//        if ($form->isSubmitted() && $form->isValid()) {
//            $categoryRepository->save($category, true);
//
//            return $this->redirectToRoute('app_boutique_index', [], Response::HTTP_SEE_OTHER);
//        }
//
//        return $this->renderForm('boutique/new.html.twig', [
//            'category' => $category,
//            'form' => $form,
//        ]);
//    }
//
//    #[Route('/{id}', name: 'app_boutique_show', methods: ['GET'])]
//    public function show(Category $category): Response
//    {
//        return $this->render('boutique/show.html.twig', [
//            'category' => $category,
//        ]);
//    }
//
//    #[Route('/{id}/edit', name: 'app_boutique_edit', methods: ['GET', 'POST'])]
//    public function edit(Request $request, Category $category, CategoryRepository $categoryRepository): Response
//    {
//        $form = $this->createForm(CategoryType::class, $category);
//        $form->handleRequest($request);
//
//        if ($form->isSubmitted() && $form->isValid()) {
//            $categoryRepository->save($category, true);
//
//            return $this->redirectToRoute('app_boutique_index', [], Response::HTTP_SEE_OTHER);
//        }
//
//        return $this->renderForm('boutique/edit.html.twig', [
//            'category' => $category,
//            'form' => $form,
//        ]);
//    }
//
//    #[Route('/{id}', name: 'app_boutique_delete', methods: ['POST'])]
//    public function delete(Request $request, Category $category, CategoryRepository $categoryRepository): Response
//    {
//        if ($this->isCsrfTokenValid('delete'.$category->getId(), $request->request->get('_token'))) {
//            $categoryRepository->remove($category, true);
//        }
//
//        return $this->redirectToRoute('app_boutique_index', [], Response::HTTP_SEE_OTHER);

// }
