<?php

// 测试mysql连接
try{
    $dbh = new PDO("mysql:host=mysql;dbname=mysql", "root", 123456);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $dbh->exec("SET CHARACTER SET utf8");
    $dbh=null; //断开连接   
}catch(PDOException $e){
    print"Error!:".$e->getMessage()."<br/>";
    die();
}

echo "<h1 style='text-align:center;color:green'>PDO MySQL 连接成功</h1>" . PHP_EOL;


// 测试redis连接
try{
    $redis = new redis();
    $redis->connect('redis','6379');
    // 设置一个字符串的值
    $redis->set('key', 'i am value');

    //获取一个字符串的值
    // echo $redis->get('key');

}catch(PDOException $e){
    print"Error!:".$e->getMessage()."<br/>";
    die();
}

echo "<h1 style='text-align:center;color:green'>redis 连接成功</h1>" . PHP_EOL;


phpinfo();