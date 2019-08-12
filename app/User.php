<?php

    namespace App\Models;

    class User{

        private $first_name;
        private $last_name;
        private $email;

        public function setFirstName($tmp_fname){
            $this->first_name = trim($tmp_fname);
        }

        public function getFirstName(){
            return $this->first_name;
        }

        public function setLastName($tmp_lname){
            $this->last_name = trim($tmp_lname);
        }

        public function getLastName(){
            return $this->last_name;
        }

        public function getFullName(){
            return $this->getFirstName().' '.$this->getLastName();
        }

        public function setEmail($tmp_email){
            $this->email = $tmp_email;
        }

        public function getEmail(){
            return $this->email;
        }

        public function getEmailVariables(){

            return [
                'full_name' =>  $this->getFullName(),
                'email'     =>  $this->getEmail()
            ];

        }

    }