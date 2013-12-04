<?php

class StyleTableSeeder extends Seeder
{
	// SAVE ME THIS FILE IS SO UGLY
	public function run()
	{
		DB::table('styles')->truncate();

		$styles = array(
			array(
				'title' => 'My Amazing Style',
				'slug' => 'my-amazing-style',
				'description' => 'The most amazing style *ever*.',
				'source' => '/*
   This document has been created with Marked.app <http://marked2app.com>
   Please leave this notice in place, along with any additional credits below.
   ---------------------------------------------------------------
   Title: My Amazing Style
   Author: Matt Stauffer <http://markedstyle.com>
   Description: The most amazing style ever
*/

   body {
   	background: red;
   }',
	   			'format' => 'css',
	   			'author_id' => '1'
			),
			array(
				'title' => 'Avenue',
				'slug' => 'avenue',
				'description' => 'modern retro',
				'source' => '/*
This document has been created with Marked.app <http://markedapp.com>, Copyright 2011 Brett Terpstra
Please leave this notice in place, along with any additional credits below.
---------------------------------------------------------------
Title: Avenue
Author: Bram de Haan <http://atelierbramdehaan.nl>
Description: modern retro
 */

* {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}
html, body, div, span, applet, object, iframe, h1, h2, h3, h4, h5, h6, p, blockquote, pre, a, abbr, acronym, address, big, cite, code, del, dfn, em, img, ins, kbd, q, s, samp, small, strike, strong, sub, sup, tt, var, b, u, i, center, dl, dt, dd, ol, ul, li, fieldset, form, label, legend, table, caption, tbody, tfoot, thead, tr, th, td, article, aside, canvas, details, embed, figure, figcaption, footer, header, hgroup, menu, nav, output, ruby, section, summary, time, mark, audio, video {
  margin: 0;
  padding: 0;
  border: 0;
  font: inherit;
  font-size: 100%;
  vertical-align: baseline;
}
table {
  border-collapse: collapse;
  border-spacing: 0;
}
caption, th, td {
  text-align: left;
  font-weight: normal;
  vertical-align: middle;
}
q, blockquote {
  quotes: none;
}
q:before, q:after, blockquote:before, blockquote:after {
  content: "";
  content: none;
}
a img {
  border: none;
}
article, aside, details, figcaption, figure, footer, header, hgroup, menu, nav, section, summary {
  display: block;
}
button, input {
  line-height: normal;
}
button, input, select, textarea {
  font-size: 100%;
  margin: 0;
  vertical-align: baseline;
  /* vertical-align: middle; */
}
button, input[type="button"], input[type="reset"], input[type="submit"] {
  cursor: pointer;
  /* overflow: visible; */
}
button::-moz-focus-inner, input::-moz-focus-inner {
  border: 0;
  padding: 0;
}
textarea {
  overflow: auto;
  vertical-align: top;
  resize: vertical;
}
body {
  -webkit-font-smoothing: antialiased;
  padding: 0 !important;
}
#wrapper {
  margin-bottom: 0;
}
#wrapper img {
  max-width: 100%;
  height: auto;
}
#wrapper dd {
  margin-bottom: 1em;
}
#wrapper li > p:first-child {
  margin: 0;
}
#wrapper caption, #wrapper col, #wrapper colgroup, #wrapper table, #wrapper tbody, #wrapper td, #wrapper tfoot, #wrapper th, #wrapper thead, #wrapper tr {
  border-spacing: 0;
}
#wrapper table {
  border: 1px solid rgba(0, 0, 0, 0.25);
  border-collapse: collapse;
  display: table;
  empty-cells: hide;
  margin: -1px 0 23px;
  padding: 0;
  table-layout: fixed;
  width: 100%;
}
#wrapper caption {
  display: table-caption;
  font-weight: 700;
}
#wrapper col {
  display: table-column;
}
#wrapper colgroup {
  display: table-column-group;
}
#wrapper tbody {
  display: table-row-group;
}
#wrapper tfoot {
  display: table-footer-group;
}
#wrapper thead {
  display: table-header-group;
  border-bottom: solid 1px #999;
}
#wrapper td, #wrapper th {
  display: table-cell;
}
#wrapper tr {
  display: table-row;
}
#wrapper table th, #wrapper table td {
  font-size: 1.1rem;
  line-height: 1.5;
  padding: 0 1em;
}
#wrapper dt, #wrapper th {
  font-weight: 700;
}
#wrapper dd {
  padding-left: 1.4em;
}
#wrapper table tr:nth-child(even) {
  background: rgba(200, 200, 200, 0.25);
}
#wrapper figure {
  display: inline-block;
  position: relative;
  margin: 1em 0 2em;
}
#wrapper figcaption {
  font-family: AvenirNext-Italic, AvenirNext-Regular, Futura, "Century Gothic", AppleGothic, Corbel, "Myriad Pro", "Lucida Grande", "Trebuchet Ms", sans-serif;
  font-style: italic;
  text-align: center;
}
#wrapper figure:hover > figcaption {
  /* background: rgba(0,0,0,1) */
} 
#wrapper pre {
  display: block;
  margin: 1.4em auto;
  background: #FAF8F5;
  padding: 15px 10px 10px;
  -webkit-border-radius: 8px;
  -moz-border-radius: 8px;
  -ms-border-radius: 8px;
  -o-border-radius: 8px;
  border-radius: 8px;
  border: solid 1px #ddd;
  font-family: Consolas, Menlo, Monaco, monospace !important;
  font-size: .875rem;
  max-width: 90%;
}
.poetry #wrapper pre {
  display: block;
  font-family: Georgia, Garamond, serif !important;
  font-size: 110% !important;
  font-style: italic;
  line-height: 1.6;
  margin-left: 1em;
}
.poetry #wrapper pre code {
  font-family: Georgia, Garamond, serif !important;

}
#wrapper sup, #wrapper sub, #wrapper a.footnote {
  font-size: 1.4ex;
  height: 0;
  line-height: 1;
  position: relative;
  vertical-align: super;
}
#wrapper sub {
  vertical-align: sub;
  top: -1px;
}
#wrapper .footnote {
  font-size: .8rem;
  vertical-align: super;
}
#wrapper .footnotes p {
  font-size: 1.9ex;
}
#wrapper ul ul {
  margin-left: 1em;
}

@media print {
  body {
    overflow: auto;
  }

  img, pre, blockquote, table, figure, p {
    page-break-inside: avoid;
  }

  #wrapper {
    background: #fff;
    color: #111;
    font-size: 85%;
    padding: 10px;
    position: relative;
    text-indent: 0;
  }
}

@media screen {
  .inverted #wrapper, .inverted {
    background: #222;
  }

  .inverted hr {
    border-color: #999 !important;
  }

  .inverted p, .inverted td, .inverted li, .inverted h1, .inverted h2, .inverted h3, .inverted h4, .inverted h5, .inverted h6, .inverted pre, .inverted code, .inverted th, .inverted .math, .inverted caption, .inverted dd, .inverted dt {
    color: #eee !important;
  }

  .inverted table tr:nth-child(odd), .inverted table th:nth-child(odd), .inverted table td:nth-child(odd) {
    background: none;
  }

  .inverted a {
    color: #ff5778;
  }
}
.max-width {
  max-width: 100%;
  height: auto;
}
/* ::Base styles Almost exclusively single element selectors */
/* ------------------------------------------------------------ */
html {
  font-size: 100%;
}
body {
  font: 100%/1.388 AvenirNext-Regular, Futura, "Century Gothic", AppleGothic, Corbel, "Myriad Pro", "Lucida Grande", "Trebuchet Ms", sans-serif;
  color: #111;
  padding: 0 5% 1rem !important;
}
a {
  color: crimson;
}
a:hover, a:focus, a:active {
  color: #ff2450;
}
h1, h2, h3, h4, h5, h6 {
  font-family: AvenirNextCondensed-DemiBold, AvenirNext-Regular, Futura, "Century Gothic", AppleGothic, Corbel, "Myriad Pro", "Lucida Grande", "Trebuchet Ms", sans-serif;
  /* margin: 0; */
  padding: .5em 0 0;
}
h2, h3, h4, h5 {
  border-bottom: 1px solid #777;
}
h1 {
  font-size: 2.25rem;
  line-height: 1.11111;
}
h2 {
  font-size: 1.875rem;
  line-height: 1.33333;
}
h3 {
  font-size: 1.375rem;
  line-height: 1.45455;
}
h4 {
  font-size: 1.25rem;
  line-height: 1.2;
}
h5 {
  font-size: 1.125rem;
  line-height: 1.33333;
}
h6 {
  font-size: 1rem;
  line-height: 1.5;
}
pre, label {
  font-size: 1rem;
  line-height: 1.5;
}
p {
  font-size: 1.388rem;
  line-height: 1.33333;
  /* margin: 0; */
  padding: .5em 0;
  max-width: 30em;
}
h2 + p,
h3 + p,
h4 + p,
h5 + p {
  padding-top: 0;
  margin-top: 1px;
  border-top: 1px solid #999;
}
ol, ul {
  font-size: 1rem;
  line-height: 1.5;
  margin: 0 0 2em 0;
}
li {
  line-height: auto;
}
ul {
  list-style-position: outside;
  list-style-type: square;

ol {
  list-style-position: outside;
  list-style-type: decimal;
}
strong, b {
  font-family: AvenirNext-Bold, AvenirNextCondensed-DemiBold, AvenirNext-Regular, Futura, "Century Gothic", AppleGothic, Corbel, "Myriad Pro", "Lucida Grande", "Trebuchet Ms", sans-serif;
  font-weight: 600;
}
em, i, q {
  font-family: AvenirNext-BoldItalic, AvenirNext-Italic, AvenirNext-Regular, Futura, "Century Gothic", AppleGothic, Corbel, "Myriad Pro", "Lucida Grande", "Trebuchet Ms", sans-serif;
  font-style: italic;
}
blockquote {
  padding-left: 1em;
  border-left: 0.3125em solid #c0c0c0;
  line-height: normal;
  /* margin: 0; */
}
blockquote p {
  font-family: AvenirNext-Italic, AvenirNext-Regular, Futura, "Century Gothic", AppleGothic, Corbel, "Myriad Pro", "Lucida Grande", "Trebuchet Ms", sans-serif;
  font-style: italic;
  /* margin: 0; */
  font-size: 1.25rem;
  line-height: 1.2;
  margin: 1.2em 0 1.2em 0;
}

@media screen and (max-width: 750px) {
  -webkit-text-size-adjust: none;
}',
				'format' => 'css',
				'author_id' => 2
			),
			array(
				'title' => 'Kult',
				'slug' => 'kult',
				'description' => 'Easy to read',
				'source' => '/*
   This document has been created with Marked.app <http://marked2app.com>
   Please leave this notice in place, along with any additional credits below.
   ---------------------------------------------------------------
   Title: Kult
   Author: Peter Sziebig - @bigpe
   Description: Easy to read
*/

@font-face {
    font-family: "Ubuntu";
    font-style: normal;
    font-weight: 300;
    src: local("Ubuntu Light"), local("Ubuntu-Light"), url("http://themes.googleusercontent.com/static/fonts/ubuntu/v4/WtcvfJHWXKxx4x0kuS1kobO3LdcAZYWl9Si6vvxL-qU.woff") format("woff");
}
@font-face {
    font-family: "Ubuntu";
    font-style: normal;
    font-weight: 400;
    src: local("Ubuntu"), url("http://themes.googleusercontent.com/static/fonts/ubuntu/v4/CGXpU_uR_FUfdeyCjAWgZ-vvDin1pK8aKteLpeZ5c0A.woff") format("woff");
}
@font-face {
    font-family: "Ubuntu";
    font-style: normal;
    font-weight: 500;
    src: local("Ubuntu Medium"), local("Ubuntu-Medium"), url("http://themes.googleusercontent.com/static/fonts/ubuntu/v4/gMhvhm-nVj1086DvGgmzB7O3LdcAZYWl9Si6vvxL-qU.woff") format("woff");
}
@font-face {
    font-family: "Ubuntu";
    font-style: normal;
    font-weight: 700;
    src: local("Ubuntu Bold"), local("Ubuntu-Bold"), url("http://themes.googleusercontent.com/static/fonts/ubuntu/v4/nsLtvfQoT-rVwGTHHnkeJrO3LdcAZYWl9Si6vvxL-qU.woff") format("woff");
}
@font-face {
    font-family: "Ubuntu";
    font-style: italic;
    font-weight: 300;
    src: local("Ubuntu Light Italic"), local("Ubuntu-LightItalic"), url("http://themes.googleusercontent.com/static/fonts/ubuntu/v4/DZ_YjBPqZ88vcZCcIXm6VqfTCPadK0KLfdEfFtGWCYw.woff") format("woff");
}



html {
    font-size: 100%;
}
html, button, input, select, textarea {
    font-family: sans-serif;
}

html, body, button, input, select, textarea {
    color: #57534A;
    font-family: "Ubuntu","Myriad Pro","Myriad",sans-serif;
    font-size: 18px;
	font-weight: 300;
}

body{
    margin: 0 auto;
    background-color: #FFFFFF;
}

body, textarea {
    line-height: 1.4;
}


body:after {
    clear: both;
    content: "";
    display: table;
}

body {
    padding-left: 6rem;
    padding-right: 6rem;
    margin-left: auto;
    margin-right: auto;
    max-width: 42rem;
    display: block;
}



h1, h2, h3, dt {
    color: #423F37;
    font-weight: 700;
}

h1 {
    font-size: 2em;
    margin: 0.67em 0;
}
h2, .article-list .article-title {
    font-size: 1.5em;
    margin: 0.83em 0;
}
h3, dt {
    font-size: 1.17em;
    margin: 1em 0;
}
h4 {
    font-size: 1em;
    margin: 1.33em 0;
}
h5 {
    font-size: 0.83em;
    margin: 1.67em 0;
}
h6 {
    font-size: 0.75em;
    margin: 2.33em 0;
}


a {
    color: #8DB359;
    cursor: pointer;
    outline: 0 none;
    text-decoration: underline;
}

a:hover {
    outline: 0 none;
    color: #739544;
}


p, pre {
    margin: 1em 0;
}
code, kbd, pre, samp {
    font-family: monospace,serif;
    font-size: 1em;
    margin: 0;
    padding: 0;

}
pre {
    white-space: pre-wrap;
    word-wrap: break-word;
}

pre {
    background-color: #F8F5F0;
    font-size: 0.7rem;
    overflow-x: auto;
    padding: 1.3rem;
    position: relative;
    white-space: pre;
    word-wrap: normal;
}
pre, code, kbd, samp {
    margin: 0;
}
code, kbd, pre, samp {
    font-family: monospace,serif;
}

code {
    color: #423F37;
}


aside {
    display: block;
    float: right;
    width: 390px;
}


b, strong {
    font-weight: bold;
    color: #423F37;
    font-weight: 700;
}

blockquote {
    color: #423F37;
    font-size: 1.25em;
    font-weight: 700;
	margin: 1em 40px;
}

blockquote {
    margin-bottom: 2em;
    margin-top: 2em;
}

figure {
	margin-left: -4.5rem;
    margin-right: -4.5rem;
    margin-bottom: 2em;
    margin-top: 2em;
}


hr {
    -moz-border-bottom-colors: none;
    -moz-border-left-colors: none;
    -moz-border-right-colors: none;
    -moz-border-top-colors: none;
    border-color: -moz-use-text-color -moz-use-text-color #ECE6DA;
    border-image: none;
    border-style: none none solid;
    border-width: medium medium 1px;
    margin: 3em 6em;
}


img {
    max-width: 100%;
    display: block;
    border: 0 none;
}


ol > li:before {
    color: #423F37;
    content: counter(ol, decimal) ".";
    counter-increment: ol;
    font-weight: 700;
    margin-right: 0.333em;
    position: absolute;
    right: 100%;
}

ul > li:before {
    background-color: #423F37;
    border-radius: 14px 14px 14px 14px;
    content: "";
    height: 6px;
    margin-right: 0.333em;
    margin-top: 0.55em;
    position: absolute;
    right: 100%;
    width: 6px;
}

ol, ul, dl {
    margin-left: 2rem;
    padding: 0;
}
ol {
    counter-reset: ol;
}
li + li, dd + dt {
    margin-top: 0.5em;
}

ul > li {
    position: relative;
}

ol > li {
    position: relative;
}
li {
    list-style: none outside none;
}


figure > figcaption {
    margin-top: 0.5em;
}
small, dd, figcaption {
    color: #A19C91;
    display: block;
    font-size: 0.8rem;
    font-style: italic;
    line-height: 1.2;
}


tbody{display:table-row-group}
tfoot{display:table-footer-group}
table{margin-bottom:2em;font-size: 0.8em;padding:0;border-collapse:collapse;-webkit-box-shadow:1px 1px 2px rgba(0,0,0,.35);width:80%;margin:0 auto 2em auto}
table th,table td{padding:10px 10px 9px;line-height:18px;text-align:left}
table th{
padding-top:9px;!important;text-transform:uppercase;vertical-align:middle}
table td{vertical-align:top;border-top:1px solid #ddd;}
table tbody th{border-top:1px solid #ddd;vertical-align:top}
table{border:1px solid #ddd;border-collapse:separate;*border-collapse:collapse;-webkit-border-radius:4px;-moz-border-radius:4px;border-radius:4px}
table th+th,table td+td,table th+td{border-left:1px solid #ddd}
table thead tr:first-child th:first-child,table tbody tr:first-child td:first-child{-webkit-border-radius:4px 0 0 0;-moz-border-radius:4px 0 0 0;border-radius:4px 0 0 0}
table thead tr:first-child th:last-child,table tbody tr:first-child td:last-child{-webkit-border-radius:0 4px 0 0;-moz-border-radius:0 4px 0 0;border-radius:0 4px 0 0}
table tbody tr:last-child td:first-child{-webkit-border-radius:0 0 0 4px;-moz-border-radius:0 0 0 4px;border-radius:0 0 0 4px}
table tbody tr:last-child td:last-child{-webkit-border-radius:0 0 4px 0;-moz-border-radius:0 0 4px 0;border-radius:0 0 4px 0}
tbody tr:nth-child(odd){background-color:rgba(0,0,0,0.03)}

caption{display:table-caption;font-weight:300;font-size:1.3em;text-transform:uppercase;letter-spacing:2px;word-spacing:.2em;background:rgba(0,0,0,.75);color:#EEE;padding:4px;-webkit-border-radius:4px;margin:4px 0;-webkit-box-shadow:2px 2px 2px rgba(0,0,0,.35)}

/* grey out placeholders */
:-moz-placeholder {
  color: #bfbfbf;
}
::-webkit-input-placeholder {
  color: #bfbfbf;
}


.article-date {
    color: #C7C2B8;
    display: block;
    font-size: 0.8rem;
}',
				'format' => 'css',
				'author_id' => 3
			),
			array(
				'title' => 'Grump',
				'slug' => 'grump',
				'description' => 'Hard on the outside, soft on the inside',
				'source' => '/*
   This document has been created with Marked.app <http://marked2app.com>
   Please leave this notice in place, along with any additional credits below.
   ---------------------------------------------------------------
   Title: Grump
   Author: Brett Terpstra <http://brettterpstra.com>
   Description: Hard on the outside, soft on the inside
*/
* {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box; }

html, body, div, span, applet, object, iframe, h1, h2, h3, h4, h5, h6, p, blockquote, pre, a, abbr, acronym, address, big, cite, code, del, dfn, em, img, ins, kbd, q, s, samp, small, strike, strong, sub, sup, tt, var, b, u, i, center, dl, dt, dd, ol, ul, li, fieldset, form, label, legend, table, caption, tbody, tfoot, thead, tr, th, td, article, aside, canvas, details, embed, figure, figcaption, footer, header, hgroup, menu, nav, output, ruby, section, summary, time, mark, audio, video {
  margin: 0;
  padding: 0;
  border: 0;
  font: inherit;
  font-size: 100%;
  vertical-align: baseline; }

table {
  border-collapse: collapse;
  border-spacing: 0; }

caption, th, td {
  text-align: left;
  font-weight: normal;
  vertical-align: middle; }

q, blockquote {
  quotes: none; }

q:before, q:after, blockquote:before, blockquote:after {
  content: "";
  content: none; }

a img {
  border: none; }

article, aside, details, figcaption, figure, footer, header, hgroup, menu, nav, section, summary {
  display: block; }

button, input {
  line-height: normal; }

button, input, select, textarea {
  font-size: 100%;
  margin: 0;
  vertical-align: baseline;
  *vertical-align: middle; }

button, input[type="button"], input[type="reset"], input[type="submit"] {
  cursor: pointer;
  *overflow: visible; }

button::-moz-focus-inner, input::-moz-focus-inner {
  border: 0;
  padding: 0; }

textarea {
  overflow: auto;
  vertical-align: top;
  resize: vertical; }

body {
  -webkit-font-smoothing: antialiased;
  padding: 0 !important; }

#wrapper {
  margin-bottom: 0; }
  #wrapper img {
    max-width: 100%;
    height: auto; }
  #wrapper dd {
    margin-bottom: 1em; }
  #wrapper li > p:first-child {
    margin: 0; }
  #wrapper caption, #wrapper col, #wrapper colgroup, #wrapper table, #wrapper tbody, #wrapper td, #wrapper tfoot, #wrapper th, #wrapper thead, #wrapper tr {
    border-spacing: 0; }
  #wrapper table {
    border: 1px solid rgba(0, 0, 0, 0.25);
    border-collapse: collapse;
    display: table;
    empty-cells: hide;
    margin: -1px 0 23px;
    padding: 0;
    table-layout: fixed;
    width: 100%; }
  #wrapper caption {
    display: table-caption;
    font-weight: 700; }
  #wrapper col {
    display: table-column; }
  #wrapper colgroup {
    display: table-column-group; }
  #wrapper tbody {
    display: table-row-group; }
  #wrapper tfoot {
    display: table-footer-group; }
  #wrapper thead {
    display: table-header-group;
    border-bottom: solid 1px #999; }
  #wrapper td, #wrapper th {
    display: table-cell; }
  #wrapper tr {
    display: table-row; }
  #wrapper table th, #wrapper table td {
    font-size: 1.1em;
    line-height: 23px;
    padding: 0 1em; }
  #wrapper dt, #wrapper th {
    font-weight: 700; }
  #wrapper dd {
    padding-left: 1.4em; }
  #wrapper table tr:nth-child(even) {
    background: rgba(200, 200, 200, 0.25); }
  #wrapper figure {
    display: inline-block;
    position: relative;
    margin: 1em 0 2em; }
  #wrapper figcaption {
    font-style: italic;
    text-align: center; }
  #wrapper figure:hover > figcaption {
    /* background: rgba(0,0,0,1) */ }
  #wrapper pre {
    display: block;
    margin: 1.4em auto;
    background: #FAF8F5;
    padding: 15px 10px 10px;
    -webkit-border-radius: 8px;
    -moz-border-radius: 8px;
    -ms-border-radius: 8px;
    -o-border-radius: 8px;
    border-radius: 8px;
    border: solid 1px #ddd;
    font-size: .9em; }
    #wrapper pre code {
      overflow: auto; }
  .poetry #wrapper pre {
    display: block;
    font-family: Georgia, Garamond, serif !important;
    font-size: 110% !important;
    font-style: italic;
    line-height: 1.6em;
    margin-left: 1em; }
  .poetry #wrapper pre code {
    font-family: Georgia, Garamond, serif !important; }
  #wrapper sup, #wrapper sub, #wrapper a.footnote {
    font-size: 1.4ex;
    height: 0;
    line-height: 1;
    position: relative;
    vertical-align: super; }
  #wrapper sub {
    vertical-align: sub;
    top: -1px; }
  #wrapper .footnote {
    font-size: .8em;
    vertical-align: super; }
  #wrapper .footnotes p {
    font-size: 1.9ex; }
  #wrapper ul ul, #wrapper ol ol {
    margin-left: 1em; }
  #wrapper li ul, #wrapper li ol {
    margin-bottom: 0; }

@media print {
  body {
    overflow: auto; }

  img, pre, blockquote, table, figure, p {
    page-break-inside: avoid; }

  #wrapper {
    background: #fff;
    color: #303030;
    font-size: 85%;
    padding: 10px;
    position: relative;
    text-indent: 0;
    -webkit-box-shadow: none !important;
    -moz-box-shadow: none !important;
    box-shadow: none !important;
    border: none; } }
@media screen {
  .inverted, .inverted #wrapper {
    background: #252a2a; }
  .inverted hr {
    border-color: #333f40 !important; }
  .inverted p, .inverted td, .inverted li, .inverted h1, .inverted h2, .inverted h3, .inverted h4, .inverted h5, .inverted h6, .inverted pre, .inverted code, .inverted th, .inverted .math, .inverted caption, .inverted dd, .inverted dt {
    color: #fcf9f7 !important; }
  .inverted table tr:nth-child(odd), .inverted table th:nth-child(odd), .inverted table td:nth-child(odd) {
    background: none; }
  .inverted a {
    color: #acd1d5; } }
.max-width {
  max-width: 100%;
  height: auto; }

/* ::Base styles Almost exclusively single element selectors */
/* ------------------------------------------------------------ */
html {
  font-size: 100%; }

body {
  color: #666666;
  font-family: Helvetica, Arial, sans-serif;
  padding-top: 0 !important; }

a {
  color: #3889a9; }
  a:hover, a:focus, a:active {
    color: #7bdaff; }

@font-face {
  font-family: "Roboto Slab";
  font-style: normal;
  font-weight: 400;
  src: local("Roboto Slab Regular"), local("RobotoSlab-Regular"), url("data:font/woff;base64,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d3DfK/tO7zuPGY4CE46Wc8kGLpNfy3Pyprwli+Vt+wayVFbLx7IGH75OvsCDbyT6bpYtUikx2S414kqteERjX+L2raN55/iDI+Z9o1NEXGOvE1c84opHXPGIKR7xwyN2eMQKEyc84oRHXPCICx6+38Pne/h6Dz/v4ec9fLyHD/bwwR4+2MMHe/hgD9/p4Tc9fKaHv/Twlx7+0sNfevhLD3/p4S89fKWHn/TwkR7+0cOPefglD59k/JGH7zF+x8PfePgWD9/i4Vs8/InxHR5722Nve+xtj73tsbc99rbH3vbY2x7702NveuxLj73oWa59uPbh2odrH659uPbh2odrH659uPbh2odrH659uPbh2odrH659uPbh2odrH659uPbh2odrH659uPbh2odrH659uPbh2odrH659uPbh2odrH659uPbh2odrH659uPbh2odrH659uPbh2odrH659uPbh2odrH659uPbh2odrH659uPbh2odrH6596QZm8InlPrHRJzb6xEaf2OgTG31ikU8c8olBPvHDJ274xAUf3+3jr318o49f9PGJPv7Qxxf6+EEfH+jj51pHr2L0KkavYvQqRq9i9CpGr2L0KkavYvQqRq9i9CpGr2L0KkavYvQqRq9i9CpGr2L0KkavYvQqRq8Ci+UF90h+cI9zLTQZuhn6o7nGDvbZwT472GcH++xgnx3ss4N9drDPDvbZwT472GcH++xgnx3ss4N9drBP3hkis+4AXUoOdzm0FGTYDZpAjjMRmgRdB10fzAAzpMAMKWJwihibImamiJcp4mVKnxvM0OdBF0JX8X0i9BD0CDQNaoAaoQRzDAXtpUB7KZBeCqSXAr2lQG8pkFsKtJYCkaVAYSkQWArklQJ5pUBdKVBXCrSVAl2lQEsp0FIKtJQCLaVASynQUgrkkgK1pEAsKdBKCkSSAo2kQCIpUEgK9JECeaRAHSmQRAoUkQJBpEAHKdBBioifIsqniPIpIniK6J0icqeIkikiZIromCIypoiKKSJiimiYIhKmiIIpImCK6Jci8rVy6cKlC5cuXLpw6cKlC5cuXLpw6cKlC5cuXLpw6cKlC5cuXLqOeVe9O3Dh0oVLFy5duHTh0oVLFy5duHTh0oVLFy5duHTh0oVLFy5duHTh0oVLFy5duHTh0oVLFy5duHTh0oVLFy5duHTh0oVLFy5duHTh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") format("woff"); }

@font-face {
  font-family: "Roboto Slab";
  font-style: normal;
  font-weight: 700;
  src: local("Roboto Slab Bold"), local("RobotoSlab-Bold"), url("data:font/woff;base64,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") format("woff"); }

h1, h2, h3, h4, h5, h6 {
  font-family: "Roboto Slab"; }

h1 {
  font-size: 2.25em;
  line-height: 1.11111em;
  margin: 0 0 0.66667em 0; }

h2 {
  font-size: 1.875em;
  line-height: 1.33333em;
  margin: 1.06667em 0 0.53333em 0; }

h3 {
  font-size: 1.375em;
  line-height: 1.45455em;
  margin: 1.45455em 0 0.72727em 0; }

h4 {
  font-size: 1.25em;
  line-height: 1.2em;
  margin: 0 0 0.4em 0; }

h5 {
  font-size: 1.125em;
  line-height: 1.33333em;
  margin: 0 0 0.44444em 0; }

h6 {
  font-size: 1em;
  line-height: 1.5em;
  margin: 0 0 0.5em 0; }

p, pre, label {
  font-size: 1em;
  line-height: 1.5em;
  margin: 0 0 1em 0; }

ol, ul {
  font-size: 1em;
  line-height: 1.5em;
  margin: 0 0 2em 0; }

li {
  line-height: auto; }

code {
  font-family: menlo, courier, monospace; }

ul {
  list-style-position: outside;
  list-style-type: disc; }

ol {
  list-style-position: outside;
  list-style-type: decimal; }

strong, b {
  font-weight: 600; }

em, i, q {
  font-style: italic; }

blockquote {
  padding-left: 1em;
  border-left: 0.3125em solid grey;
  line-height: normal;
  margin: 0; }
  blockquote p {
    font-style: italic;
    margin: 0;
    font-size: 1.25em;
    line-height: 1.2em;
    margin: 1.2em 0 1.2em 0; }

@media screen and (max-width: 769px) {
  -webkit-text-size-adjust: none; }
body {
  padding: 40px;
  font-size: 1.5em;
  font-family: "Myriad Pro", "Arial";
  background: #fcf9f7; }

#wrapper {
  padding: 50px;
  margin: 0;
  background: #FEFEFE;
  -webkit-box-shadow: 0 0 2px rgba(178, 176, 174, 0.7) inset;
  -moz-box-shadow: 0 0 2px rgba(178, 176, 174, 0.7) inset;
  box-shadow: 0 0 2px rgba(178, 176, 174, 0.7) inset;
  border: solid 1px #737271; }

a:link, a:visited {
  color: #3889a9;
  text-decoration: none;
  -webkit-transition: color 0.1s linear;
  -moz-transition: color 0.1s linear;
  -o-transition: color 0.1s linear;
  transition: color 0.1s linear; }

a:hover, a:active {
  color: #7bdaff;
  -webkit-transition: color 0.15s linear;
  -moz-transition: color 0.15s linear;
  -o-transition: color 0.15s linear;
  transition: color 0.15s linear; }',
				'format' => 'css',
				'author_id' => '4'
			),
			array(
				'title' => 'Ulysses Freestraction Light',
				'slug' => 'ulysses-freestraction-light',
				'description' => 'Based on the Freestraction color scheme used in Ulysses III <http://www.ulyssesapp.com>.
   For more information read the introductory post: http://candlerblog.com/2013/04/11/ulysses-iii-and-marked/ ',
				'source' => '/*
   This document has been created with Marked.app <http://marked2app.com>
   Please leave this notice in place, along with any additional credits below.
   ---------------------------------------------------------------
   Title: Ulysses Freestraction Light
   Author: Jonathan Poritsky <http://candlerblog.com>
   Description: Based on the Freestraction color scheme used in Ulysses III <http://www.ulyssesapp.com>.
   For more information read the introductory post: http://candlerblog.com/2013/04/11/ulysses-iii-and-marked/ 
*/

html {
	background-color: #f3f3f3;
	color: #656565;
}
body {
	margin-left:auto;
	margin-right:auto;
	padding: 2em;
	border: 0;
	font-size: 1em;
	line-height: 1.7em;
	font-family: "Source Sans Pro","Helvetica Neue",Helvetica,sans-serif;
	max-width: 35em;
}
a {
	padding:0 0.3em 0.1em 0.3em;
    color: #656565;
	background: #f7f7f7;
    text-decoration:none;
    border: 1px solid #d4d4d4;
	border-radius: 4px;
}
a:hover {
	padding:0 0.3em 0.1em 0.3em;
    text-decoration: none;
    background:-webkit-gradient(linear, 80% 20%, 80% 100%, from(#315983), to(#224C78));
    color: #f7ffff;
    border-top: 1px solid rgb(69,105,143);
    border-bottom: 1px solid rgb(47,76,105);
    border-right: 1px solid rgb(47,76,105);
    border-left: 1px solid rgb(47,76,105);
	border-radius: 4px;
	box-shadow: 0px 0px 0px 1px rgb(47,76,105);;
}
h1, h2, h3, h4, h5, h6 {
	text-align: center;
	color: rgb(12,139,186);	
	line-height: 1;
	font-weight: 600;
	font-family: "Minion Pro","Chaparral Pro",Georgia,serif;
}

h1 {
	font-size: 2em;
}
h2 {
	font-size: 1.6em;
}
h3 {
	font-size: 1.4em;
}
h4 {
	font-size: 1.2em;
}
h5 {
	font-size: 1.1em;
}
h6 {
	font-style: italic;
	font-size: 1em;
}

ol, ul {
	margin-left: -15px;
	margin-right: 25px;
}

ul li {
     list-style: none;
   }

ul li:before {
	content:"\2010";
	display: block;
	position: relative;
	max-width: 0;
	max-height: 0;
	left: -.8em;
	top: -.1em;
	color: rgb(12,139,186);
	font-size:1.2em;
}


   
li {
	font-size: .9em;
}

li p {
	-webkit-margin-before: 0;
	-webkit-margin-after: 0;
}

.footnote {
	font-size: 50%;
	vertical-align: super;
}
div.footnotes {
	font-size: 80%;
}
pre, code {
	white-space: pre-wrap;
}
blockquote {
	background:rgb(230,230,230);
	display: block;
	font-style:italic;
	font-weight:200;
	color: rgb(12,139,186);	
	padding:0.2em 2em 0.2em 2em;
	-webkit-margin-before: 1em;
	-webkit-margin-after: 1em;
	-webkit-margin-start: 0;
	-webkit-margin-end: 0;
}

code {
	font-family: Inconsolata,"Courier Prime",mono;
	font-size:80%;
	padding: 2px;
	color: rgb(20,126,73);
	background: rgb(224,232,228);
}',
				'format' => 'css',
				'author_id' => '4'
			),
			array(
				'title' => 'Amblin',
				'slug' => 'amblin',
				'description' => 'A clean theme with bold headlines and carefully crafted typography.
Non-standard fonts used:
	* Rockwell (Installed by Microsoft Office)
	* Rokkit (Fallback, available at <http://www.fontsquirrel.com/fontface>)
Download @font-face kits from <http://www.fontsquirrel.com/fontface>. Woff versions included as data uris.',
				'source' => File::get('app/assets/default-styles/amblin.css'),
				'format' => 'css',
				'author_id' => '5'
			),
			array(
				'title' => 'Antique',
				'slug' => 'antique',
				'description' => 'An "antiqued" theme with off-white background and serif typography',
				'source' => File::get('app/assets/default-styles/antique.css'),
				'format' => 'css',
				'author_id' => '4'
			),
			array(
				'title' => 'Github',
				'slug' => 'github',
				'description' => 'Github README style. Includes theme for Pygmentized code blocks.',
				'source' => File::get('app/assets/default-styles/github.css'),
				'format' => 'css',
				'author_id' => '4'
			),
			array(
				'title' => 'Lopash',
				'slug' => 'lopash',
				'description' => 'Clean, bouyant fonts and highly readable text',
				'source' => File::get('app/assets/default-styles/Lopash.css'),
				'format' => 'css',
				'author_id' => '5'
			),
			array(
				'title' => 'Manuscript',
				'slug' => 'manuscript',
				'description' => 'Courier, Double-spaced, paragraph indent. Use `###### #` to create "#" centered dividers',
				'source' => File::get('app/assets/default-styles/manuscript.css'),
				'format' => 'css',
				'author_id' => '4'
			),
			array(
				'title' => 'Swiss',
				'slug' => 'swiss',
				'description' => 'Clean, Swiss typography with no frills.',
				'source' => File::get('app/assets/default-styles/swiss.css'),
				'format' => 'css',
				'author_id' => '4'
			),
			array(
				'title' => 'Upstanding Citizen',
				'slug' => 'upstanding-citizen',
				'description' => 'A modern layout with bold headlines
Non-standard fonts used:
	* OSPDIN
	* League Gothic
	* Fjord
	* Inconsolata
Download @font-face kits from <http://www.fontsquirrel.com/fontface>. Woff versions included as data uris.',
				'source' => File::get('app/assets/default-styles/UpstandingCitizen.css'),
				'format' => 'css',
				'author_id' => '4'
			),
/* Sample
			array(
				'title' => '',
				'slug' => '',
				'description' => '',
				'source' => '',
				'format' => '',
				'author_id' => ''
			)
*/
		);

		DB::table('styles')
			->insert($styles);
	}
}
