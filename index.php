<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="Kristijan Štefančić">
        <meta name="viewport" content="width=device-width, maximum-scale=1, minimum-scale=1" />
        <title>AI project</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700%7CRoboto%7CJosefin+Sans:100,300,400,500" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="style.css">
    
    </head>
    <body>
  <div class ="container-fluid text-center img-responsive" id="custom_header">
      <div class="jumbotron">
                <h1>Spam Tester</h1>
                <p>You are scared that a important e-mail could end up in the recipient's spam folder? Test your e-mail here.</p>
                <a href="#section-test" class="btn btn-lg my-button" id="test-now">Test now</a>
      </div>
 </div>

 
<section id="section-test">
     <div class="container">
        <div class="row">
            <div class="col-sm-4 col-centered" >
                <img src="spam.png" class="img-responsive center-block" alt="spam">
            </div>
            <div class="col-sm-8">
                <h3>Test e-mail for spam</h3>
                <form class="form-horizontal" action="check_email.php" method="POST">
                   
                    <textarea class="form-control"  name="message" placeholder="Copy your e-mail here" style="height:200px"></textarea>
                    <div class="btn-send">
                    <button type="submit" name="submit" class="btn btn-lg my-button"><span class="glyphicon glyphicon-question-sign"></span> Check e-mail</button>
                    </div>
                </form>
            </div>
        </div>
        
    </div>
</section>

    <script src="https://unpkg.com/scrollreveal/dist/scrollreveal.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
         var $root = $('html, body');
        $('#test-now').click(function() {
            $root.animate({
                scrollTop: $( $.attr(this, 'href') ).offset().top
            }, 500);
            return true;
        });

        
        </script>
   </body>