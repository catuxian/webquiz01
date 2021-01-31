<?php
include_once "../base.php";
?>
<h3 class="cent"><?= $uploadimg[$_GET['table']][1]; ?></h3>
<hr>
<form action="api/upload.php" method="post" enctype="multipart/form-data">
    <div style="text-align: center;">
        <div>
        <?= $uploadimg[$_GET['table']][0]; ?><input type="file" name="img">
        </div>
        <input type="hidden" name="table" value="<?= $_GET['table']; ?>">
        <input type="hidden" name="id" value="<?=$_GET['id'];?>">
        <input type="submit" value="修改">
        <input type="reset" value="重設">
    </div>

</form>