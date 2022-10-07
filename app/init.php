<?php
ignore_user_abort(true);
include "../app/core/config.php";
include "../app/core/functions.php";
include "../app/core/controller.php";
include "../app/core/database.php";
include "../app/core/app.php";



if (isset($_SESSION['user_url'])) {
    if (time() - $_SESSION['last_time'] > 172800) {
        session_destroy();
        // header("Location: ".ROOT."login?returnUrl=".urlencode($repaired));
        header("Location: ".ROOT."login".RETURL);
        die();
    }
}