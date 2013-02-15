<?php

    include '../CSSParser.php';
    $parser = new CSSParser('
        @charset "UTF-8";
        @import url("example/1.css");
        @import url("example/2.css");
        @page {
            margin-top: 2cm;
            margin-bottom: 2cm;
        }
');

    /**
      Results

        Array
        (
            [0] => UTF-8
        )

     */
    print_r($parser->getAtRule('@charset'));

    /**
      Results

        Array
        (
            [0] => example/1.css
            [1] => example/2.css
        )

     */
    print_r($parser->getAtRule('@import'));

    /**
      Results

        Array
        (
            [margin-top] => Array
                (
                    [0] => 2cm
                )

            [margin-bottom] => Array
                (
                    [0] => 2cm
                )

        )

     */
    print_r($parser->getAtRule('@page'));