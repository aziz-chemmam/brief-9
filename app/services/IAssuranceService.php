<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/brief-9/app/models/assurance.php");

interface IAssuranceService {
    function insert(Assurance $assurance);
    function edit(Assurance $assurance);
    function delete($assuranceId);
    function display();
}
?>