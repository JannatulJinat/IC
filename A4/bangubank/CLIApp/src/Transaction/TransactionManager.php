<?php

namespace CLI\Transaction;

use CLI\Customer\Customer;
use CLI\Customer\Expense;
use CLI\Customer\Income;

class TransactionManager
{

    private array $transactions;

    public function deposit($amount, Customer $customer)
    {
        $income = new Income();
        $income->setAmount($amount);
        $customer->setIncome($income);

        $this->trasanctions[] = $income;
        echo("Income added successfully\n");
        //$this->saveTransactions();
    }

    public function withdraw($amount, Customer $customer)
    {
        $expense = new Expense();
        $expense->setAmount($amount);
        $customer->setExpense($expense);

        $this->transactions[] = $expense;
        echo("Expense added successfully\n");
        //$this->saveTransactions();
    }

    public function saveTransactions()
    {
        $this->storage->save('Transactions.json', $this->transactions);
    }

    public function viewTransaction()
    {
        foreach ($this->transactions as $transaction) {
        }
        {
            echo($transaction);
            echo("\n");
        }
    }

    public function transfer(Customer $sentTo, $amount, Customer $customer)
    {
        $this->withdraw($amount, $customer);
        $this->deposit($amount, $sentTo);
    }

    public function currentBalance(Customer $customer)
    {
        $customerIncome = $customer->getIncome();
        var_dump($customerIncome);
        $total = 0;
        foreach ($customerIncome as $key => $value) {
            $total = $total + $value;
        }
        printf("total : %f\n", $total);
    }
}
