<?php
// 测试mysql连接
try{
    $dbh = new PDO("mysql:host=120.55.241.57;dbname=douqi", "root", '123456');
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $dbh->exec("SET CHARACTER SET utf8");
    // $dbh=null; //断开连接
}catch(PDOException $e){
  echo "<h1 style='text-align:center;color:red'>PDO MySQL ERROR!:<br>".$e->getMessage()."</h1>" . PHP_EOL;
    die();
}

echo "<h1 style='text-align:center;color:green'>PDO MySQL 连接成功</h1>" . PHP_EOL;


// 测试sqlsrv连接
try {
  $sqlsrv_dbh = new PDO("sqlsrv:Server=118.31.251.159,1404;Database=QPGameUserDB", 'sa' , 'Test1234');
} catch (PDOException $e) {
  echo "Failed to get sqlsrv handle: " . $e->getMessage() . "\n";
  exit;
}
if ($sqlsrv_dbh)   echo "<h1 style='text-align:center;color:green'>sqlsrv 连接成功</h1>" . PHP_EOL;


// 测试redis连接
try{
    $redis = new redis();
    // $redis->connect('47.105.176.96','6379');
    $redis->connect('redis','6379');
    $redis->auth('123456');

    // 设置一个字符串的值
    $redis->set('key', 'I\'m Redis Value');

    //获取一个字符串的值
    echo "<h1 style='text-align:center;color:green'>".$redis->get('key')."</h1>" . PHP_EOL;

}catch(PDOException $e){
    print"Error!:".$e->getMessage()."<br/>";
    die();
}
// echo "<h1 style='text-align:center;color:green'>redis 连接成功</h1>" . PHP_EOL;



phpinfo();