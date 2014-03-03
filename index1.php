<!DOCTYPE html>
<html>
<head>
	<title>代码片段</title>
	<link rel="stylesheet" type="text/css" href="http://cdnjs.bootcss.com/ajax/libs/twitter-bootstrap/3.0.0/css/bootstrap.min.css">
<style type="text/css">
.search{margin-top: 80px;}
body{background-color: #000;font: 16px Monaco,Bitstream Vera Sans Mono, Microsoft YaHei, Arial, sans-serif;}
.main{background-color:#fff;box-shadow: 0 0 100px 1px #aaa;margin-bottom: 100px;}
input,textarea,button{resize:none;outline: none;}
::-webkit-scrollbar { width:6px;}
::-webkit-scrollbar-track-piece {  background: #a1f4a1;}
::-webkit-scrollbar-thumb{background-color:#ff6565;}
::-webkit-scrollbar-thumb:hover{background:#595;}
.codelist{padding: 5px;box-shadow: 0 1px 0px 0 #585;color: #000;margin-top:20px;margin-bottom:20px;-moz-transition: all 0.2s ease-in;-webkit-transition: all 0.2s ease-in;-o-transition: all 0.2s ease-in;transition: all 0.2s ease-in;}
.codelist:hover{box-shadow: 0 1px 0 0 #f55;cursor: pointer;}
#code{display: none;height: 500px;margin-top:40px;margin-bottom: 40px;}
</style>
</head>
<body>
<div class='main container'>
<div class='container'>
<div class='row'>
<div class='col-md-12'>
<div class='search'>
<div class='col-md-offset-4 col-md-3'>
<input type="text" class='form-control'>
</div>
<div class='col-md-1'><button class='btn btn-primary'>立即查找</button></div>

</div>
</div>
</div>

</div>

<div class='container'>
<div class='row'>
<div class='col-md-12'>
<div class='col-md-8'>

<? for ($i=0; $i <10 ; $i++) {?> 

<div class='codelist'>
<p onclick="load(<?=$i?>)">哈aa哈哈</p>
</div>
	
<?}?>


<div id='code'>
<p><button onclick="back()" class='btn btn-default'>返回</button></p>

<pre class='brush:php' id='codetxt'></pre>

</div>
</div>
<div class='col-md-4'>

</div>
</div>
</div>
</div>

<script type="text/javascript" src="http://cdnjs.bootcss.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="http://cdnjs.bootcss.com/ajax/libs/twitter-bootstrap/3.0.0/js/bootstrap.min.js"></script>

<script type="text/javascript" src="http://static.oschina.net/js/syntax-highlighter-2.1.382/scripts/brush.js"></script>
<link type="text/css" rel="stylesheet" href="http://static.oschina.net/js/syntax-highlighter-2.1.382/styles/shCore.css"/>
<link type="text/css" rel="stylesheet" href="http://static.oschina.net/js/syntax-highlighter-2.1.382/styles/shThemeDefault.css"/>


</div>
<script type="text/javascript">

function lighter(){
	SyntaxHighlighter.config.clipboardSwf = 'http://static.oschina.net/js/syntax-highlighter-2.1.382/scripts/clipboard.swf';
	SyntaxHighlighter.all();
}


function load(id)
{

$.get('code',function(data){
	alert(data);
	$('#codetxt').html(data);
	lighter();
	$('.codelist').hide();

$('#code').fadeIn();
});


}

function back()
{
$('#code').hide();
$('.codelist').fadeIn();

}
</script>
</body>
</html>