<?php

return[

    "/customer/register" => ["App\Controllers\CustomerController", 'register'],
    "/" => ["App\Controllers\CustomerController", 'login'],
    "/customer/dashboard" => ['App\Controllers\CustomerController', 'dashboard'],
    "/customer/deposit" => ['App\Controllers\CustomerController', 'deposit'],
    "/customer/transfer" => ['App\Controllers\CustomerController', 'transfer'],
    "/customer/withdraw" => ['App\Controllers\CustomerController', 'withdraw'],
    "/customer/saveCustomer" => ['App\Controllers\CustomerController', 'saveCustomer'],
    "/customer/verifyCustomer" => ['App\Controllers\CustomerController', 'verifyCustomer'],
    "/customer/saveDeposit" => ['App\Controllers\CustomerController', 'saveDeposit'],
    "/customer/saveWithdraw" => ['App\Controllers\CustomerController', 'saveWithdraw'],
    "/customer/saveTransfer" => ['App\Controllers\CustomerController', 'saveTransfer'],
    "/customer/logout" => ['App\Controllers\CustomerController', 'logout'],


    "/admin/addCustomer" => ['App\Controllers\AdminController', 'addCustomer'],
    "/admin/customerTransactions" => ['App\Controllers\AdminController', 'customerTransactions'],
    "/admin/customers" => ['App\Controllers\AdminController', 'customers'],
    "/admin/transactions" => ['App\Controllers\AdminController', 'transactions'],
    "/admin/saveCustomer" => ['App\Controllers\AdminController', 'saveCustomer']
];