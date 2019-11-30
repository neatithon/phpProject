<?php
require 'Report.php';
$opts = getopt("strh", ['setting', 'topUp', 'report', 'help'], $optind);
$report = new Report();

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

    Mobile top up menu.


EOT;
} else if (array_key_exists('report', $opts)) {
    echo <<<EOT

Printing reports.....

EOT;

    $report->exportPDF("12-01-19", "13-01-19");
} else if (array_key_exists('setting', $opts)) {
    echo <<<EOT

    Configuration the program.


EOT;
} else {
    displayError();
}

function displayHelp()
{
    echo <<<EOT
Usage:php app.php [options]
Options:

    -t|--topUp              Mobile top up menu.
    -r|--report             Show all recored transections.
    -s|--setting            Config the commition rate.
    \e[32m-h|--help\e[0m               print this manual.                  


EOT;
}

function displayError()
{
    echo <<<EOT
    
Invalid arguments!!!
Usage the following command for help.
app.php -h


EOT;
}
