<h3 class="cent">新增動態文字廣告</h3>
<hr>
<form action="api/add.php" method="post" enctype="multipart/form-data">
    <div style="text-align: center;">
        <div>
            動態文字廣告:<input type="text" name="text">
        </div>
        <input type="hidden" name="table" value="<?= $_GET['table']; ?>">
        <input type="submit" value="新增">
        <input type="reset" value="重設">
    </div>
</form>