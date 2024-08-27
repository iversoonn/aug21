<?php
class CurrentAccount extends Account{

    public $account_no;
    public $balance;
    public function __construct($account_no, $balance){
        $this->account_no = $account_no;
        $this->balance = $balance;
    }
    public function withdraw(){
        return false;
    }
}
?>