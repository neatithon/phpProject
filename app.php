<?php
require_once "TopUp.php";
$opts = getopt("sth", ['setting', 'topUp', 'help'], $optind);
$topUp = new TopUp();

if (
    !array_key_exists('help', $opts)
    && array_key_exists('h', $opts)
)
    $opts['help'] = $opts['h'];

if (
    !array_key_exists('topUp', $opts)
    && array_key_exists('t', $opts)
)
    $opts['topUp'] = $opts['t'];

if (
    !array_key_exists('report', $opts)
    && array_key_exists('r', $opts)
)
    $opts['report'] = $opts['r'];

if (
    !array_key_exists('setting', $opts)
    && array_key_exists('s', $opts)
)
    $opts['setting'] = $opts['s'];

if (array_key_exists('help', $opts)) {
    displayHelp();
} else if (array_key_exists('topUp', $opts)) {
    echo <<<EOT
\r\n\e[92m----------Mobile top up menu.----------\e[0m \r\n
EOT;
$topUp->topUp();
} else if (array_key_exists('setting', $opts)) {
    echo <<<EOT

    Configuration the program. \r\n
EOT;
} else {
    displayError();
}

function displayHelp()
{
    echo <<<EOT

\r\nUsage:php app.php \e[92m[options]\e[0m
Options:

    Options                   Description

    \e[92m-t\e[0m | \e[92m--topUp\e[0m              Mobile top up menu.
    \e[92m-s\e[0m | \e[92m--setting\e[0m            Config the commition rate.
    \e[92m-h\e[0m | \e[92m--help\e[0m               print this manual.                  
\r\n
EOT;
}

function displayError()
{
    echo <<<EOT
    
    \e[91mInvalid arguments!!!\e[0m \r\n
    Used the following command for usage information.
    \e[93mapp.php -h\e[0m


EOT;
}
