<?php


interface IFirstInterface {

    public function Method1();
    public function Method2();

}


class interfaceClass implements IFirstInterface {


    public function Method1()
    {
        echo "Method1 \n ";
    }

    public function Method2()
    {
        echo "Method2 \n ";
    }
}


class SecondClass {

    private $interface ;

    public function __construct(IFirstInterface $interface)
    {
        $this->interface = $interface;
    }

    public function Download() {
        $this->interface->Method1();
        sleep(3);
        $this->interface->Method2();
    }


}


$instance = new interfaceClass();



$secondInstance = new SecondClass($instance);
$secondInstance->Download();



