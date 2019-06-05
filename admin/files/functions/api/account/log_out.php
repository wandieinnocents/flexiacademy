<?php
    require_once '../../constants.php';
    logout_user();

    function logout_user() {
        // remove all session variables
        session_unset();
        // destroy the session
        session_destroy();

        echo json_encode(['code' => 1]);
    }
