<?php

//Destruction de la session courante
session_start();
session_destroy();

session_start();
//Redirection vers la page login
echo $viewContent = getRenderedView("login",["errors" => "" ,"errorsNew" => ""]);
