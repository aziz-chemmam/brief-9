<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/brief-9/app/models/prime.php");

interface IPrimeService {
    function insert(Premium $premium);
    function edit(Premium $premium);
    function delete($premiumId);
    function display();
}
?>