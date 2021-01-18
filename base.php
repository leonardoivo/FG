<?php
class baseclass {
    private $hideme;
    public function getit() { return $this->hideme; }
    public function setit($value) { $this->hideme = $value; }
}

class derived extends baseclass {
    public $hideme;
}

function doobee(baseclass $obj) {
    echo $obj->getit() . "\n";
}

$a = new derived();
$a->hideme = "Attribuição direta variavel local derivada<br/>";
$a->setit("acessador atribuir da classe mãe<br/>");

echo $a->getit() . "\n";
echo $a->hideme . "\n";
doobee($a);

print_r($a);
?>