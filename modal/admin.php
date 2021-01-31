<h3 class="cent">新增管理者帳號</h3>
<hr>
<form action="api/add.php" method="post" enctype="multipart/form-data">
    <div style="text-align: center;">
        <div>
            帳號:<input type="text" name="acc">
        </div>
        <div>
            密碼:<input type="password" name="pw">
        </div>
        <div>
            確認密碼:<input type="password" name="pw2">
        </div>
        <input type="hidden" name="table" value="<?= $_GET['table']; ?>">
        <input type="submit" value="新增">
        <input type="reset" value="重設">
    </div>
</form>