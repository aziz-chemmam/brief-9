<?php
require_once($_SERVER['DOCUMENT_ROOT']."/brief-9/index.php");

interface clientInterface{

    public function addClient(Client $client);
    public function DeleteClient($id);
    public function UpdateClient(Client $client,$id);
    public function ShowClient();


}
?>