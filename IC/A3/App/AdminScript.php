#!/usr/bin/env php
<?php
declare(strict_types=1);
require 'vendor/autoload.php';
use App\Admin\Admin;
use App\Storage\FileStorage;
use App\Storage\Storage;

class AdminCLIApp{
    private Admin $admin;
    private const ALL_TRANSACTIONS_BY_ALL_CUSTOMERS = 1;
    private const TRANSACTIONS_BY_SPECIFIC_CUSTOMER = 2;
    private const LIST_OF_CUSTOMERS = 3;

    private array $customers;
    private Storage $storage;
    public function __construct(Storage $storage)
    {
        $this->admin = new Admin();
        $this->storage = $storage;
        $this->customers = $this->storage->load('data/Customer.txt');
    }
    private array $options = [
        self::ALL_TRANSACTIONS_BY_ALL_CUSTOMERS => 'See all the transactions by all the users',
        self::TRANSACTIONS_BY_SPECIFIC_CUSTOMER => 'See transactions by a specific user (searching by their email)',
        self::LIST_OF_CUSTOMERS => 'See the list of all the customers'
    ];
    public function createAdmin(){
        $email = readline("Email: ");
        $password = readline("Password: ");
        $this->admin->setEmail($email);
        $this->admin->setPassword($password);
        echo("Admin created...\n");
        $this->run();
    }
    public function run(){
        while(true)
        {
            echo("Select from the following menu:\n");
            foreach ($this->options as $key => $value){
                printf("%d. %s\n", $key, $value);
            }

            $choice = intval(readline("Enter your option: "));

            switch($choice)
            {
                case self::ALL_TRANSACTIONS_BY_ALL_CUSTOMERS:
                {
                    foreach ($this->customers as $customer) {
                        var_dump($customer);
                    }
                    break;
                }
                case self::TRANSACTIONS_BY_SPECIFIC_CUSTOMER:
                {
                    $email = readline("Email: ");
                    foreach ($this->customers as $customer) {
                        if ($customer->getEmail() === $email) {
                            $customer->getIncome();
                            $customer->getExpense();
                            break;
                        }
                    }
                    break;
                }
                case self::LIST_OF_CUSTOMERS:
                {
                    echo("List of customers: \n");
                    foreach ($this->customers as $customer) {
                            echo($customer->getName());
                            echo("\n");
                    }
                    break;
                }
                default:
                {
                    echo("Invalid option!\n");
                }
            }
        }
    }
}
echo("------------Admin Panel------------\n");
$adminCliApp = new AdminCLIApp(new FileStorage());
$adminCliApp->createAdmin();
