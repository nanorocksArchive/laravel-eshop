<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Grocery\GroceryCrud;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductImage;

class AdminController extends Controller
{
    use GroceryCrud;

    public function orders()
    {
        $crud = $this->_getGroceryCrudEnterprise();

        $crud->setTable('orders');
        $crud->setSkin('bootstrap-v5');

        $crud->setRelation(Order::CUSTOMER_ID, 'customers', Customer::EMAIL);
        $crud->displayAs(Order::CUSTOMER_ID,'Customer email');

        $crud->setSubject('Order', 'Orders');

        $output = $crud->render();

        return $this->_showOutput($output);
    }

    public function products()
    {
        $crud = $this->_getGroceryCrudEnterprise();

        $crud->setTable('products');
        $crud->setSkin('bootstrap-v5');
        $crud->setSubject('Product', 'Products');
        $crud->displayAs(Product::IMAGE,'Master Image');

        $output = $crud->render();

        return $this->_showOutput($output);
    }

    public function productsImages()
    {
        $crud = $this->_getGroceryCrudEnterprise();

        $crud->setTable('products_images');
        $crud->setSkin('bootstrap-v5');
        $crud->setSubject('Product Images', 'Products Images');

        $crud->setRelation(ProductImage::PRODUCT_ID, 'products', Product::TITLE);
        $crud->displayAs(ProductImage::PRODUCT_ID,'Product name');

        $output = $crud->render();

        return $this->_showOutput($output);
    }

}
