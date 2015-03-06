<?php include ROOT_PATH.'/application/view/layout/header.view.php';?>

<form action="/menu/do_add" method="post">
  <div class="form-group">
    <label for="chinese_name">中文名称</label>
    <input type="text" class="form-control" id="chinese_name" name="chinese_name">
  </div>
  
  <div class="form-group">
    <label for="english_name">英文名称</label>
    <input type="text" class="form-control" id="english_name" name="english_name">
  </div>

  <button type="submit" class="btn btn-default">提交</button>
</form>


<?php include ROOT_PATH.'/application/view/layout/footer.view.php';?>