<?php
spl_autoload_register(function ($class_name) {
    include $class_name .'.class'. '.php';
});



$obj  = new TextoJornalistico();
$obj2 = new Entrevista(); 

// spl_autoload_register(function ($name) {
//     var_dump($name);
// });

// class Foo implements ITest {
// }
?>