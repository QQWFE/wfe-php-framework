<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title><?php echo $website_title;?></title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    
  <style>
body {
  padding-top: 50px;
}
.starter-template {
  padding: 40px 15px;
  text-align: center;
}

.container .text-muted {
margin: 20px 0;
}
.text-muted {
color: #777;
}

.footer {
bottom: 0;
width: 100%;
height: 60px;
background-color: #f5f5f5;
}
  </style>
    
    </head>

  <body>
  
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><?php $website_title?></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="">
                <a href="<?php echo $this->url('index', 'show');?>">首页</a>
            </li>
            <li><a href="/book/index">手册</a></li>
            <li><a href="/contact/index">联系我们</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">