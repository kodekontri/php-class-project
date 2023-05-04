<?php

$file = fopen('test.txt', 'r+');
echo fread($file, filesize('test.txt'));
fclose($file);