<?php
require_once __DIR__ . "/.constant.php";
// Project-wide generic variables
// MySQL Database instance
if (!empty($session) && $session instanceof \TymFrontiers\Session) {
  if ($session->isLoggedIn() &&  (bool)PRJ_ENABLE_ACCESS_GROUP) {
    $use_rank;
    if (\is_int(PRJ_ENABLE_ACCESS_GROUP)) {
      if ((int)$session->access_rank() <= (int)PRJ_ENABLE_ACCESS_GROUP) {
        $use_rank = (int)$session->access_rank();
      } else {
        $use_rank = (int)PRJ_ENABLE_ACCESS_GROUP;
      }
    } else if (\is_bool(PRJ_ENABLE_ACCESS_GROUP)) {
      $use_rank = (int)$session->access_rank();
    } else {
      $use_rank = 0;
    }
    $use_group = $reverse_access_ranks[$use_rank];
    $db_user = "MYSQL_{$use_group}_USERNAME";
    $db_pass = "MYSQL_{$use_group}_PASS";
    $database = new \TymFrontiers\MySQLDatabase (MYSQL_SERVER, \constant($db_user), \constant($db_pass));
  } else {
    $database = new \TymFrontiers\MySQLDatabase (MYSQL_SERVER,MYSQL_GUEST_USERNAME,MYSQL_GUEST_PASS,MYSQL_BASE_DB);
  }
} else {
  $database = new \TymFrontiers\MySQLDatabase (MYSQL_SERVER,MYSQL_GUEST_USERNAME,MYSQL_GUEST_PASS,MYSQL_BASE_DB);
}
$db =& $database;
