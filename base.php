<?php
    date_default_timezone_set("Asia/Taipei");
    session_start();

    $Title=new DB("title");
    $Ad=new DB("ad");
    $Img=new DB("img");
    $Mvim=new DB("mvim");
    $Total=new DB("total");
    $Bottom=new DB("Bottom");
    $Menu=new DB("menu");
    $News=new DB("news");
    $Admin=new DB("admin");

    $title=$Title->find(['sh'=>1]);
    $total=$Total->find(1);
    $bottom=$Bottom->find(1);
    //判斷是否是第一次訪問
    if(!isset($_SESSION['visied'])){
        $total['total']++;
        $Total->save($total);
        $_SESSION['visied']=1;
        $total=$Total->find(1);
    }

    //更新圖片標題
    $uploadimg=[
        'img'=>['更新校園映像圖片','校園映像圖片'],
        'title'=>['更新網站標題圖片','網站標題'],
        'mvim'=>['更新動畫圖片','動畫圖片'],
    ];
    class DB{
        protected $table;
        protected $dsn="mysql:host=localhost;dbname=db01;charset=utf8";
        protected $pdo;

        function __construct($table)
        {   
            $this->table=$table;
            $this->pdo=new PDO($this->dsn,'root','');
        }

        function all(...$arg){
            $sql="select * from $this->table";
            if(isset($arg[0])){
                if(is_array($arg[0])){
                    foreach($arg[0] as $key=>$value){
                        $tmp[]=sprintf("`%s`='%s'",$key,$value);
                    }
                    $sql.=" where ".implode(" && ",$tmp);
                }else{
                    $sql.=$arg[0];
                }
            }
            if(isset($arg[1])){
                $sql.=$arg[1];
            }
            // echo $sql;
            return $this->pdo->query($sql)->fetchAll();
        }
        function count(...$arg){
            $sql="select count(*) from $this->table ";

            if(isset($arg[0])){
                if(is_array($arg[0])){
                    foreach($arg[0] as $key => $value){
                        $tmp[]=sprintf("`%s`='%s'",$key,$value);
                    }
    
                    $sql .= " where ".implode(" && ",$tmp);
    
                }else{
                    $sql .= $arg[0];
                }
            }
    
            if(isset($arg[1])){
                $sql .= $arg[1];
            }
            // echo $sql;
            return $this->pdo->query($sql)->fetchColumn();
        }
        function find($id){
            $sql="select * from $this->table";
            if(is_array($id)){
                foreach($id as $key=>$value){
                    $tmp[]=sprintf("`%s`='%s'",$key,$value);
                }
                $sql.=" where ".implode(" && ",$tmp);
            }else{
                $sql.=" where id='{$id}'";
            }
            // echo $sql;
            return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
        }
        function del($id){
            $sql="delete from $this->table";
            if(is_array($id)){
                foreach($id as $key=>$value){
                    $tmp[]=sprintf("`%s`='%s'",$key,$value);
                }
                $sql.=" where ".implode(" && ",$tmp);
            }else{
                $sql.=" where id='{$id}'";
            }
            return $this->pdo->exec($sql);
        }
        function save($arr){
            if(isset($arr['id'])){
                //update
                foreach($arr as $key=>$value){
                    $tmp[]=sprintf("`%s`='%s'",$key,$value);
                }
                $sql="update $this->table set".implode(",",$tmp)."where id={$arr['id']}";
            }else{
                //insert
                $sql="insert into $this->table (`".implode("`,`",array_keys($arr))."`) values ('".implode("','",$arr)."')";
            }
            echo $sql;
            return $this->pdo->exec($sql);
        }
        function q($sql){
            return $this->pdo->query($sql)->fetchAll();
        }
    }

    function to($url){
        header("location:".$url);
    }
?>