<?php

session_start ();
session_destroy ();
header ('Location: sessoes.php');
exit ();

?>