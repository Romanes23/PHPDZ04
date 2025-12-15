<!-- <H3> HELLO from helpers</H3> -->
<?php

function br(): void
{
    echo "<br>";
};

function dump($data): void
{
    echo "<pre>"; //для включения в документ предварительно отформатированного текста
    var_dump(value: $data);
    echo "/<pre>";
}
function dd($data): never
{
    
    var_dump(value: $data);
    die; //exit
}
?>