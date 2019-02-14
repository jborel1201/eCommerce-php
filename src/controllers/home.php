<?php
session_start();
echo $viewContent = getRenderedView("home",["imgHome" => ("img/boissonsHome.jpg")]);
