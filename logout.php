<?php

require_once 'source/session.php';

//session_destroy — Destroys all data registered to a session.
//Reason that we need to destroy all the infomation before going to the index page is that if we didn't do it, the user can simply go back the dashboard page by clicking the undo arrow on the browser.
session_destroy();

//Redirect back to the index page after destroying the data.
header('location: index.html');
?>