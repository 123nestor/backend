<?php
function base_url()
{
    return BASE_URL;
}
function encabezado($data="")
{
    $VistaH = "Views/Template/header.php";
    require_once($VistaH);
}
function pie($data="")
{
    $VistaP = "Views/Template/footer.php";
    require_once($VistaP);
}

?>