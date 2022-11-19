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

    public function addBooking(SessionInterface $session): void
    {
        $panier = $session->get('panier', []);

        if (!empty($panier['booking'])) {
            $panier['booking']++;

        } else {

            $panier['booking'] = 1;
        }

        $session->set('panier', $panier);
    }

}