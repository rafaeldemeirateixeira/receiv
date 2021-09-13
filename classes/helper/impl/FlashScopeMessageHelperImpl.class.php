<?php

class FlashScopeMessageHelperImpl implements FlashScopeMessageHelper
{

    public function setSuccess($message)
    {
        $_SESSION["success"] = $message;
    }

    public function setError($message)
    {
        $_SESSION["error"] = $message;
    }

    public function getSuccess()
    {
        if (isset($_SESSION["success"])) {
            return '<p class="alert alert-info">' . $_SESSION["success"] . '</p>';
        }
    }

    public function getError()
    {
        if (isset($_SESSION["error"])) {
            return '<p class="alert alert-danger">' . $_SESSION["error"] . '</p>';
        }
    }
}
