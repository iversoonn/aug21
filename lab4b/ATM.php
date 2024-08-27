<?php 
class ATM {
    public $location;
    public $managedby;
    public function __construct($location, $managedby) {
        $this->location = $location;
        $this->managedby = $managedby;
    }
    public function identifies() {
        return false;
    }
    public function transactions(){
        return false;
    }
}
?>