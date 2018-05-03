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
        $my_balance         =   $this->balance();
        $your_balance       =   $account->balance;
        $transfer_amount    =   $amount->value();

        $this->balance      =   $my_balance - $transfer_amount;
        $account->balance   =   $your_balance + $transfer_amount;
    }

    public function withdraw(Money $amount)
    {
        
        $withdraw               =   $amount->value();
        $your_balance           =   $this->balance();
        $your_balance           =   (is_float($your_balance)) ? $your_balance : $your_balance->value();
        $this->balance          =   $your_balance - $withdraw;
    }
}