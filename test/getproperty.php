<?php

    include '../CSSParser.php';
    $parser = new CSSParser(file_get_contents('../sh_style.css'));

    /**
      Results

            Array
                (
                    [0] => black
                    [1] => #000000
                )

     */
    print_r($parser->getProperty('pre.sh_sourceCode', 'color'));