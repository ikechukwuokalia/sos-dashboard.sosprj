<?php
require_once __DIR__ . "/.constant.php";
// get compulsory packages
require_once PRJ_LIBRARY . "/tymfrontiers-cdn/php-data/src/Data.php";
require_once PRJ_LIBRARY . "/tymfrontiers-cdn/php-session/src/Session.php";

// start session
if (!\class_exists("\\TymFrontiers\\Session")) {
  throw new \Exception("TymFrontiers Session: not found! Kindly require \\TymFrontiers\\Session - https://github.com/tymfrontiers-cdn/php-session before running this script.",1);
}

$session = new \TymFrontiers\Session();

if (!$session instanceof \TymFrontiers\Session) {
  throw new \Exception("Failed to instanciate TymFrontiers\\Session.",1);
}
