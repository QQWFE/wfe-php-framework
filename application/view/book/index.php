<?php include ROOT_PATH.'/application/view/layout/header.view.php';?>
 <style>
.sidebar-module li{
	
	margin-bottom: 15px;
}

body p {
	
	line-height:200%;
	
	font-family:"微软雅黑","宋体";
	
	font-size:16px;
}

body{
	
	font-family:"微软雅黑";
}
</style>
 
 <div class="blog-header">
        <h1 class="blog-title">WFE-PHP-FRAMEWORK</h1>
        <p class="lead blog-description"></p>
      </div>

      <div class="row">

        <div class="col-sm-8 blog-main">
<?php echo $contents;?>

        </div><!-- /.blog-main -->

        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
          <!-- div class="sidebar-module sidebar-module-inset">
            <h4>About</h4>
            <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
          </div -->
          <div class="sidebar-module">
            <h2>目录</h2>
            <ol class="list-unstyled">
              <li><a href="<?php echo $this->url('book', 'index', array('param' => 'base', 'id'=>3));?>">框架介绍</a></li>
              <li><a href="/book/index/param/name">命名规范</a></li>
              <li><a href="/book/index/param/config">配置参数</a></li>
              <li><a href="/book/index/param/request">获取请求</a></li>
              <li><a href="/book/index/param/database">数据库操作</a></li>
              <li><a href="/book/index/param/url">URL配置</a></li>
              <li><a href="/book/index/param/hang">脚手架</a></li>
              <li><a href="/book/index/param/tencent">Tencent服务</a></li>
			  <li><a href="/book/index/param/performance">性能基准测试</a></li>
              <li><a href="/book/index/param/example">页面样式示例</a></li>
            </ol>
          </div>
          <!-- div class="sidebar-module">
            <h4>Elsewhere</h4>
            <ol class="list-unstyled">
              <li><a href="#">GitHub</a></li>
              <li><a href="#">Twitter</a></li>
              <li><a href="#">Facebook</a></li>
            </ol>
          </div -->
        </div><!-- /.blog-sidebar -->

      </div><!-- /.row -->


<?php include ROOT_PATH.'/application/view/layout/footer.view.php';?>