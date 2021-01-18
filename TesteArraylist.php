<?php
namespace FG\Collections;

use Collections\Map;
use Collections\Queue;
use Collections\Set;
use Collections\Stack;
use Collections\Vector;


$collection = new Collection();
$collection->add('John');
$collection->add('Maria');
$collection->add('Anderson');

foreach($collection as $item){
    echo $item;
}


?>