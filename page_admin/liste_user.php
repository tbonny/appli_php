<?php

class user

 {

 private $_iduser;
 private $_nomuser;

 public function __construct($iduser,$nomuser){
 $this->_iduser = $iduser;
 $this->_nomuser = $nomuser;
 }

 public function getIduser(){
 return $this->_iduser;
 }

 public function getNomuser(){
 return $this->_nomuser;
 }


 
 }
