<?php

namespace App\Services;

use Symfony\Component\HttpFoundation\Session\SessionInterface;

class CartServices
{
    public function addProduct(SessionInterface $session, string $id): void
    {
        $panier = $session->get('panier', []);

        if (!empty($panier['product'][$id])) {
            $panier['product'][$id]++;

        } else {

            $panier['product'][$id] = 1;
        }

        $session->set('panier', $panier);
    }

//    public function addServices(SessionInterface $session, string $id): void
//    {
//        $panier = $session->get('panier', []);
//
//        if (!empty($panier['tacos'][$id])) {
//            $panier['tacos'][$id]++;
//
//        } else {
//
//            $panier['tacos'][$id] = 1;
//        }
//
//        $session->set('panier', $panier);
//    }

//    public function addDrink(SessionInterface $session, string $id): void
//    {
//        $panier = $session->get('panier', []);
//
//        if (!empty($panier['drink'][$id])) {
//            $panier['drink'][$id]++;
//
//        } else {
//
//            $panier['drink'][$id] = 1;
//        }
//
//        $session->set('panier', $panier);
//    }

}