<?php

session_start();// INITALISE LES SESSIONS
session_unset(); // DESACTIVER LA SESSION
session_destroy(); // DETRUIRE LA SESSION

header('location:index.php?message=deconnexion');





