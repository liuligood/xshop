<?php
$stime=microtime(true); 
$redis = new Redis();
//连接参数：ip、端口、连接超时时间，连接成功返回true，否则返回false
$redis->connect('127.0.0.1', 6379, 30);
$a = mysqli_connect('localhost','root','root','test');
$sql = 'SELECT * from countries';
// 执行查询
$exe_res = mysqli_query($a, $sql);
// 返回数据
$data = mysqli_fetch_all($exe_res,MYSQLI_ASSOC);
//$a = $redis->keys('*');
$i = 0;
foreach ($data as $v){
    $job[] = $redis->sMembers($v['country_id']);
}
var_dump($job[0][1]);

?>
<table>
	<thead>
	<tr>
		<th>数字</th>
		<th>名字</th>
	</tr>
	<thead>
	<tbody>
		<?php foreach ($job as $v):?>
		<tr>
			<td><?=$v[0]?></td>
			<td><?=$v[1]?></td>
		</tr>
		<?php endforeach;?>
	</tbody>
</table>
<?php $etime=microtime(true); 
    $time = $stime - $etime;
    var_dump($time);
?>