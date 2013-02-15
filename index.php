<?php
    define('TITLE', 'RX*CSS - CSS Parserβ 1.1.0');
    mb_internal_encoding('UTF-8');
    date_default_timezone_set('Asia/Tokyo');
?>
<?php header('Content-Type: text/html;charset=UTF-8'); ?>
<!DOCTYPE html>
<html>
    <head>
        <title><?php echo TITLE; ?></title>
        <style>
            @import url(sh_style.css);
            html{color:#000;background:#FFF;}body,div,dl,dt,dd,ul,ol,li,h1,h2,h3,h4,h5,h6,pre,code,form,fieldset,legend,input,button,textarea,p,blockquote,th,td{margin:0;padding:0;font-size:12px;font-family:'MS Gothic', 'ＭＳ ゴシック';line-height:16px;letter-spacing:0px;}table{border-collapse:collapse;border-spacing:0;}fieldset,img{border:0;}address,caption,cite,code,dfn,em,strong,th,var,optgroup{font-style:inherit;font-weight:inherit;}del,ins{text-decoration:none;}li{list-style:none;}caption,th{text-align:left;}h1,h2,h3,h4,h5,h6{font-size:100%;font-weight:normal;}q:before,q:after{content:'';}abbr,acronym{border:0;font-variant:normal;}sup{vertical-align:baseline;}sub{vertical-align:baseline;}legend{color:#000;}input,button,textarea,select,optgroup,option{font-family:inherit;font-size:inherit;font-style:inherit;font-weight:inherit;}input,button,textarea,select{*font-size:100%;}article,aside,canvas,details,figcaption,figure,footer,header,hgroup,menu,nav,section,summary,time,mark,audio,video{margin:0;padding:0;border:0;outline:0;font-size:100%;vertical-align:baseline;background:transparent}article,aside,details,figcaption,figure,footer,header,hgroup,menu,nav,section{display:block}nav ul{list-style:none}mark{background-color:#ff9;color:#000;font-style:italic;font-weight:bold}abbr[title],dfn[title]{border-bottom:1px dotted;cursor:help}ins{background-color:#ff9;color:#000;text-decoration:none}
            body {
                padding : 20px ;
            }
            .b {
                font-weight : bolder ;
            }
            h1 {
                font-size : 22px ;
                line-height : 25px ;
                font-weight : bolder ;
            }
            h2  {
                font-size : 16px ;
                line-height : 25px ;
                font-weight : bolder ;
            }
            dt {
                line-height : 25px ;
                font-weight : bolder ;
            }
            dd {
                padding : 10px ;
            }
            form {
                width : 500px ;
                padding : 20px ;
            }
            form > p {
                width : inherit ;
            }
            #paste {
                width : inherit ;
                height : 300px ;
            }
            input[type="submit"] {
                margin : 10px ;
                width : 120px ;
            }
            label > input {
                margin-right : 5px ;
            }
            .a {
                overflow : hidden ;
            }
            .a > * {
                float : left ;
            }
            ol > li {
                padding : 5px ;
                padding-left : 0 ;
                margin-left : 21px ;
                list-style-type: lower-latin;
                text-decoration : underline ;
            }
            strong {
                font-weight : bolder ;
            }
            pre {
                width : 420px ;
            }
            p {
                line-height : 20px ;
            }
            .n {
                color : #777777 ;
            }
        </style>
        <script>
            /* Copyright (C) 2007, 2008 gnombat@users.sourceforge.net */
            /* License: http://shjs.sourceforge.net/doc/gplv3.html */

            if(!this.sh_languages){this.sh_languages={}}var sh_requests={};function sh_isEmailAddress(a){if(/^mailto:/.test(a)){return false}return a.indexOf("@")!==-1}function sh_setHref(b,c,d){var a=d.substring(b[c-2].pos,b[c-1].pos);if(a.length>=2&&a.charAt(0)==="<"&&a.charAt(a.length-1)===">"){a=a.substr(1,a.length-2)}if(sh_isEmailAddress(a)){a="mailto:"+a}b[c-2].node.href=a}function sh_konquerorExec(b){var a=[""];a.index=b.length;a.input=b;return a}function sh_highlightString(B,o){if(/Konqueror/.test(navigator.userAgent)){if(!o.konquered){for(var F=0;F<o.length;F++){for(var H=0;H<o[F].length;H++){var G=o[F][H][0];if(G.source==="$"){G.exec=sh_konquerorExec}}}o.konquered=true}}var N=document.createElement("a");var q=document.createElement("span");var A=[];var j=0;var n=[];var C=0;var k=null;var x=function(i,a){var p=i.length;if(p===0){return}if(!a){var Q=n.length;if(Q!==0){var r=n[Q-1];if(!r[3]){a=r[1]}}}if(k!==a){if(k){A[j++]={pos:C};if(k==="sh_url"){sh_setHref(A,j,B)}}if(a){var P;if(a==="sh_url"){P=N.cloneNode(false)}else{P=q.cloneNode(false)}P.className=a;A[j++]={node:P,pos:C}}}C+=p;k=a};var t=/\r\n|\r|\n/g;t.lastIndex=0;var d=B.length;while(C<d){var v=C;var l;var w;var h=t.exec(B);if(h===null){l=d;w=d}else{l=h.index;w=t.lastIndex}var g=B.substring(v,l);var M=[];for(;;){var I=C-v;var D;var y=n.length;if(y===0){D=0}else{D=n[y-1][2]}var O=o[D];var z=O.length;var m=M[D];if(!m){m=M[D]=[]}var E=null;var u=-1;for(var K=0;K<z;K++){var f;if(K<m.length&&(m[K]===null||I<=m[K].index)){f=m[K]}else{var c=O[K][0];c.lastIndex=I;f=c.exec(g);m[K]=f}if(f!==null&&(E===null||f.index<E.index)){E=f;u=K;if(f.index===I){break}}}if(E===null){x(g.substring(I),null);break}else{if(E.index>I){x(g.substring(I,E.index),null)}var e=O[u];var J=e[1];var b;if(J instanceof Array){for(var L=0;L<J.length;L++){b=E[L+1];x(b,J[L])}}else{b=E[0];x(b,J)}switch(e[2]){case -1:break;case -2:n.pop();break;case -3:n.length=0;break;default:n.push(e);break}}}if(k){A[j++]={pos:C};if(k==="sh_url"){sh_setHref(A,j,B)}k=null}C=w}return A}function sh_getClasses(d){var a=[];var b=d.className;if(b&&b.length>0){var e=b.split(" ");for(var c=0;c<e.length;c++){if(e[c].length>0){a.push(e[c])}}}return a}function sh_addClass(c,a){var d=sh_getClasses(c);for(var b=0;b<d.length;b++){if(a.toLowerCase()===d[b].toLowerCase()){return}}d.push(a);c.className=d.join(" ")}function sh_extractTagsFromNodeList(c,a){var f=c.length;for(var d=0;d<f;d++){var e=c.item(d);switch(e.nodeType){case 1:if(e.nodeName.toLowerCase()==="br"){var b;if(/MSIE/.test(navigator.userAgent)){b="\r"}else{b="\n"}a.text.push(b);a.pos++}else{a.tags.push({node:e.cloneNode(false),pos:a.pos});sh_extractTagsFromNodeList(e.childNodes,a);a.tags.push({pos:a.pos})}break;case 3:case 4:a.text.push(e.data);a.pos+=e.length;break}}}function sh_extractTags(c,b){var a={};a.text=[];a.tags=b;a.pos=0;sh_extractTagsFromNodeList(c.childNodes,a);return a.text.join("")}function sh_mergeTags(d,f){var a=d.length;if(a===0){return f}var c=f.length;if(c===0){return d}var i=[];var e=0;var b=0;while(e<a&&b<c){var h=d[e];var g=f[b];if(h.pos<=g.pos){i.push(h);e++}else{i.push(g);if(f[b+1].pos<=h.pos){b++;i.push(f[b]);b++}else{i.push({pos:h.pos});f[b]={node:g.node.cloneNode(false),pos:h.pos}}}}while(e<a){i.push(d[e]);e++}while(b<c){i.push(f[b]);b++}return i}function sh_insertTags(k,h){var g=document;var l=document.createDocumentFragment();var e=0;var d=k.length;var b=0;var j=h.length;var c=l;while(b<j||e<d){var i;var a;if(e<d){i=k[e];a=i.pos}else{a=j}if(a<=b){if(i.node){var f=i.node;c.appendChild(f);c=f}else{c=c.parentNode}e++}else{c.appendChild(g.createTextNode(h.substring(b,a)));b=a}}return l}function sh_highlightElement(d,g){sh_addClass(d,"sh_sourceCode");var c=[];var e=sh_extractTags(d,c);var f=sh_highlightString(e,g);var b=sh_mergeTags(c,f);var a=sh_insertTags(b,e);while(d.hasChildNodes()){d.removeChild(d.firstChild)}d.appendChild(a)}function sh_getXMLHttpRequest(){if(window.ActiveXObject){return new ActiveXObject("Msxml2.XMLHTTP")}else{if(window.XMLHttpRequest){return new XMLHttpRequest()}}throw"No XMLHttpRequest implementation available"}function sh_load(language,element,prefix,suffix){if(language in sh_requests){sh_requests[language].push(element);return}sh_requests[language]=[element];var request=sh_getXMLHttpRequest();var url=prefix+"sh_"+language+suffix;request.open("GET",url,true);request.onreadystatechange=function(){if(request.readyState===4){try{if(!request.status||request.status===200){eval(request.responseText);var elements=sh_requests[language];for(var i=0;i<elements.length;i++){sh_highlightElement(elements[i],sh_languages[language])}}else{throw"HTTP error: status "+request.status}}finally{request=null}}};request.send(null)}function sh_highlightDocument(g,k){var b=document.getElementsByTagName("pre");for(var e=0;e<b.length;e++){var f=b.item(e);var a=sh_getClasses(f);for(var c=0;c<a.length;c++){var h=a[c].toLowerCase();if(h==="sh_sourcecode"){continue}if(h.substr(0,3)==="sh_"){var d=h.substring(3);if(d in sh_languages){sh_highlightElement(f,sh_languages[d])}else{if(typeof(g)==="string"&&typeof(k)==="string"){sh_load(d,f,g,k)}else{throw'Found <pre> element with class="'+h+'", but no such language exists'}}break}}}};

        </script>
        <script type="text/javascript" src="sh_css.js"></script>
    </head>
    <body onload="sh_highlightDocument();">
        <h1><?php echo TITLE; ?></h1>
        <?php if (isset($_GET['what']) === true) { ?>
            <h2>RX*CSSについて</h2>
            <div style="padding:10px;">
                <p>RX*CSSはCSSのオプティマイザと可読性の向上を目的としたCSSパーサーです。</p>
                <p>他のCSSオプティマイザには無いような、セレクタの内容が重複している場合の結合や、セレクタの分割などの機能を取り入れています。</p>
                <p>また、機能はオプティマイザだけではなく可読性を向上させるために様々なフォーマットで出力が可能です。</p>
            </div>
        <?php } else if (isset($_GET['feature']) === true) { ?>
            <h2>注釈</h2>
            <ol style="padding:10px;">
                <li>プロパティ名の整合性はチェックしません。これは<a href="http://www.ietf.org/rfc/rfc2318.txt">RFC 2318</a>により不明なプロパティ名は無視する必要性がある為です。</li>
                <li>現段階では開発版ですので、内部エラーなどが出る可能性があります。</li>
            </ol>
            <h2>特徴</h2>
            <ol style="padding:10px;">
                <li>高速な処理(100行のコードで1回あたり0.01秒)</li>
                <li>オープンソース</li>
                <li>様々な形式で出力可能</li>
                <li>@ルール対応</li>
                <li>内容が重複しているセレクタを結合可能</li>
                <li>内容が存在しないセレクタを除去</li>
                <li>カンマで区切られている複数のセレクタを分割可能</li>
                <li>セレクタ名とプロパティ名のソート</li>
                <li>プロパティ名の小文字化</li>
                <li>同名のセレクタがある場合、1つに結合します。</li>
            </ol>
            <h2>対応予定</h2>
            <ol style="padding:10px;">
                <li>省略系のプロパティを詳細記述にする（現在はpadding, margin, borderのみ対応）</li>
                <li>複数のプロパティを1つにまとめられる場合はまとめられるようにする</li>
            </ol>
        <?php } else if (isset($_GET['view']) === true) { ?>
            <p style="padding:10px;">ファイル更新日：<?php echo date('Y/m/d H:i:s', filemtime('CSSParser.php')) ?></p>
            <div style="padding:10px;">
                <?php highlight_string (file_get_contents('CSSParser.php')); ?>
            </div>
        <?php } else { ?>
            <div class="a">
                <form action="./" method="post">
                    <p><textarea id="paste" name="css"><?php

    if (sizeof($_POST) > 0 && isset($_POST['css']) === true) {

        include 'CSSParser.php';
        $format = isset($_POST['a']) === false || is_array($_POST['a']) ? 0 : (int) $_POST['a'];
        $format = ($format < 0 || $format > 3) ? 0 : $format;
        switch ($format) {
            case 0:
                $format = CSSParser::OUTPUT_FORMAT_BEATIFUL;
            break;
            case 1:
                $format = CSSParser::OUTPUT_FORMAT_GNU;
            break;
            case 2:
                $format = CSSParser::OUTPUT_FORMAT_ONELINE;
            break;
            case 3:
                $format = CSSParser::OUTPUT_FORMAT_MINIFY;
            break;
        }
        $merge = isset($_POST['b']) === false || is_array($_POST['b']) ? 1000 : (int) $_POST['b'];
        $merge = ($merge < 1000 || $merge > 1001) ? 1000 : $merge;
        switch ($merge) {
            case 1000:
                $merge = CSSParser::OPTION_DUPLICATE_MERGE;
            break;
            case 1001:
                $merge = CSSParser::OPTION_COMMA_SEPARATE;
            break;
        }
        $or = isset($_POST['c']) === false || is_array($_POST['c']) ? 0 : CSSParser::OPTION_OVERRIDE_PROPERTY;
        $prop = isset($_POST['g']) === false || is_array($_POST['g']) ? 0 : CSSParser::OPTION_REWRITE_PROPERTY;
        $delim = isset($_POST['h']) === false || is_array($_POST['h']) ? 0 : CSSParser::OUTPUT_WITHOUT_LAST_DELIM;

        $c = array(
            isset($_POST['i']) === true ? CSSParser::COLOR_HEX_TO_MINIFY : 0,
            isset($_POST['j']) === true ? CSSParser::COLOR_HEX_TO_FULL : 0,
            isset($_POST['k']) === true ? CSSParser::COLOR_HEX_TO_RGB : 0,
            isset($_POST['l']) === true ? CSSParser::COLOR_HEX_TO_NAME : 0,
            isset($_POST['m']) === true ? CSSParser::COLOR_RGB_TO_HEX : 0,
            isset($_POST['n']) === true ? CSSParser::COLOR_RGB_TO_NAME : 0,
            isset($_POST['o']) === true ? CSSParser::COLOR_NAME_TO_HEX : 0,
            isset($_POST['p']) === true ? CSSParser::COLOR_NAME_TO_RGB : 0
        );
        $val = 0;
        foreach ($c as $d) {
            $val |= $d;
        }

        $ind = isset($_POST['e']) === false || is_array($_POST['e']) ? 4000 : (int) $_POST['e'];
        $ind = ($ind < 4000 || $ind > 4001) ? 4000 : $ind;
        switch ($ind) {
            case 4000:
                $ind = CSSParser::OUTPUT_INDENT_SPACE;
            break;
            case 4001:
                $ind = CSSParser::OUTPUT_INDENT_TAB;
            break;
        }

        $indsize = isset($_POST['f']) === false || is_array($_POST['f']) ? 4 : (int) $_POST['f'];
        $indsize = ($indsize < 1 || $indsize > 16) ? 1 : $indsize;

        $data = CSSParser::minify($_POST['css'], $indsize, $format | $merge | $delim | $or | $prop | $val | $ind);
        echo $data;
    }

?></textarea></p>
                    <div style="padding:10px;">
                        <?php if (sizeof($_POST) > 0 && isset($_POST['css']) === true) { ?>
                            <?php
                                $percent = (strlen($data) / (strlen($_POST['css']) === 0 ? 1 : strlen($_POST['css']))) * 100;
                            ?>
                            <h2>最適化率</h2>
                            <div style="padding:10px;">
                                <p>最適化前のサイズ：<strong><?php echo number_format(strlen($_POST['css'])); ?></strong></p>
                                <p>最適化後のサイズ：<strong><?php echo number_format(strlen($data)); ?></strong></p>
                                <p>最適化率：<strong><?php echo 100 - floor($percent); ?>%</strong></p>
                            </div>
                        <?php } ?>
                        <h2>出力形式</h2>
                        <ul style="padding : 10px ;">
                            <li><label><input type="radio" name="a" value="0" <?php if (isset($format) === false || $format === CSSParser::OUTPUT_FORMAT_BEATIFUL) { ?>checked="checked"<?php } ?> />一般的な形式</label></li>
                            <li><label><input type="radio" name="a" value="1" <?php if (isset($format) === true && $format === CSSParser::OUTPUT_FORMAT_GNU) { ?>checked="checked"<?php } ?> />GNU形式</label></li>
                            <li><label><input type="radio" name="a" value="2" <?php if (isset($format) === true && $format ===  CSSParser::OUTPUT_FORMAT_ONELINE) { ?>checked="checked"<?php } ?> />ワンライン形式</label></li>
                            <li><label><input type="radio" name="a" value="3" <?php if (isset($format) === true && $format ===  CSSParser::OUTPUT_FORMAT_MINIFY) { ?>checked="checked"<?php } ?> />圧縮形式</label></li>
                        </ul>
                        <h2>結合オプション</h2>
                        <ul style="padding : 10px ;">
                            <li><label><input type="radio" name="b" value="1000" <?php if (isset($merge) === false || $merge === CSSParser::OPTION_DUPLICATE_MERGE) { ?>checked="checked"<?php } ?> />内容が重複しているセレクタを結合する</label></li>
                            <li><label><input type="radio" name="b" value="1001" <?php if (isset($merge) === true && $merge === CSSParser::OPTION_COMMA_SEPARATE) { ?>checked="checked"<?php } ?> />結合されているセレクタを分割する</label></li>
                        </ul>
                        <h2>プロパティオプション</h2>
                        <ul style="padding : 10px ;">
                            <li><label><input type="checkbox" name="c" value="2000" <?php if (isset($or) === false || $or === CSSParser::OPTION_OVERRIDE_PROPERTY) { ?>checked="checked"<?php } ?> />同名のプロパティをオーバーライド（上書き）する</label></li>
                            <li><label><input type="checkbox" name="g" value="2001" <?php if (isset($prop) === true && $prop === CSSParser::OPTION_REWRITE_PROPERTY) { ?>checked="checked"<?php } ?> />省略系のプロパティを詳細に記述する</label></li>
                            <li><label><input type="checkbox" name="d" value="3000" disabled="disabled" />まとめられるプロパティを1つにまとめる</label></li>
                            <li><label><input type="checkbox" name="h" value="2002" <?php if (isset($delim) === false || $delim === CSSParser::OUTPUT_WITHOUT_LAST_DELIM) { ?>checked="checked"<?php } ?> />最後のプロパティの後ろにデリミタを追加しない</label></li>
                        </ul>
                        <h2>値オプション</h2>
                        <ul style="padding : 10px ;">
                            <li><label><input type="checkbox" name="i" <?php if (isset($c[0]) === true && $c[0] !== 0) { ?>checked="checked"<?php } ?> />3桁で書けるカラーコードは3桁で書く</label></li>
                            <li><label><input type="checkbox" name="j" <?php if (isset($c[1]) === true && $c[1] !== 0) { ?>checked="checked"<?php } ?> />3桁のカラーコードを6桁に治す</label></li>
                            <li><label><input type="checkbox" name="k" <?php if (isset($c[2]) === true && $c[2] !== 0) { ?>checked="checked"<?php } ?> />カラーコードをrgb(R, G, B)にする</label></li>
                            <li><label><input type="checkbox" name="l" <?php if (isset($c[3]) === true && $c[3] !== 0) { ?>checked="checked"<?php } ?> />カラーコードを変換可能な場合、カラーネームにする</label></li>
                            <li><label><input type="checkbox" name="m" <?php if (isset($c[4]) === true && $c[4] !== 0) { ?>checked="checked"<?php } ?> />rgb(R, G, B)をカラーコードにする</label></li>
                            <li><label><input type="checkbox" name="n" <?php if (isset($c[5]) === true && $c[5] !== 0) { ?>checked="checked"<?php } ?> />rgb(R, G, B)を変換可能な場合、カラーネームにする</label></li>
                            <li><label><input type="checkbox" name="o" <?php if (isset($c[6]) === true && $c[6] !== 0) { ?>checked="checked"<?php } ?> />カラーネームをカラーコードにする</label></li>
                            <li><label><input type="checkbox" name="p" <?php if (isset($c[7]) === true && $c[7] !== 0) { ?>checked="checked"<?php } ?> />カラーネームをrgb(R, G, B)にする</label></li>
                        </ul>
                        <p class="n">※<span class="b">変換優先度</span> HexToRGB > RGBToHex > HexToName > NameToHex > RGBToName > NameToRGB > 3桁変換 > 6桁変換</p>
                        <p class="n">※<span class="b">Hex</span> = カラーコード, <span class="b">Name</span> = カラーネーム</p>
                        <h2>インデントオプション</h2>
                        <ul style="padding : 10px ;">
                            <li><label><input type="radio" name="e" value="4000" <?php if (isset($ind) === false || $ind === CSSParser::OUTPUT_INDENT_SPACE) { ?>checked="checked"<?php } ?> />スペース</label></li>
                            <li><label><input type="radio" name="e" value="4001" <?php if (isset($ind) === true && $ind === CSSParser::OUTPUT_INDENT_TAB) { ?>checked="checked"<?php } ?> />タブ</label></li>
                            <li>幅：<input type="text" name="f" value="4" /></li>
                        </ul>
                    </div>
                    <p style="text-align:right;"><input type="submit" value="整形する"></p>
                </form>
                <div>
                    <h2>出力形式のサンプル</h2>
                    <dl>
                        <dt>一般的な形式</dt>
                        <dd>
                            <pre class="sh_css">.sample1 {
    property1 : value ;
    property2 : value ;
}
.sample2 > .sample3 {
    property3 : value ;
    property4 : value ;
}</pre>
                        </dd>
                        <dt>GNU形式</dt>
                        <dd>
                            <pre class="sh_css">.sample
{
    property1 : value ;
    property2 : value ;
}
.sample2 > .sample3
{
    property3 : value ;
    property4 : value ;
}</pre>
                        </dd>
                        <dt>ワンライン形式</dt>
                        <dd>
                            <pre class="sh_css">.sample { property1 : value ; property2 : value ; }
.sample2 > .sample3 { property3 : value ; property4 : value ; }</pre>
                        </dd>
                        <dt>圧縮形式</dt>
                        <dd>
                            <pre class="sh_css">.sample{property1:value;property2:value}.sample2>.sample3{
property3:value;property4:value}</pre>
                        </dd>
                    </dl>
                </div>
            </div>
        <?php } ?>
        <p><a href="https://twitter.com/share" class="twitter-share-button" data-via="re_exe_memory" data-lang="ja">ツイート</a><script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script><iframe src="http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fre-exe.jp%2Fcssparser%2F&layout=button_count&show_faces=false&width=100&action=like&colorscheme=light&height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:100px; height:21px;" allowTransparency="true"></iframe></p>
        <hr />
        <p style="padding-bottom:120px;"><a href="./">トップページ</a>&nbsp;-&nbsp;<a href="./?what">RX*CSSについて</a>&nbsp;-&nbsp;<a href="./?feature">特徴・注釈・対応予定</a>&nbsp;-&nbsp;<a href="./?view">ソースコード</a>&nbsp;-&nbsp;作者：<a href="http://twitter.com/re_exe_memory">@re_exe_memory</a></p>
    </body>
</html>