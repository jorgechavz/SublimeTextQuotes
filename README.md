<h1>Sublime Text Quotes</h1>
<p>With this app basically you can read some nice and inspirational quotes, I made a parser with a library called <b>Simple HTML DOM Parser</b> written in PHP lenguaje in order to fill the database, also I create an option for adding your own phrases, so any people can write their nice quotes.</p>
<p>At the end I would like to make a view with <b>CSS</b> where you can see all this phrases like this</p>
<img src="https://scontent-dfw.xx.fbcdn.net/hphotos-xaf1/t31.0-8/10628848_959836520697115_6773771025196949825_o.png" alt="Sublime Text Quotes">
<h4>Database connection.</h4>
<pre>
<code>
//db.php
$conexion = @mysql_connect("localhost","USERNAME","PASSWORD");
($conexion) ? $db = @mysql_select_db("DATABASE NAME") : die("Ops! We had some issues connecting to the database: ".mysql_error());
($db) ? "" : die("Error ".mysql_error());
</code>
</pre>
<h4>Table for phrases.</h4>
<pre>
<code>
CREATE TABLE  `phrases` (
 `phrase_id` INT( 255 ) NOT NULL ,
 `phrase` VARCHAR( 255 ) NOT NULL ,
 `slug` VARCHAR( 255 ) NOT NULL ,
 `author` VARCHAR( 255 ) NOT NULL ,
 `img_src` VARCHAR( 255 ) NOT NULL ,
PRIMARY KEY (  `phrase_id` ) ,
UNIQUE (
`slug`
)
) ENGINE = MYISAM AUTO_INCREMENT=1;
<pre>
<code>
<img src="https://scontent-dfw.xx.fbcdn.net/hphotos-xpa1/t31.0-8/1614166_1095482460465853_4841536979031274716_o.png"
