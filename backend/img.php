<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">校園映像資料管理</p>
    <form method="post" action="api/edit.php">
        <table width="100%" style="text-align: center;">
            <tbody>
                <tr class="yel">
                    <td width="50%">校園映像資料圖片</td>
                    <td width="15%">顯示</td>
                    <td width="15%">刪除</td>
                    <td width="20%"></td>
                </tr>
                <?php
                $all=$Img->count();
                $div=3;
                $pages=ceil($all/$div);
                $now=(isset($_GET['p']))?$_GET['p']:1;
                $start=($now-1)*$div;

                $rows = $Img->all(" limit $start,$div");
                foreach ($rows as $row) {

                ?>
                    <tr>
                        <td class="cent"><img src="img/<?=$row['img'];?>" style="width: 100px;height:68px"></td>
                        <td><input type="checkbox" name="sh[]" value="<?=$row['id'];?>" <?=($row['sh'])==1?'checked':'';?>></td>
                        <td><input type="checkbox" name="del[]" value="<?=$row['id'];?>"></td>
                        <td><input type="button" value="更新圖片"onclick="op('#cover','#cvr','modal/upload.php?table=<?=$do;?>&id=<?=$row['id'];?>')"></td>
                        <input type="hidden" name="id[]" value="<?=$row['id'];?>">
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <div class="cent">
                <?php
                    if(($now-1)>0){
                ?>
                <a class="bl" style="font-size:30px;" href="?do=img&p=<?=$now-1;?>"><</a>
                <?php
                    }
                ?>
                <?php
                    for($i=1;$i<=$pages;$i++){
                        if($i==$now){
                            $font="40px";
                        }else{
                            $font="30px";
                        }
                        echo "<a href='?do=img&p=$i' style='font-size:$font;text-decoration: none;'>$i</a>";
                    }
                ?>
                <?php
                    if(($now+1)<=$pages){
                ?>
                <a class="bl" style="font-size:30px;" href="?do=img&p=<?=$now+1;?>">></a>
                <?php
                    }
                ?>
        </div>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                <input type="hidden" name="table" value="<?=$do;?>">
                    <td width="200px"><input type="button" onclick="op('#cover','#cvr','modal/<?=$do;?>.php?table=<?=$do;?>')" value="新增校園映像圖片"></td>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
                </tr>
            </tbody>
        </table>

    </form>
</div>