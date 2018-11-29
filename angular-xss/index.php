<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<!-- <script src="js/angular-1.4.8.min.js"></script> -->
<script src="js/angular-1.4.8.min.js"></script>
</head>
<body ng-app="">
<!-- <body> -->

<?php
//payload:{{'a'.constructor.prototype.charAt=[].join;$eval('x=alert(2)')+''}}
$q = $_GET['q'];
$q=htmlspecialchars($q,ENT_QUOTES);//使用ENT_QUOTES选项的bug
$q=str_replace('\\','',$q);//实体&多了个\因此
echo $q;//&前面多了个\，因此payload无法生效
?>
</body>
</html>
