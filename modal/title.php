<h3 class="cent">新增網站標題圖片</h3>
<hr>
<form action="api/add.php" method="post" enctype="multipart/form-data">
    <div style="text-align: center;">
        <div>
            標題區圖片:<input type="file" name="img">
        </div>
        <div>
            標題區替代文字:<input type="text" name="text">
        </div>
        <input type="hidden" name="table" value="<?= $_GET['table']; ?>">
        <input type="submit" value="新增">
        <input type="reset" value="重設">
    </div>
</form>