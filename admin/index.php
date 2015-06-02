<?php
include '../includes/db.php';
include '../lib/phrases.php';
$obj = new Phrases();
$q = $obj->getAllPhrases();
?>
<!DOCTYPE html>
 <html>
   <head>
     <!--Import materialize.css-->
     <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

     <!--Let browser know website is optimized for mobile-->
     <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
   </head>

   <body>
     <nav>
         <div class="nav-wrapper">
           <a href="#" class="brand-logo">Sublime Text Quotes Admin</a>
           <ul id="nav-mobile" class="right hide-on-med-and-down">
             <li><a href="https://github.com/jorgechavz/SublimeTextQuotes" target="_blank">Github</a></li>
             <li><a href="../">Go Back</a></li>
           </ul>
         </div>
       </nav>
     <div class="row">
      <div class="col s12">
        <table class="hoverable">
        <thead>
          <tr>
              <th data-field="id">id</th>
              <th data-field="name">Phrase</th>
              <th data-field="price">Author phrase</th>
              <td>
                Image
              </td>
              <th>Action</th>
          </tr>
        </thead>

        <tbody>
          <?php
          while($row = mysql_fetch_assoc($q)){
            ?>
          <tr>
            <td data-id="<?= $row['phrase_id']; ?>"><?= $row['phrase_id']; ?></td>
            <td class="text-quote"><?= $row['phrase']; ?></td>
            <td><?= $row['author']; ?></td>
            <td>
              <img class="btn-floating responsive-img" onload="Materialize.fadeInImage($(this))" src="<?= $row['img_src']; ?>"/>
            </td>
            <th class="action">
              <a class="delete-quote waves-effect btn-floating waves-light btn" data-id="<?= $row['phrase_id']; ?>"><i class="mdi-action-delete right"></i>button</a>
            </th>
          </tr>
          <?php
          } ?>

        </tbody>
      </table>
      </div>
    </div>

     <!--Import jQuery before materialize.js-->
     <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
     <script type="text/javascript" src="js/materialize.min.js"></script>
     <script type="text/javascript" src="js/main.js"></script>
   </body>
 </html>
