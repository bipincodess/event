<?php 

use Illuminate\Support\Facades\Session;

function set_flash_message($data){
    Session::put('flashMessage',$data);
    return true;
}