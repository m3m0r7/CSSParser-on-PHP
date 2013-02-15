<?php

    include '../CSSParser.php';
    $parser = new CSSParser(file_get_contents('../sh_style.css'));

    /**
      Results

            Array
            (
                [border-width] => Array
                    (
                        [0] => 10px
                    )

                [color] => Array
                    (
                        [0] => black
                        [1] => #000000
                    )

                [font-style] => Array
                    (
                        [0] => normal
                        [1] => normal
                    )

                [font-weight] => Array
                    (
                        [0] => normal
                        [1] => normal
                    )

                [background-color] => Array
                    (
                        [0] => #F5F5F5
                    )

            )
     */
    print_r($parser->getSelector('pre.sh_sourceCode'));