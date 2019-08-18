<?php
namespace PHP;

include "08-Trait.php";

$t = new \TraitClass();
$t->TraitFunction();


class TraitClass  {

    use \FirstTrait;
    use \SecondTrait;

    public function TraitFunction() {
        echo "traitFunction \n";
    }


}

