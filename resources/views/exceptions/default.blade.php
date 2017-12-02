<?php
//Get the route
if ($url) {
    echo "URL: {$method}@{$url}".'<br><br>';
}

//Get the User
if ($user) {
    echo "User: #{$user->id}".'<br><br>';
}

//Exception
echo get_class($exception).":{$exception->getFile()}:{$exception->getLine()} {$exception->getMessage()}".'<br><br>';

//Input
if (!empty($input)) {
    echo "Data: ".json_encode($input).'<br><br>';
}

//Trace
echo PHP_EOL."Trace: {$exception->getTraceAsString()}";
