<?php include ROOT_PATH.'/application/view/layout/header.view.php';?>
<style>
.container {
width: 100%;
}

.bs-docs-masthead {
padding: 80px 0;
}

.bs-docs-header, .bs-docs-masthead {
position: relative;
padding: 30px 15px;
color: #cdbfe3;
text-align: center;
text-shadow: 0 1px 0 rgba(0,0,0,.1);
background-color: #3190DF;
background-image: -webkit-gradient(linear,left top,left bottom,from(#3190DF),to(#3190DF));
background-image: -webkit-linear-gradient(top,#3190DF 0,#3190DF 100%);
background-image: -o-linear-gradient(top,#3190DF 0,#3190DF 100%);
background-image: linear-gradient(to bottom,#3190DF 0,#3190DF 100%);
filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='##3190DF', endColorstr='##3190DF', GradientType=0);
background-repeat: repeat-x;
}

.bs-docs-masthead .lead {
font-size: 24px;
}
.bs-docs-masthead .lead {
margin: 0 auto 30px;
font-size: 30px;
color: #fff;
}

.bs-docs-masthead .btn {
padding: 15px 30px;
font-size: 20px;
}
.btn-outline-inverse {
color: #fff;
background-color: transparent;
border-color: #cdbfe3;
}
.btn-group-lg>.btn, .btn-lg {
padding: 10px 16px;
font-size: 18px;
line-height: 1.3333333;
border-radius: 6px;
}

.content-container {
	height:600px;
}
</style>

<div class="content-container">
<main class="bs-docs-masthead" id="content" role="main">
  <div class="container">
    <p class="lead"><?php echo htmlspecialchars($title);?><p>
		<p class="lead">来自于WFE团队的一款PHP敏捷开发框架</p>
	<p class="lead">2015年内正式发布</p>
    <p class="lead">
      <a href="/framework/download" class="btn btn-outline-inverse btn-lg">下载 WFE-PHP-FRAMEWORK&nbsp;测试版</a>
    </p>
    <p class="version">当前版本： v0.1&nbsp;beta | 文档更新于：2015-02-24</p>
	<p class="version">beta版本不建议直接用于生产环境</p>
  </div>
</main>
</div>
	  
	  <!--a href="<?php echo $this->url('book', 'index');?>">手册</a-->

      <?php include ROOT_PATH.'/application/view/layout/footer.view.php';?>
