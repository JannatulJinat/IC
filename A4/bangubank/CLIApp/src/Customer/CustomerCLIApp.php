<?php

declare(strict_types = 1);

namespace CLI\Customer;
use CLI\Storage\FileStorage;

class CustomerCLIApp{
    public const LOGIN = 1;
    public const REGISTER = 2;
    public CustomerManager $customerManager;
    public function __construct(){
        $this->customerManager = new CustomerManager(new FileStorage());
    }
    public array $options = [
        self::LOGIN => 'Login',
        self::REGISTER => 'Register'
    ];
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
                case self::LOGIN:
                {
                    $email =  readline("Email: ");
                    $password =  readline("Password : ");
                    $this->customerManager->validateCustomer($email, $password);
                    break;
                }
                case self::REGISTER:
                {
                    $name = trim(readline("Name: "));
                    $email =  trim(readline("Email: "));
                    $password =  trim(readline("Password : "));
                    $this->customerManager->addCustomer($name, $email, $password);
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
