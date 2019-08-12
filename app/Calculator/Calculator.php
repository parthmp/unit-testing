<?php

    namespace App\Calculator;

    class Calculator{

        protected $operations = [];

        public function setOperation(OperationInterface $operation){
            $this->operations[] = $operation;
        }

        public function setOperations(array $ops){

            $filtered = array_filter($ops, function($op){
                return $op instanceof OperationInterface;
            });

            $this->operations = array_merge($this->operations, $filtered);

        }


        public function getOperations(){
            return $this->operations;
        }

        public function calculate(){

            if(count($this->operations) > 1){
                return array_map(function($op_tmp){
                    return $op_tmp->calculate();
                }, $this->operations);
            }

            return $this->operations[0]->calculate();
        }

    }