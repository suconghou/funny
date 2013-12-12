<!DOCTYPE html>
<html>
<head>
	<title>在线代码</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="lib/online.css">
	<!--[if lt IE 9]>
      <script src="http://cdnjs.bootcss.com/ajax/libs/html5shiv/r29/html5.min.js"></script>
    <![endif]-->
</head>
<body>

<div class='page'>
<div class='toolbar'>
<ul><li>文件(F)</li><li>编辑(E)</li><li>选择(S)</li><li>查找(I)</li><li>查看(V)</li><li>工具(T)</li><li>选项(N)</li></ul>
</div>
<div class='main'>
<div class='left'>
<ul>
<li>文件一</li>
<li>index.php</li>
<li>hello.js</li>
<li>rademe.txt</li>
<li>javascript.txt</li>
</ul>
</div>
<div class='right'>
<div class='openfiles'>
<ul>
<li>被打开的文件一felsessdfdf。php</li><li>index.php</li><li>readme.txt</li>
</ul>
<div class="code">


<form><textarea id="code" name="code">
function findSequence(goal) {
  function find(start, history) {
    if (start == goal)
      return history;
    else if (start > goal)
      return null;
    else
      return find(start + 5, "(" + history + " + 5)") ||
             find(start * 3, "(" + history + " * 3)");
  }
  return find(1, "1");
}</textarea></form>


</div>

</div>
</div>
</div>
<div class='bottom'>

<span class='b-left'>left</span>
<span class='b-center'>center</span>
<span class='b-right'>right</span>
</div>
</div>

<script type="text/javascript" src="http://cdn.bootcss.com/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="http://cdnjs.bootcss.com/ajax/libs/codemirror/3.16.0/codemirror.min.js"></script>
<script type="text/javascript" src="lib/javascript.js"></script>
<script type="text/javascript" src="lib/active-line.js"></script>
<script type="text/javascript" src="lib/matchbrackets.js"></script>
<script type="text/javascript" src="lib/extra.js"></script>
<script type="text/javascript" src='lib/online.js'></script>
</body>
</html>
