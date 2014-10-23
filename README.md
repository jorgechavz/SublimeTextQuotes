<h1>Sublime Text Quotes</h1>
<p>With this app basically you can read some nice and inspirational quotes, I made a parser with a library called <b>Simple HTML DOM Parser</b> written in PHP lenguaje, also I create an option for adding your own phrases, so any people can write their nice quotes.</p>
<p>At the end I would like to make a view with <b>CSS</b> where you can see all this phrases like this</p>
<img src="https://fbcdn-sphotos-e-a.akamaihd.net/hphotos-ak-xaf1/v/t1.0-9/p370x247/10622786_964234216924012_8152874738380960816_n.png?oh=43117b15882c04881309c5112daefece&oe=54EDE612&__gda__=1420978165_6d6f06c07e791d32f92930e2515b0d09" alt="Sublime Text Quotes">
<p>So, first of all we need to config the conection to the database, I called my database <u>sublimetextquotes</u> and because I'm test it locally I'm using defaults for username and password.</p>
<pre>
<code>
$conexion = @mysql_connect("localhost","USERNAME","PASSWORD");
($conexion) ? $db = @mysql_select_db("DATABASE NAME") : die("Ops! We had some issues connecting to the database: ".mysql_error());
($db) ? "" : die("Error ".mysql_error());
</code>
</pre>
<p>Then I made a table which is going to store all the phrases, and even the autor who said it</p>
<p>So, because we are going to store, 'phrase_id','phrase','author','img_src' we will need 4 fields in our table.</p>
<pre>
<code>
CREATE TABLE  `phrases` (
 `phrase_id` INT( 255 ) NOT NULL ,
 `phrase` VARCHAR( 255 ) NOT NULL ,
 `author` VARCHAR( 255 ) NOT NULL ,
 `img_src` VARCHAR( 255 ) NOT NULL ,
PRIMARY KEY (  `phrase_id` ) ,
UNIQUE (
`phrase`
)
) ENGINE = MYISAM ;
<pre>
<code>