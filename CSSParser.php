<?php

// GPL VERSION 2

class CSSParser {

    // output type
    const OUTPUT_FORMAT_BEATIFUL = 2;
    const OUTPUT_FORMAT_GNU = 4;
    const OUTPUT_FORMAT_ONELINE = 8;
    const OUTPUT_FORMAT_MINIFY = 16;
    const OUTPUT_WITHOUT_LAST_DELIM = 32;

    // output indent
    const OUTPUT_INDENT_TAB = 64;
    const OUTPUT_INDENT_SPACE = 128;

    // option
    const OPTION_COMMA_SEPARATE = 256;
    const OPTION_DUPLICATE_MERGE = 512;
    const OPTION_REWRITE_PROPERTY = 1024;
    const OPTION_OVERRIDE_PROPERTY = 2048;
    const OPTION_MERGE_AS_DIFFERENT_PROPERTY = 4096;

    // color option
    const COLOR_RGB_TO_HEX = 8192;
    const COLOR_RGB_TO_NAME = 16384;

    const COLOR_NAME_TO_HEX = 32768;
    const COLOR_NAME_TO_RGB = 65536;

    const COLOR_HEX_TO_RGB = 131072;
    const COLOR_HEX_TO_NAME = 262144;

    const COLOR_HEX_TO_MINIFY = 524288;
    const COLOR_HEX_TO_FULL = 1048576;

    private static $colorList = array(
        'aliceblue' => '#F0F8FF',
        'antiquewhite' => '#FAEBD7',
        'aqua' => '#00FFFF',
        'cyan' => '#00FFFF',
        'aquamarine' => '#7FFFD4',
        'azure' => '#F0FFFF',
        'beige' => '#F5F5DC',
        'bisque' => '#FFE4C4',
        'black' => '#000000',
        'blanchedalmond' => '#FFEBCD',
        'blue' => '#0000FF',
        'blueviolet' => '#8A2BE2',
        'brown' => '#A52A2A',
        'burlywood' => '#DEB887',
        'cadetblue' => '#5F9EA0',
        'chartreuse' => '#7FFF00',
        'chocolate' => '#D2691E',
        'coral' => '#FF7F50',
        'cornflowerblue' => '#6495ED',
        'cornsilk' => '#FFF8DC',
        'crimson' => '#DC143C',
        'cyan' => '#00FFFF',
        'aqua' => '#00FFFF',
        'darkblue' => '#00008B',
        'darkcyan' => '#008B8B',
        'darkgoldenrod' => '#B886CD',
        'darkgray' => '#A9A9A9',
        'darkgreen' => '#006400',
        'darkmagenta' => '#8B008B',
        'darkolivegreen' => '#556B2F',
        'darkorange' => '#FF8C00',
        'darkorchid' => '#9932CC',
        'darkred' => '#8B0000',
        'darksalmon' => '#E9967A',
        'darkseagreen' => '#8FBC8F',
        'darkslateblue' => '#483D8B',
        'darkslategray' => '#2F4F4F',
        'darkturquoise' => '#00CED1',
        'darkviolet' => '#9400D3',
        'deeppink' => '#FF1493',
        'deepskyblue' => '#00BFFF',
        'dimgray' => '#696969',
        'dodgerblue' => '#1E90FF',
        'firebrick' => '#B22222',
        'floralwhite' => '#FFFAF0',
        'forestgreen' => '#228B22',
        'fuchsia' => '#FF00FF',
        'magenta' => '#FF00FF',
        'gainsboro' => '#DCDCDC',
        'ghostwhite' => '#F8F8FF',
        'gold' => '#FFD700',
        'goldenrod' => '#DAA520',
        'gray' => '#808080',
        'green' => '#008000',
        'greenyellow' => '#ADFF2F',
        'honeydew' => '#F0FFF0',
        'hotpink' => '#FF69B4',
        'indianred' => '#CD5C5C',
        'indigo' => '#4B0082',
        'ivory' => '#FFFFF0',
        'khaki' => '#F0E68C',
        'lavender' => '#E6E6FA',
        'lavenderblush' => '#FFF0F5',
        'lawngreen' => '#7CFC00',
        'lemonchiffon' => '#FFFACD',
        'lightblue' => '#ADD8E6',
        'lightcoral' => '#F08080',
        'lightcyan' => '#E0FFFF',
        'lightgoldenrodyellow' => '#FAFAD2',
        'lightgreen' => '#90EE90',
        'lightgrey' => '#D3D3D3',
        'lightpink' => '#FFB6C1',
        'lightsalmon' => '#FFA07A',
        'lightseagreen' => '#20B2AA',
        'lightskyblue' => '#87CEFA',
        'lightslategray' => '#778899',
        'lightsteelblue' => '#B0C4DE',
        'lightyellow' => '#FFFFE0',
        'lime' => '#00FF00',
        'limegreen' => '#32CD32',
        'linen' => '#FAF0E6',
        'magenta' => '#FF00FF',
        'fuchsia' => '#FF00FF',
        'maroon' => '#800000',
        'mediumaquamarine' => '#66CDAA',
        'mediumblue' => '#0000CD',
        'mediumorchid' => '#BA55D3',
        'mediumpurple' => '#9370DB',
        'mediumseagreen' => '#3CB371',
        'mediumslateblue' => '#7B68EE',
        'mediumspringgreen' => '#00FA9A',
        'mediumturquoise' => '#48D1CC',
        'mediumvioletred' => '#C71585',
        'midnightblue' => '#191970',
        'mistyrose' => '#FFE4E1',
        'moccasin' => '#FFE4B5',
        'navajowhite' => '#FFDEAD',
        'navy' => '#000080',
        'oldlace' => '#FDF5E6',
        'olive' => '#808000',
        'olivedrab' => '#6B8E23',
        'orange' => '#FFA500',
        'orangered' => '#FF4500',
        'orchid' => '#DA70D6',
        'palegoldenrod' => '#EEE8AA',
        'palegreen' => '#98FB98',
        'paleturquoise' => '#AFEEEE',
        'palevioletred' => '#DB7093',
        'papayawhip' => '#FFEFD5',
        'peachpuff' => '#FFDAB9',
        'peru' => '#CD853F',
        'pink' => '#FFC0CB',
        'plum' => '#DDA0DD',
        'powderblue' => '#B0E0E6',
        'purple' => '#800080',
        'red' => '#FF0000',
        'rosybrown' => '#BC8F8F',
        'royalblue' => '#4169E1',
        'saddlebrown' => '#8B4513',
        'salmon' => '#FA8072',
        'sandybrown' => '#F4A460',
        'seagreen' => '#2E8B57',
        'seashell' => '#FFF5EE',
        'sienna' => '#A0522D',
        'silver' => '#C0C0C0',
        'skyblue' => '#87CEEB',
        'slateblue' => '#655ACD',
        'slategray' => '#708090',
        'snow' => '#FFFAFA',
        'springgreen' => '#00FF7F',
        'steelblue' => '#4682B4',
        'tan' => '#D2B48C',
        'teal' => '#008080',
        'thistle' => '#D8BFD8',
        'tomato' => '#FF6347',
        'turquoise' => '#40E0D0',
        'violet' => '#EE82EE',
        'wheat' => '#F5DEB3',
        'white' => '#FFFFFF',
        'whitesmoke' => '#F5F5F5',
        'yellow' => '#FFFF00',
        'yellowgreen' => '#9ACD32',

        // 特殊なもの
        'transparent' => 'transparent'
    );

    // インスタンス化した際にCSSを格納するための変数
    private $css = '';

    public function __construct ($css) {
        $this->css = self::parse($css, self::OUTPUT_FORMAT_MINIFY | self::OPTION_COMMA_SEPARATE);
    }

    public function getAtRule ($name) {
        $name = trim($name);
        if ($name !== '' && $name[0] === '@') {
            $name = substr($name, 1);
        }
        if ($name !== 'styles' && isset($this->css[$name]) === true) {
            $data = array();
            foreach ($this->css[$name] as $value) {
                if ($name === 'import') {
                    // without url("")
                    $build = self::urlFormat($value);
                    // "まで移動
                    $size = strlen($build);
                    for ($i = 0; $i < $size && $build[$i] !== '\'' && $build[$i] !== '"'; $i++);
                    $i++;
                    if ($i < $size) {
                        $data[] = self::readString ($build[$i - 1], $build, $size, $i);
                    }
                } else {
                    if (is_string($value) === true && ($value[0] === '\'' || $value[0] === '"')) {
                        $build = '';
                        // charset
                        $i = 1;
                        $build = self::readString ($value[0], $value, strlen($value), $i);
                        $data[] = $build;
                    } else {
                        // page, mediaなど。
                        foreach ($value as $propertyIndex => $v) {
                            if ($propertyIndex === '__checkHash__') {
                                continue;
                            }
                            $values = array();
                            foreach ($v as $d) {
                                $data[$propertyIndex][] = $d;
                            }
                        }
                    }
                }
            }
            return $data;
        }
        return array();
    }

    public function getSelector ($selector) {
        $selector = self::parseSelector($selector, self::OUTPUT_FORMAT_MINIFY | self::OPTION_COMMA_SEPARATE);
        if (isset($this->css['styles'][$selector[0]]) === true) {
            $datas = array();
            foreach ($this->css['styles'][$selector[0]] as $selectors) {
                foreach ($selectors as $propertyIndex => $value) {
                    if ($propertyIndex === '__checkHash__') {
                        continue;
                    }
                    $values = array();
                    foreach ($value as $data) {
                        $datas[$propertyIndex][] = $data;
                    }
                }
            }
            return $datas;
        }
        return array();
    }

    public function getProperty ($selector, $property) {
        $selector = $this->getSelector ($selector);
        if (isset($selector[$property]) === true) {
            return $selector[$property];
        }
        return array();
    }

    public static function minify ($css, $indentSize = 4, $option = 0) {
        if (array_sum(array(
            ($option & self::OUTPUT_FORMAT_BEATIFUL),
            ($option & self::OUTPUT_FORMAT_GNU),
            ($option & self::OUTPUT_FORMAT_ONELINE),
            ($option & self::OUTPUT_FORMAT_MINIFY)
        )) === 0) {
            $option |= self::OUTPUT_FORMAT_BEATIFUL;
        }
        if ($indentSize === null) {
            $indentSize = 4;
        }
        return self::outputCss(self::parse($css, $option), $indentSize, $option);
    }

    private static function outputCss (array $phpCssArray, $indentSize = 4, $option = 0) {
        // output css format
        $build = '';
        // charset and import
        foreach (array('charset' => $phpCssArray['charset'], 'import' => $phpCssArray['import']) as $atName => $value) {
            foreach ($value as $data) {
                $build .= '@' . $atName . ' ' . $data . ';';
                switch (true) {
                    case (($option & self::OUTPUT_FORMAT_BEATIFUL) !== 0):
                    case (($option & self::OUTPUT_FORMAT_GNU) !== 0):
                    case (($option & self::OUTPUT_FORMAT_ONELINE) !== 0):
                        $build .= "\r\n";
                    break;
                }
            }
        }
        // font-face and page
        foreach (array('font-face' => $phpCssArray['font-face'], 'page' => $phpCssArray['page']) as $atName => $value) {
            $build .= self::output(array(
                '@' . $atName => $value
            ), $indentSize, $option);
        }
        // media
        foreach ($phpCssArray['media'] as $name => $media) {
            $build .= '@media ' . $name;
            $build .= self::startScope($option);
            $body = explode("\n", trim(self::output($media, $indentSize, $option)));
            foreach ($body as $line) {
                switch (true) {
                    case (($option & self::OUTPUT_FORMAT_BEATIFUL) !== 0):
                    case (($option & self::OUTPUT_FORMAT_GNU) !== 0):
                        $build .= str_repeat((($option & self::OUTPUT_INDENT_TAB) !== 0 ? "\t" : ' '), $indentSize);
                    break;
                }
                $build .= $line;
                if (($option & self::OUTPUT_FORMAT_MINIFY) === 0 && ($option & self::OUTPUT_FORMAT_ONELINE) === 0) {
                    $build .= "\n";
                }
            }
            $build .= self::endScope($option);
        }
        // normal styles
        $build .= self::output($phpCssArray['styles'], $indentSize, $option);
        return $build;
    }

    private static function output (array $phpCssArray, $indentSize = 4, $option = 0) {
        $build = '';
        $selectorIndex = sizeof($phpCssArray);
        $selectorPosition = 1;
        foreach ($phpCssArray as $selector => $code) {
            if (sizeof($code) <= 0) {
                $selectorIndex--;
                continue;
            }
            $buildPosition = strlen($build);
            $build .= $selector;
            $build .= self::startScope($option);
            $found = false;

            // 結合処理
            $temp = array();
            foreach ($code as $data) {
                foreach ($data as $property => $value) {
                    if ($property === '__checkHash__') {
                        continue;
                    }
                    foreach ($value as $multiple) {
                        $temp[$property][] = $multiple;
                    }
                }
            }
            ksort($temp);
            $arraySize = sizeof($temp);
            $index = 1;
            foreach ($temp as $property => $value) {
                $value = array_unique($value);
                foreach ($value as $multiple) {
                    if (($option & self::OUTPUT_FORMAT_MINIFY) === 0 && ($option & self::OUTPUT_FORMAT_ONELINE) === 0) {
                        $build .= str_repeat((($option & self::OUTPUT_INDENT_TAB) !== 0 ? "\t" : ' '), $indentSize);
                    }
                    $build .= $property;
                    $build .= (($option & self::OUTPUT_FORMAT_MINIFY) === 0 ? ' ' : '') . ':' . (($option & self::OUTPUT_FORMAT_MINIFY) === 0 ? ' ' : '');
                    $build .= $multiple;
                    if (($index !== $arraySize) || ($option & self::OUTPUT_WITHOUT_LAST_DELIM) === 0) {
                        $build .= (($option & self::OUTPUT_FORMAT_MINIFY) === 0 ? ' ' : '') . ';';
                    }
                    if (($option & self::OUTPUT_FORMAT_MINIFY) === 0) {
                        $build .= ' ';
                    }
                    if (($option & self::OUTPUT_FORMAT_MINIFY) === 0 && ($option & self::OUTPUT_FORMAT_ONELINE) === 0) {
                        $build .= "\r\n";
                    }
                    $found = true;
                }
                $index++;
            }
            $build .= self::endScope($option, $selectorIndex === $selectorPosition);
            if ($found === false) {
                $build = substr($build, 0, $buildPosition);
            }
            $selectorPosition++;
        }
        return $build;
    }

    private static function parse ($css, $option = 0) {
        $size = strlen($css);
        // まずはじめにコメントから処理していく。
        $withoutCommentout = '';
        for ($i = 0; $i < $size; $i++) {
            if (substr($css, $i, 2) === '/*') {
                for ($i += 2; $i < $size && substr($css, $i, 2) !== '*/'; $i++);
                $i += 2;
            } else {
                $withoutCommentout .= $css[$i];
            }
        }
        $css = $withoutCommentout;
        $size = strlen($css);
        $data = array(
            'charset' => array(),
            'font-face' => array(),
            'import' => array(),
            'media' => array(),
            'page' => array(),
            'styles' => array()
        );
        for ($i = 0; $i < $size; $i++) {
            $selector = '';
            $code = '';
            // { まで読み込む
            for (; $i < $size && $css[$i] !== '{'; $i++) {
                $selector .= $css[$i];
            }
            $selector = trim($selector);
            if ($selector !== '' && $selector[0] === '@') {
                $allSize = strlen($selector);
                $atRuleName = '';
                // スペースまで読み込む
                for ($j = 1; $j < $allSize && $selector[$j] !== ' '; $j++) {
                    $atRuleName .= $selector[$j];
                }
                switch (true) {
                    case ($atRuleName === 'import'):
                    case ($atRuleName === 'charset'):
                        $atRule = trim(self::readTerminated (';', $selector, $size, $j));
                        if ($atRuleName === 'import') {
                            $data[$atRuleName][] = self::urlFormat($atRule);
                        } else {
                            $data[$atRuleName][] = $atRule;
                        }
                        // 余計に進んだ分を戻す。
                        $i -= ($allSize - $j);
                    break;
                    case ($atRuleName === 'page'):
                    case ($atRuleName === 'font-face'):
                        $i++;
                        $data[$atRuleName][] = self::parseProperty(self::readTerminated ('}', $css, $size, $i), $option);
                    break;
                    default:
                        // media, keyframeなどなど
                        // }まで読み込むが、ネストも考慮する
                        $i++;
                        $area = self::parse(self::readTerminated ('}', $css, $size, $i, true, '{'), $option);
                        if ($atRuleName === 'media') {
                            $data[$atRuleName][trim(substr($selector, strlen($atRuleName) + 1))] = $area['styles'];
                        } else {
                            $data[$atRuleName][] = $area;
                        }
                    break;
                }
            } else {
                if ($i < $size) {
                    // } まで読み込む
                    $i++;
                    $code = self::readTerminated ('}', $css, $size, $i);
                    $selector = self::parseSelector($selector, $option);
                    $code = self::parseProperty($code, $option);
                    foreach ($selector as $value) {
                        $data['styles'][$value][] = $code;
                    }
                }
            }
        }
        // ソート
        ksort($data['charset']);
        ksort($data['font-face']);
        ksort($data['import']);
        ksort($data['media']);
        ksort($data['page']);
        ksort($data['styles']);
        // 重複しているデータをマージするかどうか
        if (($option & self::OPTION_DUPLICATE_MERGE) !== 0) {
            // 同類のデータを探す。
            $list = array();
            $buildData = array();
            foreach ($data['styles'] as $selector => $code) {
                foreach ($code as $data['styles']) {
                    if (isset($list[$data['styles']['__checkHash__']]) === false) {
                        $list[$data['styles']['__checkHash__']] = array(
                            'selector' => array(),
                            'code' => $code
                        );
                    }
                    $list[$data['styles']['__checkHash__']]['selector'][] = $selector;
                }
            }
            foreach ($list as $build) {
                sort($build['selector']);
                // 既に同名がある場合があるので、それについても処理する
                $buildData[self::commaMerge(array_unique(self::parseSelector(implode(',', $build['selector']), $option ^ self::OPTION_COMMA_SEPARATE)), $option)] = $build['code'];
            }
            $data['styles'] = $buildData;
        }
        return $data;
    }

    private static function parseSelector ($selector, $option = 0) {
        $selector = trim($selector);
        $size = strlen($selector);
        $build = array(
            '' // default data
        );
        $buildPosition = 0;
        for ($i = 0; $i < $size; $i++) {
            // スペースを終わらせる
            for (; $i < $size && substr_count("\r\n\t ", $selector[$i]) > 0; $i++);
            if ($i < $size) {
                switch (true) {
                    // 切り詰め可能なセレクタ
                    case ($selector[$i] === '+'):
                    case ($selector[$i] === '~'):
                    case ($selector[$i] === '>'):
                        if (($option & self::OUTPUT_FORMAT_MINIFY) === 0) {
                            $build[$buildPosition] .= ' ';
                        }
                        $build[$buildPosition] .= $selector[$i];
                        // 切り詰める
                        for ($i++; $i < $size && substr_count("\r\n\t ", $selector[$i]) > 0; $i++);
                        if (($option & self::OUTPUT_FORMAT_MINIFY) === 0) {
                            $build[$buildPosition] .= ' ';
                        }
                    break;
                    // 特殊なセレクタ (notやnth-childなど。)
                    case ($selector[$i] === '('):
                    case ($selector[$i] === '['):
                        $build[$buildPosition] .= $selector[$i];
                        // 終了 )] まで読み込む
                        $type = $selector[$i];
                        $data = '';
                        for ($i++; $i < $size && (($type === '(' && $selector[$i] !== ')') || ($type === '[' && $selector[$i] !== ']')); $i++) {
                            $data .= $selector[$i];
                        }
                        $data = implode(self::parseSelector($data, $option));
                        switch (true) {
                            case ($type === '('):
                                if ($data === 'even') {
                                    $data = '2n';
                                } else if ($data === 'odd') {
                                    $data = '2n+1';
                                }
                            break;
                            case ($type === '['):
                                // =を切り詰める
                                $dataSize = strlen($data);
                                $temp = '';
                                for ($j = 0; $j < $dataSize; $j++) {
                                    // スペースを切り詰める
                                    for (; $j < $dataSize && substr_count("\r\n\t ", $data[$j]) > 0; $j++);
                                    if ($j < $dataSize) {
                                        if ($data[$j] === '=') {
                                            // = の処理
                                            $temp .= $data[$j];
                                            for ($j++; $j < $dataSize && substr_count("\r\n\t ", $data[$j]) > 0; $j++);
                                            if ($j < $dataSize && ($data[$j] === '\'' || $data[$j] === '"')) {
                                                $temp .= $data[$j];
                                                $j++;
                                                $temp .= self::readString($data[$j - 1], $data, $dataSize, $j);
                                                if ($j < $dataSize) {
                                                    $temp .= $data[$j];
                                                }
                                            }
                                        } else if ($data[$j] === '\'' || $data[$j] === '"') {
                                            // 文字列の場合
                                            $temp .= $data[$j];
                                            $j++;
                                            $temp .= self::readString($data[$j - 1], $data, $dataSize, $j);
                                            // 終了
                                            $temp .= $data[$j];
                                        } else {
                                            // その他の文字列
                                            $temp .= $data[$j];
                                        }
                                    }
                                }
                                $data = $temp;
                            break;
                        }
                        $build[$buildPosition] .= $data;
                    break;
                    case ($selector[$i] === ','):
                        $buildPosition++;
                        $build[$buildPosition] = '';
                        // 切り詰める
                        for ($i++; $i < $size && substr_count("\r\n\t ", $selector[$i]) > 0; $i++);
                    break;
                    default:
                        if (isset($selector[$i - 1]) && substr_count("\r\n\t ", $selector[$i - 1]) > 0) {
                            $build[$buildPosition] .= ' ';
                        }
                    break;
                }
                if ($i < $size && $selector[$i] !== ',') {
                    $build[$buildPosition] .= $selector[$i];
                }
            }
        }
        if (($option & self::OPTION_COMMA_SEPARATE) === 0) {
            $build = array(self::commaMerge($build, $option));
        }
        return $build;
    }

    private static function parseProperty ($code, $option = 0) {
        $size = strlen($code);
        $data = array();
        for ($i = 0; $i < $size; $i++) {
            // :まで読み込む
            $property = '';
            $content = '';
            for (; $i < $size && $code[$i] !== ':'; $i++) {
                $property .= $code[$i];
            }
            if ($i < $size && $code[$i] === ':') {
                // ;まで読み込む
                $i++;
                $content = self::readTerminated (';', $code, $size, $i);
                $property = strtolower(trim($property));
                $content = self::removeWhitespace($content);
                $data[$property][] = $content;
                // 一番最後のプロパティを取得する

                // 最後までポインタを進める
                end ($data[$property]);
                $index = key($data[$property]);
                $rewrite = trim($data[$property][$index]);
                // プロパティの書き換え
                if (($option & self::OPTION_REWRITE_PROPERTY) !== 0) {
                    if (in_array($property, array(
                        'padding', 'margin', 'border-width', 'border-style', 'border-color'
                    )) === true) {
                        $temp = array();
                        foreach (explode(' ', $rewrite) as $value) {
                            $value = trim($value);
                            if ($property === 'border-color') {
                                // 変換作業
                                $value = self::colorFormat($value, $option);
                            }
                            $temp[] = $value;
                        }
                        $dataSize = sizeof($temp);
                        // 意味不明な記述方式は無視する
                        if ($dataSize >= 1 && $dataSize <= 4) {
                            // 数で種類を決める
                            switch ($dataSize) {
                                case 1:
                                    // 上下左右
                                    if (in_array($property, array('padding', 'margin')) === true) {
                                        $data[$property . '-top'][] = $temp[0];
                                        $data[$property . '-right'][] = $temp[0];
                                        $data[$property . '-bottom'][] = $temp[0];
                                        $data[$property . '-left'][] = $temp[0];
                                    } else if (in_array($property, array('border-width', 'border-style', 'border-color')) === true) {
                                        $data[str_replace('-', '-top-', $property)][] = $temp[0];
                                        $data[str_replace('-', '-right-', $property)][] = $temp[0];
                                        $data[str_replace('-', '-bottom-', $property)][] = $temp[0];
                                        $data[str_replace('-', '-left-', $property)][] = $temp[0];
                                    }
                                break;
                                case 2:
                                    // 上下 左右
                                    if (in_array($property, array('padding', 'margin')) === true) {
                                        $data[$property . '-top'][] = $temp[0];
                                        $data[$property . '-right'][] = $temp[1];
                                        $data[$property . '-bottom'][] = $temp[0];
                                        $data[$property . '-left'][] = $temp[1];
                                    } else if (in_array($property, array('border-width', 'border-style', 'border-color')) === true) {
                                        $data[str_replace('-', '-top-', $property)][] = $temp[0];
                                        $data[str_replace('-', '-right-', $property)][] = $temp[1];
                                        $data[str_replace('-', '-bottom-', $property)][] = $temp[0];
                                        $data[str_replace('-', '-left-', $property)][] = $temp[1];
                                    }
                                break;
                                case 3:
                                    // 上 左右 下
                                    if (in_array($property, array('padding', 'margin')) === true) {
                                        $data[$property . '-top'][] = $temp[0];
                                        $data[$property . '-right'][] = $temp[1];
                                        $data[$property . '-bottom'][] = $temp[2];
                                        $data[$property . '-left'][] = $temp[1];
                                    } else if (in_array($property, array('border-width', 'border-style', 'border-color')) === true) {
                                        $data[str_replace('-', '-top-', $property)][] = $temp[0];
                                        $data[str_replace('-', '-right-', $property)][] = $temp[1];
                                        $data[str_replace('-', '-bottom-', $property)][] = $temp[2];
                                        $data[str_replace('-', '-left-', $property)][] = $temp[1];
                                    }
                                break;
                                case 4:
                                    // 上 右 下 左
                                    if (in_array($property, array('padding', 'margin')) === true) {
                                        $data[$property . '-top'][] = $temp[0];
                                        $data[$property . '-right'][] = $temp[1];
                                        $data[$property . '-bottom'][] = $temp[2];
                                        $data[$property . '-left'][] = $temp[3];
                                    } else if (in_array($property, array('border-width', 'border-style', 'border-color')) === true) {
                                        $data[str_replace('-', '-top-', $property)][] = $temp[0];
                                        $data[str_replace('-', '-right-', $property)][] = $temp[1];
                                        $data[str_replace('-', '-bottom-', $property)][] = $temp[2];
                                        $data[str_replace('-', '-left-', $property)][] = $temp[3];
                                    }
                                break;
                            }
                            // 元々のデータを削除する
                            unset($data[$property][$index]);
                        }
                    } else if (in_array($property, array(
                        'border', 'border-top', 'border-right', 'border-bottom', 'border-left'
                    )) === true) {
                        $temp = explode(' ', $rewrite);
                        $dataSize = sizeof($temp);
                        if ($dataSize >= 2 && $dataSize <= 3) {
                            $selectedSize = false;
                            $selectedStyle = false;
                            $selectedColor = false;
                            foreach ($temp as $value) {
                                if ($value === 'thin' || $value === 'medium' || $value === 'thick' || self::hasUnitByData ($value) === true) {
                                    $selectedSize = $value;
                                } else if (in_array($value, array(
                                    'none', 'hidden', 'solid', 'double', 'groove', 'ridge', 'inset', 'outset', 'dashed', 'dotted'
                                ))) {
                                    $selectedStyle = $value;
                                } else if (self::isColor($value) === true) {
                                    $selectedColor = self::colorFormat($value);
                                }
                            }
                            // 色以外存在する場合は黒の値を付与する
                            if ($selectedSize !== false && $selectedStyle !== false && $selectedColor === false) {
                                $selectedColor = '#000000';
                            }
                            if ($selectedSize !== false && $selectedStyle !== false && $selectedColor !== false) {
                                if ($property === 'border' || $property === 'border-top') {
                                    $data['border-top-width'][] = $selectedSize;
                                    $data['border-top-style'][] = $selectedStyle;
                                    $data['border-top-color'][] = $selectedColor;
                                }
                                if ($property === 'border' || $property === 'border-right') {
                                    $data['border-right-width'][] = $selectedSize;
                                    $data['border-right-style'][] = $selectedStyle;
                                    $data['border-right-color'][] = $selectedColor;
                                }

                                if ($property === 'border' || $property === 'border-bottom') {
                                    $data['border-bottom-width'][] = $selectedSize;
                                    $data['border-bottom-style'][] = $selectedStyle;
                                    $data['border-bottom-color'][] = $selectedColor;
                                }

                                if ($property === 'border' || $property === 'border-left') {
                                    $data['border-left-width'][] = $selectedSize;
                                    $data['border-left-style'][] = $selectedStyle;
                                    $data['border-left-color'][] = $selectedColor;
                                }
                                unset($data[$property][$index]);
                            }
                        }
                    } else if ($property === 'background') {
                        // 解析開始
                        $position = 0;
                        // 配置
                        $selectedColor = 'transparent';
                        $selectedImage = 'none';
                        $selectedPositionX = false;
                        $selectedPositionY = false;
                        $selectedRepeat = 'repeat';
                        $selectedAttachment = '';

                        // 入力されているデータの解析
                        foreach (self::separateByWhitespace($rewrite) as $value) {
                            if (self::isColor($value) === true) {
                                $selectedColor = self::colorFormat($value, $option);
                            } else if (strpos($value, 'url') !== false) {
                                $selectedImage = self::urlFormat($value, $option);
                            } else if (in_array($value, array('repeat', 'repeat-x', 'repeat-y', 'no-repeat')) === true) {
                                $selectedRepeat = $value;
                            } else if (in_array($value, array('left', 'center', 'right')) === true && ($value === 'center' && $selectedPositionX === false)) {
                                $selectedPositionX = $value === 'left' ? '0' : ($value === 'center' ? '50%' : '100%');
                            } else if (in_array($value, array('top', 'center', 'bottom')) === true) {
                                $selectedPositionY = $value === 'top' ? '0' : ($value === 'center' ? '50%' : '100%');
                            } else if (in_array($value, array('fixed', 'scroll')) === true) {
                                $selectedAttachment = $value;
                            } else {
                                // background-position の解析
                                if (self::hasUnitByData ($value) === true) {
                                    if ($selectedPositionX === '0') {
                                        $selectedPositionX = $value;
                                    } else {
                                        $selectedPositionY = $value;
                                    }
                                }
                            }
                        }

                        // 追加
                        if ($selectedColor !== 'transparent') {
                            $data['background-color'][] = $selectedColor;
                        }
                        if ($selectedImage !== 'none') {
                            $data['background-image'][] = $selectedImage;
                        }
                        if ($selectedPositionX !== false || $selectedPositionY !== false) {
                            if ($selectedPositionX === false) {
                                $selectedPositionX = '0';
                            }
                            if ($selectedPositionY === false) {
                                $selectedPositionY = '0';
                            }
//                            if ($selectedPositionX === $selectedPositionY && $selectedPositionX !== false) {
//                                // 省略
//                                $data['background-position'][] = $selectedPositionX;
//                            } else {
                                $data['background-position'][] = $selectedPositionX . ' ' . $selectedPositionY;
//                            }
                        }
                        if ($selectedRepeat !== 'repeat') {
                            $data['background-repeat'][] = $selectedRepeat;
                        }
                        if ($selectedAttachment !== '') {
                            $data['background-attachment'][] = $selectedAttachment;
                        }
                        unset($data[$property][$index]);
                    }
                }
                if (in_array($property, array(
                    'color', 'background-color'
                )) === true) {
                    $data[$property][$index] = self::colorFormat($rewrite, $option);
                } else if ($property === 'background-image') {
                    $data[$property][$index] = self::urlFormat($rewrite, $option);
                } else if ($property === 'background') {
                    // left center right, top center bottomの変換作業を行う。

                }

                // 結合オプション
                if (($option & self::OPTION_REWRITE_PROPERTY) === 0 && ($option & self::OPTION_MERGE_AS_DIFFERENT_PROPERTY) !== 0) {
                    $list = array(
/*                        'margin' => array(
                            'margin-top',
                            'margin-right',
                            'margin-bottom',
                            'margin-left'
                        ),
                        'padding' => array(
                            'padding-top',
                            'padding-right',
                            'padding-bottom',
                            'padding-left'
                        ),*/
                        'background' => array(
                            'background-color',
                            'background-image',
                            'background-position',
                            'background-repeat',
                            'background-attachment'
                        )
                    );
                    if (in_array($property, $list['background']) === true && isset($data['background']) === false) {
                        // 上記のどれかにマッチした場合、結合作業を行う。
                        // なお、上書きを避けるためbackgroundが既に存在する場合は作業を行わない。
                        $background = array();
                        foreach ($list['background'] as $value) {
                            if (isset($data[$value])) {
                                if ($value === 'background-color') {
                                    $data[$value][$index] = self::colorFormat($data[$value][$index], $option);
                                } else if ($value === 'background-image') {
                                    $data[$value][$index] = self::urlFormat($data[$value][$index], $option);
                                } else if ($value === 'background-position') {
                                    // position...
                                } else if ($value === 'background-repeat') {
                                    if (in_array($data[$value][$index], array('repeat', 'repeat-x', 'repeat-y', 'no-repeat')) === false) {
                                        continue;
                                    }
                                } else if ($value === 'background-attachment') {
                                    if (in_array($data[$value][$index], array('fixed', 'scroll')) === false) {
                                        continue;
                                    }
                                }
                                $background[] = $data[$value][$index];
                                unset($data[$value]);
                            }
                        }
                        $data['background'][] = implode(' ', $background);
                    }/* else if (isset($data['border-width'], $data['border-style']) === true && isset($data['border']) === false) {
                        $color = '#000000';
                        if (isset($data['border-color'][$index])) {
                            $color = $data['border-color'][$index];
                            unset($data['border-color'][$index]);
                        }
                        $color = self::colorFormat($color, $option);
                        $data['border'][] = $data['border-width'][$index] . ' ' . $data['border-style'][$index] . ' ' . $color;
                        unset($data['border-width'][$index], $data['border-style'][$index]);
                    }*/
                }
            }
        }
        if (($option & self::OPTION_OVERRIDE_PROPERTY) !== 0) {
            // 上書き処理
            foreach ($data as $property => $value) {
                $data[$property] = array($value[sizeof($value) - 1]);
            }
        }
        $data['__checkHash__'] = md5(serialize($data));
        return $data;
    }

    private static function commaMerge ($build, $option = 0) {
        $add = '';
        if (($option & self::OPTION_COMMA_SEPARATE) === 0) {
            switch (true) {
                case (($option & self::OUTPUT_FORMAT_BEATIFUL) !== 0):
                case (($option & self::OUTPUT_FORMAT_GNU) !== 0):
                    $add .= "\r\n";
                break;
                case (($option & self::OUTPUT_FORMAT_ONELINE) !== 0):
                    $add .= ' ';
                break;
            }
        }
        return implode(',' . $add, $build);
    }

    private static function removeWhitespace ($data) {
        $data = trim($data);
        $size = strlen($data);
        $build = '';
        for ($i = 0; $i < $size; $i++) {
            for (; $i < $size && $data[$i] === ' '; $i++);
            if (isset($data[$i - 1]) && substr_count(" \t", $data[$i - 1]) > 0) {
                $build .= ' ';
            }
            if ($data[$i] !== ' ') {
                $build .= $data[$i];
            } else if ($data[$i] === '\'' || $data[$i] === '"') {
                $i++;
                $build .= self::readString ($data[$i - 1], $data, $size, $i);
                $build .= $data[$i];
            }
        }
        return $build;
    }

    private static function separateByWhitespace ($value) {
        $temp = array('');
        $position = 0;
        $size = strlen($value);
        for ($i = 0; $i < $size; $i++) {
            if ($value[$i] === '\'' || $value[$i] === '"') {
                $temp[$position] .= $value[$i];
                $i++;
                $temp[$position] .= self::readString ($value[$i - 1], $value, $size, $i);
            } else if (substr_count(" \t", $value[$i]) > 0) {
                $position++;
                $temp[$position] = '';
                for ($i++; $i < $size && substr_count(" \t", $value[$i]) > 0; $i++);
            }
            if ($i < $size) {
                $temp[$position] .= $value[$i];
            }
        }
        return $temp;
    }

    private static function colorFormat ($color, $option = 0) {
        if (($option & self::COLOR_HEX_TO_RGB) !== 0) {
            $color = self::colorHexToRGB($color, $option);
        } else if (($option & self::COLOR_RGB_TO_HEX) !== 0) {
            $color = self::colorRGBToHex($color, $option);
        }
        if (($option & self::COLOR_HEX_TO_NAME) !== 0) {
            $color = self::colorHexToName($color, $option);
        } else if (($option & self::COLOR_NAME_TO_HEX) !== 0) {
            $color = self::colorNameToHex($color, $option);
        }
        if (($option & self::COLOR_RGB_TO_NAME) !== 0) {
            $color = self::colorRGBToName($color, $option);
        } else if (($option & self::COLOR_NAME_TO_RGB) !== 0) {
            $color = self::colorNameToRGB($color, $option);
        }

        if (self::isColorHex($color) === true && strlen($color) === (6 + 1) && ($option & self::COLOR_HEX_TO_MINIFY) !== 0) {
            $hex = '#';
            for ($i = 1; $i < 6; $i += 2) {
                if ($color[$i] === $color[$i + 1]) {
                    $hex .= $color[$i];
                }
            }
            // 割れる場合は #XXX (length = 4) という書式になっている。
            if ((strlen($hex) / (3 + 1)) === 0) {
                $color = $hex;
            }
        } else if (self::isColorHex($color) === true && strlen($color) === (3 + 1) && ($option & self::COLOR_HEX_TO_FULL) !== 0) {
            $hex = '#';
            for ($i = 1; $i < 4; $i++) {
                $hex .= $color[$i] . $color[$i];
            }
            $color = $hex;
        } else if (strpos($color, 'rgb') !== false) {
            // rgba も動く（はず）
            $build = '';
            $size = strlen($color);
            for ($i = 0; $i < $size; $i++) {
                for (; $i < $size && $color[$i] === ' '; $i++);
                if ($color[$i] === ',') {
                    $build .= $color[$i];
                    // スペースを切り詰める
                    for ($i++; $i < $size && $color[$i] === ' '; $i++);
                    if ($i < $size && ($option & self::OUTPUT_FORMAT_MINIFY) === 0) {
                        $build .= ' ';
                    }
                }
                $build .= $color[$i];
            }
            $color = $build;
        }
        return self::isColorHex($color) === true ? strtoupper($color) : $color;
    }

    private static function urlFormat ($url, $option = 0) {
        $temp = '';
        $size = strlen($url);
        for ($i = 0; $i < $size; $i++) {
            if ($url[$i] === '(') {
                $temp .= $url[$i];
                // とりあえず。スペースを切り詰める。
                for ($i++; $i < $size && $url[$i] === ' '; $i++);
                // ダブルクオーテーションがない場合、付与する
                if ($i < $size) {
                    $quoted = true;
                    if (($option & self::OUTPUT_FORMAT_MINIFY) === 0) {
                        if ($url[$i] !== '\'' && $url[$i] !== '"') {
                            $temp .= '"';
                            $quoted = false;
                        }
                    }
                    $temp .= $url[$i];
                    // )まで移動
                    for ($i++; $i < $size && $url[$i] !== ')'; $i++) {
                        $temp .= $url[$i];
                    }
                    if ($quoted === false) {
                        $temp .= '"';
                    }
                }
            }
            if ($url[$i] === '\'' || $url[$i] === '"') {
                if (($option & self::OUTPUT_FORMAT_MINIFY) === 0) {
                    $temp .= $url[$i];
                }
                $i++;
                $temp .= self::readString($url[$i - 1], $url, $size, $i);
                if (($option & self::OUTPUT_FORMAT_MINIFY) !== 0) {
                    $temp = str_replace(' ', '+', $temp);
                    continue;
                }
            }
            if ($i < $size) {
                $temp .= $url[$i];
            }
        }
        return $temp;
    }

    private static function hasUnitByData ($data, $useFontSize = false) {
        if ($useFontSize === true && in_array($data, array('xx-small', 'x-small', 'small', 'medium', 'large', 'x-large', 'xx-large', 'smaller', 'larger'))) {
            return true;
        } else {
            foreach (array('%', 'cm', 'em', 'ex', 'in', 'mm', 'pc', 'pt', 'px') as $value) {
                $size = strlen($value);
                if (substr($data, -$size, $size) === $value) {
                    return true;
                }
            }
            if ((string) $data === '0') {
                return true;
            }
        }
        return false;
    }

    private static function isColor ($data) {
        if (self::isColorHex($data) === true || strpos($data, 'rgb') !== false || in_array($data, array_keys(self::$colorList)) === true) {
            return true;
        }
        return false;
    }

    private static function isColorHex ($data) {
        static $cache = array();
        if (isset($cache[$data])) {
            return $cache[$data];
        }
        if (isset($data[0]) === true && $data[0] === '#' && ($size = strlen($data)) === 3 + 1 || ($size = strlen($data)) === 6 + 1) {
            for ($i = 1; $i < $size; $i++) {
                if (substr_count('ABCDEFabcdef0123456789', $data[$i]) === 0) {
                    $cache[$data] = false;
                    return false;
                }
            }
            $cache[$data] = true;
            return true;
        }
        $cache[$data] = false;
        return false;
    }

    private static function colorRGBToName ($color, $option = 0) {
        return self::colorHexToName(self::colorRGBToHex($color, $option), $option);
    }

    private static function colorNameToRGB ($color, $option = 0) {
        return self::colorHexToRGB(self::colorNameToHex($color, $option), $option);
    }

    private static function colorHexToRGB ($color, $option = 0) {
        if (self::isColorHex ($color) === true) {
            $color = hexdec(substr($color, 1));
            $r = $color >> 16 & 0xFF;
            $g = $color >> 8 & 0xFF;
            $b = $color & 0xFF;
            return 'rgb(' . $r . ',' . $g . ',' . $b . ')';
        }
        return $color;
    }

    private static function colorRGBToHex ($color, $option = 0) {
        // (まで探す。
        $start = strpos($color, '(');
        if ($start !== false) {
            // )まで探す。
            $end = strpos($color, ')', $start);
            if ($end !== false) {
                $start++;
                $rgb = explode(',', str_replace(array(" ", "\r", "\n"), '', substr($color, $start, $end - $start)));
                $color = '';
                foreach ($rgb as $value) {
                    if (substr($value, -1, 1) === '%') {
                        // パーセント表現
                        $value = floor((((int) $value) / 0xFF) * 100);
                    } else {
                        $value = dechex($value);
                    }
                    if (hexdec($value) <= 15) {
                        $color .= '0';
                    }
                    $color .= $value;
                }
                $color = '#' . $color;
            }
        }
        return $color;
    }

    private static function colorHexToName ($color, $option = 0) {
        if (($key = array_search (strtoupper($color), self::$colorList, true)) !== false) {
            $color = $key;
        }
        return $color;
    }

    private static function colorNameToHex ($color, $option = 0) {
        if (isset(self::$colorList[$color]) === true) {
            $color = self::$colorList[$color];
        }
        return $color;
    }

    private static function readTerminated ($term, $body, $size, &$i, $nest = false, $nestTarget = null) {
        $data = '';
        $stacks = 0;
        for (; $i < $size && $body[$i] !== $term; $i++) {
            if ($body[$i] === '\'' || $body[$i] === '"') {
                // 文字列の場合は終わりまで読み込む
                $data .= $body[$i];
                $i++;
                $data .= self::readString($body[$i - 1], $body, $size, $i);
            } else if ($body[$i] === ' ') {
                for (; $i < $size && substr_count("\r\n\t ", $body[$i]) > 0; $i++);
                if ($i < $size) {
                    switch (true) {
                        case ($body[$i] === '('):
                        case ($body[$i] === ')'):
                        case ($body[$i] === '['):
                        case ($body[$i] === ']'):
                        case ($body[$i] === '\''):
                        case ($body[$i] === '"'):
                        case ($body[$i] === '+'):
                        case ($body[$i] === '>'):
                        case ($body[$i] === '~'):
                            // 無視
                        break;
                        default:
                            $data .= ' ';
                        break;
                    }
                    // 1つ戻す
                    $i--;
                }
            }
            if ($i < $size && $body[$i] !== ' ') {
                $data .= $body[$i];
                if ($body[$i] === $nestTarget) {
                    $stacks++;
                }
            }
            if ($nest === true && ($i + 1) < $size && $body[$i + 1] === $term && $stacks > 0) {
                // 次の回が$termだった場合で、stackが残っている場合のネストをする。
                $stacks--;
                $i++;
                $data .= $body[$i];
            }
        }
        return $data;
    }

    private static function startScope ($option = 0) {
        $build = '';
        switch (true) {
            case (($option & self::OUTPUT_FORMAT_BEATIFUL) !== 0):
                $build .= " {\r\n";
            break;
            case (($option & self::OUTPUT_FORMAT_GNU) !== 0):
                $build .= "\r\n{\r\n";
            break;
            case (($option & self::OUTPUT_FORMAT_ONELINE) !== 0):
                $build .= " { ";
            break;
            case (($option & self::OUTPUT_FORMAT_MINIFY) !== 0):
                $build .= "{";
            break;
        }
        return $build;
    }

    private static function endScope ($option = 0, $last = false) {
        $build = '';
        switch (true) {
            case (($option & self::OUTPUT_FORMAT_BEATIFUL) !== 0):
            case (($option & self::OUTPUT_FORMAT_GNU) !== 0):
            case (($option & self::OUTPUT_FORMAT_ONELINE) !== 0):
                $build .= "}" . ($last === false ? "\r\n" : '');
                if (($option & self::OUTPUT_FORMAT_ONELINE) === 0) {
                    $build .= "\r\n";
                }
            break;
            case (($option & self::OUTPUT_FORMAT_MINIFY) !== 0):
                $build .= "}";
            break;
        }
        return $build;
    }

    private static function readString ($target, $body, $size, &$i) {
        $data = '';
        for (; $i < $size && $body[$i - 1] !== '\\' && $body[$i] !== $target; $i++) {
            $data .= $body[$i];
        }
        return $data;
    }

}

?>