<?php
class CartController extends Controller
{
    public function index(): void
    {
        // TODO: load cart items from $_SESSION and calculate
        // subtotal, tax, shipping, and total
        $this->view('cart/index', [
            'title' => 'Shopping Cart',
        ]);
    }

    // TODO: update quantity, remove item, place order
}
