<h3 class="cent">新增主選單</h3>
<hr>
<form action="api/add.php" method="post" enctype="multipart/form-data">
    <div style="text-align: center;">
        <div>
            主選單文字:<input type="text" name="name">
        </div>
        <div>
            主選單連結:<input type="text" name="href">
        </div>
        <input type="hidden" name="table" value="<?= $_GET['table']; ?>">
        <input type="submit" value="新增">
        <input type="reset" value="重設">
    </div>
</form>