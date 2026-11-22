<?php
class ProductController extends Controller
{
    public function index(): void
    {
        // TODO: $products = $this->model('Product')->getAll();
        $this->view('products/index', [
            'title' => 'Products',
        ]);
    }

    // TODO: handle "add to cart" form submissions (product id + quantity)
}
