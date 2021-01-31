<?php
    include_once "../base.php";

    // print_r($_POST);

    foreach($_POST['id'] as $key=>$id){
        if(isset($_POST['del']) && in_array($id,$_POST['del'])){
            $Menu->del($id);
        }else{
            $sub=$Menu->find($id);
            $sub['name']=$_POST['name'][$key];
            $sub['href']=$_POST['href'][$key];

            $Menu->save($sub);
        }
    }

    if(isset($_POST['name2'])){
        foreach($_POST['name2'] as $key=>$name){
            if(!empty($name)){
                $add=[];

                $add['name']=$name;
                $add['href']=$_POST['href2'][$key];
                $add['parent']=$_POST['parent'];
                $add['sh']=1;

                $Menu->save($add);
            }
        }
    }

    // to("../backend.php?do=menu");
?>