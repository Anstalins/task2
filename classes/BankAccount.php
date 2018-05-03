<?php

class BankAccount implements IfaceBankAccount
{

    private $balance = null;

    public function __construct(Money $openingBalance)
    {
        $this->balance = $openingBalance;
    }

    public function balance()
    {
        return $this->balance;
    }

    public function deposit(Money $amount)
    {
        $my_balance     =   $this->balance();
        $deposit        =   $amount->value();
        $this->balance  =   $my_balance->value() + $deposit;
    }

    public function transfer(Money $amount, BankAccount $account)
    {
        //implement this method
    }

    public function withdraw(Money $amount)
    {
        
        $withdraw               =   $amount->value();
        $your_balance           =   $this->balance();
        $your_balance           =   (is_float($your_balance)) ? $your_balance : $your_balance->value();
        $this->balance          =   $your_balance - $withdraw;
    }
}