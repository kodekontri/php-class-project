<?php
function view($name, $data = []){
    extract($data);
    require VIEWPATH . "/$name.view.php";
}