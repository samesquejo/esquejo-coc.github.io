<?php
class CocApi {
    public $curl;
    
    public function __construct () {
        $this->curl = 123;
    }

    public function getClan() {
        return $this->curl;
    }
}