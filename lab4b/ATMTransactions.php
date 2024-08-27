<?php 
class ATMTransactions{
    public $transaction_id;
    public $date;
    public $type;
    public $amount;
    public $post_balance;
    public function __construct($transaction_id, $date, $type, $amount, $post_balance){
            $this->transaction_id = $transaction_id;
            $this->date = $date;
            $this->type = $type;
            $this->amount = $amount;
            $this->post_balance = $post_balance;
    }
    public function modifies(){
        return false;
    }
}

?>