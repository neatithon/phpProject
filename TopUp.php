<?php
require 'Report.php';

class TopUp {
    private $transactions;
    private $selectedProvider;
    private $report;
    private $provider;
    private $phoneNumber;
    
    function __construct()
    {
        $this->report = new Report();
        $this->transactions = [];
        $this->selectedProvider = [];
    }

    function topUp() {
        $this->selectProvider();
        $this->topUpNumber();
    }

    function selectProvider() {
        echo <<<EOT
        \r\n
        Which provider you want to top up?
            [1] => DTAC
            [2] => TRUEMOVE
            [3] => AIS
            [4] => Exit program. \r\n
        EOT;
        $this->provider = readline("Enter your provider please.... \r\n");
        if (strlen($this->provider)) {
            switch ($this->provider) {
                case "1": 
                    echo "\r\nSelected provider is DTAC\r\n";
                    array_push($this->selectedProvider, "DTAC \r\n");
                break;
                case "2":
                    echo "\r\nSelected provider is TRUEMOVE\r\n";
                    array_push($this->selectedProvider, "TRUEMOVE \r\n");
                break;
                case "3":
                    echo "\r\nSelected provider is AIS\r\n";
                    array_push($this->selectedProvider, "AIS \r\n");
                break;
                case "4":
                    echo "Exit the program..... \r\n";
                break;
                default:
                    echo "\r\n\e[91mYou have inputted worng option.\r\nPlease enter the valid option.\e[0m\r\n";
                    $this->selectProvider();
            }
        }
    }

    function topUpNumber() {
        $this->phoneNumber = readline("\r\nEnter phone number to top up.\r\n");
    }
}
?>