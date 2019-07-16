<?php
/**
 * Created by PhpStorm.
 * User: starstryder
 * Date: 6/4/19
 * Time: 1:18 PM
 */

/* ----------------------------------------------------------------------
   Load things needed always
   ---------------------------------------------------------------------- */
    global $BASE_DIR, $BASE_URL;

    require("csb-settings.php");
    $loader = TRUE;

/* ----------------------------------------------------------------------
   Define the theme

       1. Check if one is defined in the database  TODO
       2. Check if it is configured correctly       TODO
       3. If setup, use that theme, else use default    TODO
   ---------------------------------------------------------------------- */

    // Default theme (if nothing set in database)
    $THEME_DIR = $BASE_DIR . "csb-themes/default";
    $THEME_URL = $BASE_URL . "csb-themes/default";

/* ----------------------------------------------------------------------
   Define other useful directories
   ---------------------------------------------------------------------- */

    global $ADMIN_DIR, $DB_class;

    $ADMIN_DIR = $BASE_DIR . "/csb-admin";
    $DB_class  = $ADMIN_DIR. "/db_class.php";


/* ----------------------------------------------------------------------
   Setup User Roles - needed because of potential customizations
   ---------------------------------------------------------------------- */

    include($DB_class);
    $db = new DB($db_servername, $db_username, $db_password, $db_name);
    $query = "SELECT * FROM roles";
    $result = $db->runQuery($query);

    foreach ($result as $row ) {
        $CQ_ROLES[$row['name']] = $row['id'];
    }
    $db->closeDB();








