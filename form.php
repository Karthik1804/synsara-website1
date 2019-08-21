<?php
// Include config file
require_once "config.php";
?>

<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Registration | P2K15</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="#cd2929">
        <meta name="mobile-web-app-capable" content="yes"/>

        <link rel="apple-touch-icon" href="img/plogo2k15.png">
        <link rel="shortcut icon" href="img/plogo2k15.png" type="image/x-icon" />
        <!-- Place favicon.ico in the root directory -->
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/styler.css">
    </head>
    <body>
        <div class="floating-logo">
            <a href="index.html"><img src="img/plogo2k15.png" alt="paradigm-logo" width="100%"/></a>
        </div>
        <div class="hide">
          <div class="top_bar" ></div>
        <div class="h_register">
          <div class= "reg-title">REGISTRATION<br><p>&diams; &diams; &diams;</p></div> <br>
          <?php echo $error; ?>
          <form method="post">
            <div class="form">
            Name :<br /><input class="name" type="text" name="name" value="<?php echo $name; ?>"/><br /><br />
            College:<br /> <input class="college" type="text" name="college" value="<?php echo $college; ?>" /><br /> <br />
            <div class="dept">  Department:<br /><input class="department" list='dept-list' name="department"  />
              <datalist id="dept-list">
                <option value="CSE" />
                <option value="IT" />
                <option value="Others" />
              </datalist>
            </div>
            <div class="yr">  Year:<br /><input class="year" list="yr-list" name="year" />
              <datalist id="yr-list">
                <option value="I"/>
                <option value="II"/>
                <option value="III"/>
                <option value="IV"/>
              </datalist><br />
            </div>
          <br /><br /><br />E-mail:<br /><input class="email" type="email" name="email" value="<?php echo $email; ?>" /><br /> <br />
            Mobile:<br /><input class="mobile" type="text" name="mobile_no" />
          </div>
          <br />
        <div class="col-md-12">
          <div class="col-md-6">
          TECHNICAL EVENT:<br />
          <input type="checkbox" name="TechList[]" value="Tec_Event1"><label>Tec_Event1</label><br/>
          <input type="checkbox" name="TechList[]" value="Tec_Event2"><label>Tec_Event2</label><br/>
          <input type="checkbox" name="TechList[]" value="Tec_Event3"><label>Tec_Event3</label><br/>
          <input type="checkbox" name="TechList[]" value="Tec_Event4"><label>Tec_Event4</label><br/>
          <input type="checkbox" name="TechList[]" value="Tec_Event5"><label>Tec_Event5</label><br/>
          <input type="checkbox" name="TechList[]" value="Tec_Event6"><label>Tec_Event6</label><br/>
          </div>
          <br />
          <div class="col-md-6">
          NON TECHNICAL EVENT:<br />
          <input type="checkbox" name="NonTechEvent[]" value="NON_TEC_Event1"><label>NON_TEC_Event1</label><br/>
          <input type="checkbox" name="NonTechEvent[]" value="NON_TEC_Event2"><label>NON_TEC_Event2</label><br/>
          <input type="checkbox" name="NonTechEvent[]" value="NON_TEC_Event3"><label>NON_TEC_Event3</label><br/>
          </div>
        </div>
        <br /><br />
          <div class="submit_block">
          <input type="submit" value="REGISTER" class="submit" name="submit" />
          </div>
        </form>
        </div>
        </div>

        <!--
        Google Analytics: change UA-XXXXX-X to be your site's ID.
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
             function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
             e=o.createElement(i);r=o.getElementsByTagName(i)[0];
             e.src='https://www.google-analytics.com/analytics.js';
             r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
             ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script> -->
    </body>
</html>
