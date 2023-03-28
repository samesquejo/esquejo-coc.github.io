<?php
    require './CocApi.php';

    $newCocApi = new CocApi();

    $searchCategory = $_GET['get'];

    if ($searchCategory == 'clan') {
        $newCocApi->getClan();
    }

    if ($searchCategory == 'clanDetails') {
        $newCocApi->getClanDetails();
    }