<?php

    namespace App\Support;

    use JsonSerializable;

    class Collection implements \IteratorAggregate, JsonSerializable{

        protected $items = [];

        public function __construct(array $tmp = []){
            $this->items = $tmp;
        }

        public function get(){
            return $this->items;
        }

        public function count(){
            return count($this->items);
        }

        public function getIterator(){
            return new \ArrayIterator($this->items);
        }

        public function merge(Collection $collection){
            
            return $this->add($collection->get());

        }

        public function add(array $items){
            $this->items = array_merge($this->items, $items);
        }

        public function toJson(){
            return json_encode($this->items);
        }

        public function jsonSerialize(){
            return $this->items;
        }

    }