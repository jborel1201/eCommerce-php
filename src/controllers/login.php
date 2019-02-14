<?php

session_start();
echo $viewContent = getRenderedView("login",["errors" => "" ,"errorsNew" => ""]);