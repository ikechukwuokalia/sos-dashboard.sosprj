<?php
// generic definition
\define('REQUEST_SCHEME',(
    ( !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] =='on'  )
      OR
    (  $_SERVER['REQUEST_SCHEME'] === 'https'	|| (int)$_SERVER['SERVER_PORT'] === 443 )
  ) ? "https://" : "http://");
\define('WHOST', REQUEST_SCHEME . $_SERVER["HTTP_HOST"]);
\define('THIS_PAGE', WHOST . $_SERVER['REQUEST_URI']);
