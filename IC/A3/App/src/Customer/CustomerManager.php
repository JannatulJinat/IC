<?php

namespace App\Customer;
use App\Storage\Storage;
use App\Transaction\TransactionCLIApp;

class CustomerManager
{
    public Customer $customer;
    public array $customers;
    public Storage $storage;

    public function __construct(Storage $storage)
    {
        $this->storage = $storage;
        $this->customers = $this->storage->load('Customer.txt');
    }


    public function addCustomer($name, $email, $password)
    {
        foreach ($this->customers as $customer) {
            if ($customer->getEmail() === $email) {
                echo("Customer with the same email id already exists!.\n");
                return;
            }
        }
        $customer = new Customer();
        $customer->setName($name);
        $customer->setEmail($email);
        $customer->setPassword($password);

        $this->customers[] = $customer;
        echo("Customer added successfully!\n");
        $this->saveCustomers();
    }

    public function validateCustomer($email, $password)
    {
        foreach ($this->customers as $customer) {
            if ($customer->getEmail() === $email && $customer->getPassword() === $password) {
                printf("Welcome %s!!!\n", $customer->getName());
                $transactionCLIApp = new TransactionCLIApp($customer);
                $transactionCLIApp->run();
            }
        }
        echo("Try again!\n");

    }

    public function saveCustomers()
    {
        $this->storage->save($this->customers, 'data/Customer.txt');
    }

}