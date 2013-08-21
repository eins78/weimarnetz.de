<!-- based on <http://getbootstrap.com/examples/jumbotron> -->

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Weimarnetz - Rootserver</title>
    <?php include("./inc/_head.inc.php") ?>  
  </head>

  <body>

    <?php include("./inc/navbar.inc.php") ?>
    
    <!-- log-in-alert for testing-->
    <!--
    <div class="alert jumbotron alert-success alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <div class="container">
        <h2>Dein Internetzugang wurde erfolgreich freigeschaltet</h2>
        <p>Den Internetzugang stellt Dir dieser <a href='http://", $gwip, "/cgi-bin/luci/freifunk/contact'>freundliche Nachbar bereit</a></p>
      </div>
    </div>
     -->
     
    <!-- untested :/
    <?php 
    $gwip = $_GET['gateway'];
    $gwnode = $_GET['gwnode'];
    $neighborip = $_GET['nodeip'];
    $neighbornode = $_GET['node'];
    if ($gwip <> '' or $neighborip <> ''){
      echo '<div class="alert jumbotron alert-success alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><div class="container">';
      echo '<h2>Dein Internetzugang wurde erfolgreich freigeschaltet</h2>';
      if ($gwip <> '') {
        echo '<p>Den Internetzugang stellt Dir dieser <a href="http://', $gwip, '/cgi-bin/luci/freifunk/contact">freundliche Nachbar bereit</a></p>';
      }  
      if ($neighborip <> '') {
        echo '<p>Dein nächster Weimarnetzknoten wird von diesem <a href="http://', $neighborip , '/cgi-bin/luci/freifunk/contact">freundlichen Nachbarn</a> betrieben</p>';
      }
      echo "</div></div>";
    }
    ?> 
    -->

    <!-- grosses startseitenbanner -->
    <div class="jumbotron">
      <div class="container">
        <h1>Willkommen im Weimarnetz</h1>
        <p>Freifunk in Weimar &mdash; Das freie B&uuml;rger-WLAN!</p>
        <!-- <p><a class="btn btn-primary btn-lg">Learn more &raquo;</a></p> -->
        
      </div>
    </div>

    <!-- hier beginnt die eigentliche seite -->
    <div class="container">

      <!-- eine reihe blöcke -->
      <div class="row">
        
        <!-- ein halber block (12/6=1/2) -->
        <div class="col-sm-6">
          <h2>Aktuelle Meldungen</h2>
          <!-- dyn: news-liste -->
          <?php
            $wikinews=file_get_contents("http://wireless.subsignal.org/index.php?title=Vorlage:Startseite.Aktuelles");
            $wikinews=substr($wikinews, strpos($wikinews, "<ul><li>" ), strpos($wikinews, "</li></ul>")-strpos($wikinews, "<ul><li>") + strlen("</li></ul>" ));
            echo str_replace("/index.php?title=","http://wireless.subsignal.org/index.php?title",str_replace("<a href=", "<a target=_blank href=",$wikinews) );
          ?>
          
          <p><a class="btn btn-xs btn-default" href="http://wireless.subsignal.org/index.php?title=Vorlage:Startseite.Aktuelles&action=edit" target="_blank">Text bearbeiten &raquo;</a></p>
        </div>
        
        <!-- ein halber block (12/6=1/2) -->
        <div class="col-sm-6">
          <h2>Aktuelle Diskussionen</h2>
          <p>
            <!-- dyn: discuss-liste -->
            <?php
              echo str_replace("<a href=", "<a target=_blank href=",file_get_contents("http://weimarnetz.de/latestnews.html"));
            ?>
            
          </p>
          <p><a class="btn btn-xs btn-default" href="./news.php" target="_blank" >Direkt zum Newsserver</a> <small>(Benutzer: <code>freifunk</code> Passwort: <code>weimar</code>)</small></p>
       </div>
       
     </div> <!-- ende reihe -->

     <!-- zweite reihe blöcke -->
     <div class="row">

        <div class="col-sm-6">
          <h2>Spendenaufruf</h2>
          <!-- dyn: spenden-liste -->
          <?php
              	$wikinews=file_get_contents("http://wireless.subsignal.org/index.php?title=Vorlage:Spendenaufruf");
                $wikinews=substr($wikinews, strpos($wikinews, "<ul><li>" ), strpos($wikinews, "</li></ul>")-strpos($wikinews, "<ul><li>") + strlen("</li></ul>" ));
                echo str_replace("/index.php?title=","http://wireless.subsignal.org/index.php?title",str_replace("<a href=", "<a target=_blank href=",$wikinews) );
          ?>
          
          <!-- paypal button -->
          <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
          <input type="hidden" name="cmd" value="_s-xclick">
          <input type="hidden" name="hosted_button_id" value="MN595Q3HPXZVY">
          <input type="image" src="https://www.paypalobjects.com/de_DE/DE/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="Jetzt einfach, schnell und sicher online bezahlen – mit PayPal.">
          <img alt="" border="0" src="https://www.paypalobjects.com/de_DE/i/scr/pixel.gif" width="1" height="1">
          </form>
          
          <!-- <p><a class="btn btn-default" href="#">View details &raquo;</a></p> -->
        </div>
        
        <div class="col-sm-2 col-sm-offset-4">
          <h2><span class="text-muted">Werbung</span></h2>
          <!-- mindfactory banner -->
          <img src="img/Banner/120x500_mindfactory_hardware.jpg" width="120" height="500" alt="Ihre Hardware stößt an ihre Grenzen? Zeit für ein Upgrade! www.mindfactory.de" usemap="#admap" />
          <map name="admap">
            <!-- #$-:Image map file created by GIMP Image Map plug-in -->
            <!-- #$-:GIMP Image Map plug-in by Maurits Rijk -->
            <!-- #$-:Please do not edit lines starting with "#$" -->
            <!-- #$VERSION:2.3 -->
            <!-- #$AUTHOR:Unknown -->
            <area shape="rect" coords="3,413,116,438" target="_blank" href="http://www.mindfactory.de" />
          </map>
        </div>
        
      </div> <!-- ende reihe -->

      <?php include("./inc/footer.inc.php") ?>
      
    </div> <!-- ende inhalt /container -->


    <?php include("./inc/_foot.inc.php") ?>

  </body>
</html>
