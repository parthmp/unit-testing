<?php

    use PHPUnit\Framework\TestCase;

    class CollectionTest extends TestCase{
        

        /** @test */
        public function empty_instantiated_collection_returns_no_items(){

            $collection = new \App\Support\Collection;

            $this->assertEmpty($collection->get());

        }

        /** @test */
        public function count_is_correct_for_items_passed_in(){

            $collection = new \App\Support\Collection([
                'one', 'two', 'three'
            ]);

            $this->assertEquals(3, $collection->count());

        }


        /** @test */
        public function items_returned_match_items_passed_in(){

            $collection = new \App\Support\Collection([
                'one', 'two', 'three', 'four'
            ]);

            $this->assertCount(4, $collection->get());

        }


        /** @test */
        public function collection_is_instance_of_iterator_aggregrate(){

            $collection = new \App\Support\Collection();

            $this->assertInstanceOf(IteratorAggregate::class, $collection);
            
        }


        /** @test */
        public function collection_can_be_iterated(){
            
            $collection = new \App\Support\Collection([
                'one', 'two', 'three'
            ]);

            $items = [];
            
            foreach($collection as $item){
                $items[] = $item;
            }

            $this->assertCount(3, $items);
            $this->assertInstanceOf(ArrayIterator::class, $collection->getIterator());
           
        }

        /** @test */

        public function collection_can_be_merged_with_another_collection(){

            $collection1 = new \App\Support\Collection([ 'one', 'two' ]);
            $collection2 = new \App\Support\Collection([ 'three', 'four', 'five' ]);

            $collection1->merge($collection2);

            $this->assertCount(5, $collection1->get());
            $this->assertEquals(5, $collection1->count());

        }

        /** @test */

        public function can_add_to_existing_collection(){

            $collection = new \App\Support\Collection([ 'one', 'two' ]);
            $collection->add(['three']);
            $this->assertCount(3, $collection->get());
            $this->assertEquals(3, $collection->count());

        }


        /** @test */

        public function returns_json_encoded_items(){

            $collection = new \App\Support\Collection([
                ['username' => 'jack'],
                ['username' => 'peter']
            ]);

            
            $this->assertIsString($collection->toJson());

            $this->assertEquals('[{"username":"jack"},{"username":"peter"}]', $collection->toJson());

        }


        /** @test */

        public function json_encoding_a_collection_object_returns_json(){

            $collection = new \App\Support\Collection([
                ['username' => 'jack'],
                ['username' => 'peter']
            ]);

            $encoded = json_encode($collection);

            $this->assertIsString($encoded);

            $this->assertEquals('[{"username":"jack"},{"username":"peter"}]', $encoded);

        }

    }