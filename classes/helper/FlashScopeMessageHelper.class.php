<?php

interface FlashScopeMessageHelper
{

    function setSuccess($message);

    function setError($message);

    function getSuccess();

    function getError();
}
