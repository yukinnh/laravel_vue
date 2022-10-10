// sample.php

<?php
require_once "vendor/autoload.php";

$hello = new App\Test\Hello();

echo $hello->hello();