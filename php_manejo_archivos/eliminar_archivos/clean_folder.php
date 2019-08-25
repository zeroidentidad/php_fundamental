<?php

$d = dir("./archivos");

while (false !== ($entry = $d->read())) {
   echo $entry."<br/>";
   if( $entry !== '.' && $entry !== '..' )
   {
        unlink('./archivos/' . $entry);
   }
}

$d->close();

header('Location: index.php');