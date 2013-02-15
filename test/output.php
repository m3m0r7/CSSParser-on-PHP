<?php

    include '../CSSParser.php';

    /*
      Results

        .test{color:#FFFFFF}pre.sh_sourceCode{background-color:#F5F5F5;border-wi
        dth:10px;color:#000000;font-style:normal;font-weight:normal}pre.sh_sourc
        eCode .sh_argument{color:#006400}pre.sh_sourceCode .sh_attribute{color:#
        006400}pre.sh_sourceCode .sh_bibtex{color:#0000FF}pre.sh_sourceCode .sh_
        bold{color:#006400;font-weight:bold}pre.sh_sourceCode .sh_cbracket{color
        :#FF0000;color:#FF0080;font-style:normal;font-weight:bold}pre.sh_sourceC
        ode .sh_classname{color:#008080}pre.sh_sourceCode .sh_comment{color:#A52
        A2A;color:#FF8000;font-style:italic;font-style:normal;font-weight:normal
        }pre.sh_sourceCode .sh_date{color:#0000FF;color:#BB7977;font-style:norma
        l;font-weight:bold}pre.sh_sourceCode .sh_difflines{color:#0000FF;color:#
        BB7977;font-style:normal;font-weight:bold}pre.sh_sourceCode .sh_file{col
        or:#BB7977;font-style:normal;font-weight:bold}pre.sh_sourceCode .sh_fixe
        d{color:#008000;font-family:monospace}pre.sh_sourceCode .sh_function{col
        or:#000000;color:#004466;font-style:normal;font-weight:boldfont-weight:n
        ormal}pre.sh_sourceCode .sh_ip{color:#A68500;font-style:normal;font-weig
        ht:normal}pre.sh_sourceCode .sh_ip,pre.sh_sourceCode .sh_name{color:#006
        400}pre.sh_sourceCode .sh_italics{color:#006400;font-style:italic}pre.sh
        _sourceCode .sh_keyword{color:#0000FF;color:#BB7977;font-style:normal;fo
        nt-weight:bold}pre.sh_sourceCode .sh_linenum{color:#000000;font-family:m
        onospace}pre.sh_sourceCode .sh_math{color:#FFA500}pre.sh_sourceCode .sh_
        name{color:#A68500;font-style:normal;font-weight:normal}pre.sh_sourceCod
        e .sh_newfile{color:#006400;color:#A68500;font-style:normal;font-weight:
        normal}pre.sh_sourceCode .sh_number{color:#800080;font-style:normal;font
        -weight:bold}pre.sh_sourceCode .sh_oldfile{color:#FFA500;color:#FF00FF;f
        ont-style:normal;font-weight:bold}pre.sh_sourceCode .sh_optionalargument
        {color:#800080}pre.sh_sourceCode .sh_paren{color:#FF0000}pre.sh_sourceCo
        de .sh_predef_func{color:#00008B;font-weight:bold}pre.sh_sourceCode .sh_
        predef_var{color:#00008B}pre.sh_sourceCode .sh_preproc{color:#00008B;col
        or:#0080C0;font-style:normal;font-weight:bold}pre.sh_sourceCode .sh_prop
        erty{color:#0000FF;color:#BB7977;font-style:normal;font-weight:bold}pre.
        sh_sourceCode .sh_regexp{color:#FFA500;color:#A68500;font-family:monospa
        ce;font-style:normal;font-weight:normal}pre.sh_sourceCode .sh_section{co
        lor:#000000;font-weight:bold}pre.sh_sourceCode .sh_selector{color:#80008
        0;color:#0080C0;font-style:normal;font-weight:normal}pre.sh_sourceCode .
        sh_specialchar{color:#FFC0CB;color:#FF00FF;font-family:monospace;font-st
        yle:normal;font-weight:bold}pre.sh_sourceCode .sh_string{color:#FF0000;c
        olor:#A68500;font-family:monospace;font-style:normal;font-weight:normal}
        pre.sh_sourceCode .sh_symbol{color:#8B0000;color:#FF0080;font-style:norm
        al;font-weight:bold}pre.sh_sourceCode .sh_time{color:#BB7977;font-style:
        normal;font-weight:bold}pre.sh_sourceCode .sh_time,pre.sh_sourceCode .sh
        _file{color:#00008B;font-weight:bold}pre.sh_sourceCode .sh_todo{backgrou
        nd-color:#00FFFF;font-weight:bold}pre.sh_sourceCode .sh_type{color:#0064
        00;color:#8080C0;font-style:normal;font-weight:bold}pre.sh_sourceCode .s
        h_underline{color:#006400;text-decoration:underline}pre.sh_sourceCode .s
        h_url{color:#0000FF;color:#A68500;font-family:monospace;font-style:norma
        l;font-weight:normal;text-decoration:underline}pre.sh_sourceCode .sh_use
        rtype{color:#008080}pre.sh_sourceCode .sh_value{color:#006400;color:#A68
        500;font-style:italic;font-style:normal;font-weight:normal}pre.sh_source
        Code .sh_variable{color:#006400;color:#0080C0;font-style:normal;font-wei
        ght:normal}
     */

    echo CSSParser::minify(file_get_contents('../sh_style.css'), null, CSSParser::OUTPUT_FORMAT_MINIFY | CSSParser::OPTION_OVERRIDE_PROPERTY | CSSParser::COLOR_RGB_TO_HEX | CSSParser::COLOR_NAME_TO_HEX | CSSParser::COLOR_HEX_TO_MINIFY | CSSParser::OUTPUT_WITHOUT_LAST_DELIM);

    /*
      Results


        .test {
            color : #FFFFFF
        }

        pre.sh_sourceCode {
            background-color : #F5F5F5 ;
            border-width : 10px ;
            color : #000000 ;
            font-style : normal ;
            font-weight : normal
        }

        pre.sh_sourceCode .sh_argument {
            color : #006400
        }

        pre.sh_sourceCode .sh_attribute {
            color : #006400
        }

        pre.sh_sourceCode .sh_bibtex {
            color : #0000FF
        }

        pre.sh_sourceCode .sh_bold {
            color : #006400 ;
            font-weight : bold
        }

        pre.sh_sourceCode .sh_cbracket {
            color : #FF0000 ;
            color : #FF0080 ;
            font-style : normal ;
            font-weight : bold
        }

        pre.sh_sourceCode .sh_classname {
            color : #008080
        }

        pre.sh_sourceCode .sh_comment {
            color : #A52A2A ;
            color : #FF8000 ;
            font-style : italic ;
            font-style : normal ;
            font-weight : normal
        }

        pre.sh_sourceCode .sh_date {
            color : #0000FF ;
            color : #BB7977 ;
            font-style : normal ;
            font-weight : bold
        }

        pre.sh_sourceCode .sh_difflines {
            color : #0000FF ;
            color : #BB7977 ;
            font-style : normal ;
            font-weight : bold
        }

        pre.sh_sourceCode .sh_file {
            color : #BB7977 ;
            font-style : normal ;
            font-weight : bold
        }

        pre.sh_sourceCode .sh_fixed {
            color : #008000 ;
            font-family : monospace
        }

        pre.sh_sourceCode .sh_function {
            color : #000000 ;
            color : #004466 ;
            font-style : normal ;
            font-weight : bold
            font-weight : normal
        }

        pre.sh_sourceCode .sh_ip {
            color : #A68500 ;
            font-style : normal ;
            font-weight : normal
        }

        pre.sh_sourceCode .sh_ip,
        pre.sh_sourceCode .sh_name {
            color : #006400
        }

        pre.sh_sourceCode .sh_italics {
            color : #006400 ;
            font-style : italic
        }

        pre.sh_sourceCode .sh_keyword {
            color : #0000FF ;
            color : #BB7977 ;
            font-style : normal ;
            font-weight : bold
        }

        pre.sh_sourceCode .sh_linenum {
            color : #000000 ;
            font-family : monospace
        }

        pre.sh_sourceCode .sh_math {
            color : #FFA500
        }

        pre.sh_sourceCode .sh_name {
            color : #A68500 ;
            font-style : normal ;
            font-weight : normal
        }

        pre.sh_sourceCode .sh_newfile {
            color : #006400 ;
            color : #A68500 ;
            font-style : normal ;
            font-weight : normal
        }

        pre.sh_sourceCode .sh_number {
            color : #800080 ;
            font-style : normal ;
            font-weight : bold
        }

        pre.sh_sourceCode .sh_oldfile {
            color : #FFA500 ;
            color : #FF00FF ;
            font-style : normal ;
            font-weight : bold
        }

        pre.sh_sourceCode .sh_optionalargument {
            color : #800080
        }

        pre.sh_sourceCode .sh_paren {
            color : #FF0000
        }

        pre.sh_sourceCode .sh_predef_func {
            color : #00008B ;
            font-weight : bold
        }

        pre.sh_sourceCode .sh_predef_var {
            color : #00008B
        }

        pre.sh_sourceCode .sh_preproc {
            color : #00008B ;
            color : #0080C0 ;
            font-style : normal ;
            font-weight : bold
        }

        pre.sh_sourceCode .sh_property {
            color : #0000FF ;
            color : #BB7977 ;
            font-style : normal ;
            font-weight : bold
        }

        pre.sh_sourceCode .sh_regexp {
            color : #FFA500 ;
            color : #A68500 ;
            font-family : monospace ;
            font-style : normal ;
            font-weight : normal
        }

        pre.sh_sourceCode .sh_section {
            color : #000000 ;
            font-weight : bold
        }

        pre.sh_sourceCode .sh_selector {
            color : #800080 ;
            color : #0080C0 ;
            font-style : normal ;
            font-weight : normal
        }

        pre.sh_sourceCode .sh_specialchar {
            color : #FFC0CB ;
            color : #FF00FF ;
            font-family : monospace ;
            font-style : normal ;
            font-weight : bold
        }

        pre.sh_sourceCode .sh_string {
            color : #FF0000 ;
            color : #A68500 ;
            font-family : monospace ;
            font-style : normal ;
            font-weight : normal
        }

        pre.sh_sourceCode .sh_symbol {
            color : #8B0000 ;
            color : #FF0080 ;
            font-style : normal ;
            font-weight : bold
        }

        pre.sh_sourceCode .sh_time {
            color : #BB7977 ;
            font-style : normal ;
            font-weight : bold
        }

        pre.sh_sourceCode .sh_time,
        pre.sh_sourceCode .sh_file {
            color : #00008B ;
            font-weight : bold
        }

        pre.sh_sourceCode .sh_todo {
            background-color : #00FFFF ;
            font-weight : bold
        }

        pre.sh_sourceCode .sh_type {
            color : #006400 ;
            color : #8080C0 ;
            font-style : normal ;
            font-weight : bold
        }

        pre.sh_sourceCode .sh_underline {
            color : #006400 ;
            text-decoration : underline
        }

        pre.sh_sourceCode .sh_url {
            color : #0000FF ;
            color : #A68500 ;
            font-family : monospace ;
            font-style : normal ;
            font-weight : normal ;
            text-decoration : underline
        }

        pre.sh_sourceCode .sh_usertype {
            color : #008080
        }

        pre.sh_sourceCode .sh_value {
            color : #006400 ;
            color : #A68500 ;
            font-style : italic ;
            font-style : normal ;
            font-weight : normal
        }

        pre.sh_sourceCode .sh_variable {
            color : #006400 ;
            color : #0080C0 ;
            font-style : normal ;
            font-weight : normal
        }

     */

    echo CSSParser::minify(file_get_contents('../sh_style.css'), null, CSSParser::OUTPUT_FORMAT_BEATIFUL | CSSParser::OPTION_OVERRIDE_PROPERTY | CSSParser::COLOR_RGB_TO_HEX | CSSParser::COLOR_NAME_TO_HEX | CSSParser::COLOR_HEX_TO_MINIFY | CSSParser::OUTPUT_WITHOUT_LAST_DELIM);