<?php
echo 'PHP Version: ' . phpversion() . PHP_EOL;
echo 'Loaded php.ini: ' . php_ini_loaded_file() . PHP_EOL;
echo 'curl.cainfo: ' . ini_get('curl.cainfo') . PHP_EOL;
echo 'openssl.cafile: ' . ini_get('openssl.cafile') . PHP_EOL;
