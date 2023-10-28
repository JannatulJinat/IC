<?php

namespace CLI\Customer;

class Customer
{
    private string $name;
    private string $email;
    private string $password;

    private Income $income;
    private Expense $expense;

    /**
     * @param Expense $expense
     */
    public function setExpense(Expense $expense): void
    {
        $this->expense = $expense;
    }

    /**
     * @return Expense
     */
    public function getExpense(): Expense
    {
        return $this->expense;
    }

    /**
     * @param Income $income
     */
    public function setIncome(Income $income): void
    {
        $this->income = $income;
    }

    /**
     * @return Income
     */
    public function getIncome(): Income
    {
        return $this->income;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }
}
