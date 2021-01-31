<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">進站總人數管理</p>
    <form method="post" action="api/edit.php">
        <table width="100%">
            <tbody>
                <tr>
                    <td width="50%" class="yel">進站總人數:</td>
                    <td width="50%"><input type="text" value="<?=($Total->find(1))['total'];?>" name="total"></td>
                    <input type="hidden" name="id[]" value="1">
                </tr>
            </tbody>
        </table>
        <table style="margin-top:40px; width:100%;">
            <tbody>
                <tr>
                <input type="hidden" name="table" value="<?=$do;?>">
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
                </tr>
            </tbody>
        </table>

    </form>
</div>