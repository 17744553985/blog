<?php
class PublicController extends Controller{
    public function verify(){
        Image::verify();
    }
}
?>