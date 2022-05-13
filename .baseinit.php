<?php
\date_default_timezone_set("Africa/Lagos");
function is_localhost (string $ip = "") {
  global $_SERVER;
  $ip = !empty($ip) && \filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)
    ? $ip
    : $_SERVER['SERVER_ADDR'];
  return \strpos($_SERVER['SERVER_ADDR'], '127.0.') !== false
          || \strpos($_SERVER['SERVER_ADDR'], '192.168.') !== false;
}
$is_localhost = \is_localhost();
$display_error_val = \is_localhost() ? 1 : 0;
\error_reporting(E_ALL);
\ini_set('display_errors', $display_error_val);
\ini_set("log_errors", 1);
\ini_set("error_log", __DIR__ . "/.system/errors/errors.log" );
// First: thing first >>>>
// load up definitions, if not already loaded
require_once __DIR__ . "/.constant.php";
require_once __DIR__ . "/.http-constant.php";
// session: TymFrontiers\Session;
require_once __DIR__ . "/.env.php";
// composer autoload
require_once __DIR__ . "/vendor/autoload.php";

require_once __DIR__ . "/.var.php";
require_once __DIR__ . "/./src/.addon.fn.php";
