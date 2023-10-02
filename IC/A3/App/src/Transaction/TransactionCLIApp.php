<?php
declare(strict_types=1);

namespace App\Transaction;

use App\Customer\Customer;

class TransactionCLIApp
{
    public Customer $customer;
    public const VIEW_TRANSACTIONS = 1;
    public const DEPOSIT = 2;
    public const WITHDRAW = 3;
    public const TRANSFER = 4;
    public const CURRENT_BALANCE = 5;
    public array $options = [
        self::VIEW_TRANSACTIONS => 'View all the transactions.',
        self::DEPOSIT => 'Deposit money.',
        self::WITHDRAW => 'Withdraw money.',
        self::TRANSFER => 'Transfer money to another account.',
        self::CURRENT_BALANCE => 'View current balance.',
    ];

    public function __construct($customer)
    {
        $this->customer = $customer;
    }

    public function run()
    {
        while (true) {
            echo("Select from the following menu:\n");
            foreach ($this->options as $key => $value) {
                printf("%d. %s\n", $key, $value);
            }

            $choice = intval(readline("Enter your option: "));

            switch ($choice) {
                case self::VIEW_TRANSACTIONS:
                {

                    break;
                }
                case self::DEPOSIT:
                {
                    $amount = (float)readline("Amount you want to send: ");
                    $transactionManager = new TransactionManager();
                    $transactionManager->deposit($amount, $this->customer);
                    break;
                }
                case self::WITHDRAW:
                {
                    $amount = (float)readline("Amount you want to send: ");
                    $transactionManager = new TransactionManager();
                    $transactionManager->withdraw($amount, $this->customer);
                    break;
                }
                case self::TRANSFER:
                {
                    $sentTo = readline("Email Address: ");
                    $amount = (float)readline("Amount you want to send: ");
                    $transactionManager = new TransactionManager();
                    $transactionManager->transfer($sentTo, $amount, $this->customer);
                    break;
                }
                case self::CURRENT_BALANCE:
                {
                    $transactionManager = new TransactionManager();
                    $transactionManager->currentBalance($this->customer);
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
