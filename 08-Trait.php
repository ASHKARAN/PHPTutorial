<?php




class TraitClass  {

    use FirstTrait;
    use SecondTrait;

    public function TraitFunction() {
        echo "traitFunction \n";
    }


}


trait FirstTrait {
    public function FirstTrait() {
        echo "FristTrait \n";
    }
}

trait SecondTrait {
    public function SecondTrait() {
        echo "SecondTrait \n";
    }
}

$in = new TraitClass();
$in->TraitFunction();
$in->FirstTrait();
$in->SecondTrait();

