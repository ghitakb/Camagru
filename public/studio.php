<?php

require_once __DIR__ . "/../app/Helpers/auth.php";

requireLogin();

$username = currentUsername();

require __DIR__ . "/../app/Views/studio.php";