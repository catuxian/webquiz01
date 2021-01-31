<h3 class="cent">新增最新消息資料</h3>
<hr>
<form action="api/add.php" method="post" enctype="multipart/form-data">
    <div style="text-align: center;">
        <div>
            最新消息資料: <textarea name="text" id="" cols="30" rows="10"></textarea>
        </div>
        <input type="hidden" name="table" value="<?= $_GET['table']; ?>">
        <input type="submit" value="新增">
        <input type="reset" value="重設">
    </div>
</form>