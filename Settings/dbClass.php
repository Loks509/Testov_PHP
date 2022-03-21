<?php
class dbMysql
{
var $login = "epiz_31319235";
var $password = "mAjzsNQvV5FPY";
var $NameOfdb = "epiz_31319235_PSU";
var $Host="sql313.epizy.com";

var $link;
var $result;

function connect() {
    $this->link = mysqli_connect($this->Host, $this->login, $this->password,$this->NameOfdb);
    mysqli_set_charset($this->link, "utf8");
}
function close() {
    mysqli_close($this->link);
}


function Send($q) {
    $this->result = mysqli_query($this->link, $q);
    return $this->result;
}
}