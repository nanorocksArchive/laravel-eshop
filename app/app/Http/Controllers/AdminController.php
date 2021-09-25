<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Grocery\GroceryCrud;
use App\Models\Customer;
use App\Models\Order;

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

        $output = $crud->render();

        return $this->_showOutput($output);
    }

}
