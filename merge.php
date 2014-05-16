<?php

class Merge_Translations {
    protected $_from = null;
    protected $_to = null;
    function __construct($from, $to) {
        $this->_from = $from;
        $this->_to = $to;
    }


    public function go() {
        $fromFiles = glob(sprintf('%s/*.csv', trim($this->_from, '/')));
        $toFiles = glob(sprintf('%s/*.csv', trim($this->_to, '/')));

        foreach ($fromFiles as $fromFile) {
            $toFile = str_replace($this->_from, $this->_to, $fromFile);
            echo sprintf("Updating %s\n", $toFile);
            $fromHandle = fopen($fromFile, "r");
            $csvContent = array();

            if (in_array($toFile, $toFiles)) {
                $toHandle = fopen($toFile, "r");
                while (($line = fgetcsv($toHandle)) !== false) {
                    if (isset($line[1])) {
                        $csvContent[$line[0]] = $line[1];
                    }
                }
            }


            while (($line = fgetcsv($fromHandle)) !== false) {
                if (isset($line[0]) && isset($line[1]) && !isset($csvContent[$line[0]])) {
                     $csvContent[$line[0]] = $line[1];
                }
            }

            //sort the array
            $toHandle = fopen($toFile, "w+");;
            foreach ($csvContent as $key => $value) {
                $key = str_replace('"','""', $key);
                $value = str_replace('"','""', $value);
                $line = sprintf("\"%s\",\"%s\"\n", $key, $value);
                fputs($toHandle, $line);
            }

//            $translation = array();
//            var_dump($csvContent);exit;
        }
    }
}

$translations = new Merge_Translations('app/locale/en_US', 'app/locale/nl_NL');
$translations->go('Mage_Checkout.csv');
