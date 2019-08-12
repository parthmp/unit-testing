<?php

    use PHPUnit\Framework\TestCase;

    class UserTest extends TestCase{

        protected $user;

        public function setUp() : void{
            parent::setUp();
            $this->user = new \App\Models\User;
        }


        /** @test */
        public function that_we_can_get_first_name(){

           
            
            $this->user->setFirstName("Jack");

            $this->assertEquals($this->user->getFirstName(), "Jack");

        }

        public function testThatWeCanGetLastName(){

           
            $this->user->setLastName("Sparrow");

            $this->assertEquals($this->user->getLastName(), "Sparrow");

        }

        public function testFullNameIsReturned(){

            $this->user->setFirstName("Jack");
            $this->user->setLastName("Sparrow");

            $this->assertEquals($this->user->getFullName(), "Jack Sparrow");

        }

        public function testFirstAndLastNameAreTrimmed(){

            $this->user->setFirstName("Jack       ");
            $this->user->setLastName("      Sparrow           ");

            $this->assertEquals($this->user->getFirstname(), "Jack");
            $this->assertEquals($this->user->getLastname(), "Sparrow");

        }

        public function testEmailAddressCanBeSet(){

            
            $email = "parth@ninjaz.in";

            $this->user->setEmail($email);

            $this->assertEquals($this->user->getEmail(), $email);

        }


        public function testEmailVariablesContainCorrectValues(){

           
            $this->user->setFirstName("Jack");
            $this->user->setLastName("Sparrow");
            $this->user->setEmail("parth@ninjaz.in");


            $emailVariables = $this->user->getEmailVariables();

            $this->assertArrayHasKey('full_name', $emailVariables);
            $this->assertArrayHasKey('email', $emailVariables);

            $this->assertEquals($emailVariables['full_name'], "Jack Sparrow");
            $this->assertEquals($emailVariables['email'], "parth@ninjaz.in");

        }


    }