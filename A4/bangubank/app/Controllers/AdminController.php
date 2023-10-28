<?php
namespace App\Controllers;
use App\Controllers\Controller;
use App\Models\Model;

class AdminController extends Controller
{
    public function addCustomer(){
        return view("admin/add_customer", []);
    }
    public function customerTransactions(){
        return view("admin/customer_transactions", []);

    }
    public function customers(){
        $listOfCustomers = new Model();
        return view("admin/customers", [
            "customers"=> $listOfCustomers->getAll('Customer')
        ]);

    }
    public function transactions(){
        $listOfTransaction = new Model();

        return view("admin/transactions", [
            "transactions"=> $listOfTransaction->getAll('Transaction')
        ]);

    }
    public function saveCustomer(){
        $customer = new Model();
        $name = htmlspecialchars($_POST['first-name']);
        $email = htmlspecialchars($_POST['email']);
        $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
        $data = [
         "customerName"=> $name,
        "customerEmail"=>$email,
        "customerPassword"=> $password
    ];
        $customer->create($data,'Customer');
        return redirect("/admin/customers");
    }

}
