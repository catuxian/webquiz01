<?php
include_once "../base.php";

$subs = $Menu->all(['parent' => $_GET['id']]);


?>

<h3 class="cent">編輯次選單</h3>
<hr>
<form action="api/editsub.php" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>次選單文字</td>
            <td>次選單連結</td>
            <td>刪除</td>
        </tr>
        <?php
        foreach ($subs as $sub) {
        ?>
            <tr>
                <td><input type="text" name="name[]" value="<?= $sub['name']; ?>"></td>
                <td><input type="text" name="href[]" value="<?= $sub['href']; ?>"></td>
                <td><input type="checkbox" name="del[]" value="<?= $sub['id']; ?>"></td>
                <input type="hidden" name="id[]" value="<?= $sub['id']; ?>">
            </tr>
        <?php
        }
        ?>
        <tr id="btn">
            <td id="btn">
                <input type="hidden" name="table" value="<?= $_GET['table']; ?>">
                <input type="hidden" name="parent" value="<?= $_GET['id']; ?>">
                <input type="submit" value="新增">
                <input type="reset" value="重設">
                <input type="button" value="更多次選單" onclick="more()">
            </td>
        </tr>
    </table>

</form>

<script>
    function more() {
        let str = `
        <tr>
            <td><input type="text" name="name2[]"></td>
            <td><input type="text" name="href2[]"></td>
            <td></td>
        </tr>
        `;
        $('#btn').before(str)
    }
</script>