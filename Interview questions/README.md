#简单的WEB开发者面试题

## <a name="list">目录</a>
1. [前言](#preface)
1. [HTML与CSS部分](#htmlcss)
1. [JAVASCRIPT部分](#javascript)
1. [PHP与MySql部分](#phpmysql)
1. [其他](#other)
1. [答案](#answer)

## <a name='preface'>前言</a>
本文总结了一些常见的Web开发者常遇见的面试题,包含PHP,MYSQL,HTML,CSS,JAVASCRIPT
题目包含常见的基本知识还有自己平时工作中经常遇到的问题,给大家分享
题目简单,只适合初学者,同时也为自己巩固基础,回答如有误,请轻拍.
## <a name='htmlcss'>HTML与CSS部分</a>

- HTML中的内敛元素如何装化为一个块级元素
- 如何浮动一个元素,以及清除浮动的几种方法
- IE6,IE7不支持display:inline-block,说一下实现IE6和IE7下的display:inline-block
- 如何让一个块级元素居中
- 如何让一行文字垂直居中
- 如何当一个div元素在浏览器中上下左右垂直居中
- 说一下你对position的relative和absolute,fixed等的认识
- 了解box-sizing吗,说一说
- 如何实现元素的圆角
- CSS常用的实现透明的两种方式是什么,有什么区别
- CSS3中的transition和transform了吗
- 道如何实现CSS3中的帧动画吗

## <a name='javascript'>JAVASCRIP部分</a>
- JS中如何声明一个全局变量
- 对于jquery熟悉吗,说一下jquery如何发起一个post请求
- 用Jquery如何获取一个元素属性的属性值
- 用Jquery如何对一个元素添加类和删除类
- 如何用Jquery实现下拉菜单的基本思想
- 如何释放掉Jquery对于$符号的占用
- query的选择器是如何实现的,比如类选择器
- 了解对象的prototype属性吗
- JS中使用Ajax,Ajax的全称是什么,Ajax的唯一核心对象又是什么
- 什么是JS的闭包,它有什么用
- 了解其他的JS的MVC或MVVM框架吗,例如Angularjs,他与jquery相比有什么特色
- 如何判断一个值是数组还是对象
- 你如何解决跨域问题
- Ajax中的同步和异步有什么区别


## <a name='phpmysql'>PHP与MYSQL部分</a>
- session与cookie区别
- get与post的区别
- echo print print_r 区别
- php中的魔术方法set,get
- 函数中的静态变量
- empty() is_null() isset() 什么情况下true,false
- 用正则表达式匹配t.cn短网址,例如格式为 http://t.cn/AS4Gx56n  8位
- php获取今日凌晨的时间戳
- 如何截取中文不乱吗
- 如何实现一个单例模式
- 说一下php5.3 php5.4 php5.5增加的新特性
- 说一下你最常用的几种PHP开发框架
- 多数条件下,我们使用sql的or条件可以改写为in的方式,说一下他们各自适用的场景以及时间复杂度

## <a name='other'>其他</a>
- null

## <a name='answer'>答案</a>
### HTML与CSS部分
- 对一个内联元素使用display:block;或者display:inline-block;使其转化为块级元素
- 可以使用clear:both清除浮动,不过这样需要添加html标签,可以巧妙的使用伪元素清除浮动
```CSS
.clearfix:before, .clearfix:after{
content: " "; display: table;
}
.clearfix:after {
clear: both; 
}
.clearfix {
*zoom: 1; 
}
```
- 针对IE6,IE7不支持display:inline-block, 需要使用HACK兼容他,可以这样
```CSS
.iblock{
display:inline-block;
*display:inline;
*zoom:1;
}
```
- 块级元素居中,只需定义块级元素的宽度,然后定义`margin:auto`或者`margin:20px auto` , 只需要将其左右margin设置为auto
- 文字居中,可以直接设置line-height为文字所在的容器的高度,通常
```CSS
.vheight{
height:60px;
line-height:60px;
}
```
- DIV上下左右垂直居中,使用position:fixed,或者position:absoulte (父容器没有指定position),然后左上50%,然后margin负的宽度或高度的一半,如
```CSS
.center{
width:600px;
height:400px;
position:fixed;
left:50%;
top:50%;
margin-left:-300px;
margin-top:-200px;
}
```
- Position的各种定位方式,最常用relative,此种方式是相对于原来所在的位置的定位,他的自私的,其重新定位后,原来所占用的位置不会释放.absolute的定位取决与其父元素的定位类型,如果父元素含有position定位,则其依据父元素定位,若没有,则望上级查找,直至html元素,absolute的定位是无私的,重新定位后,原来所占用的位置会被让出来供其他元素使用.fixed始终依据浏览器来定位.
- box-sizing 在CSS3中提出,但是IE中IE8兼容,IE6,IE7不兼容,最常用的是元素的总大小包含padding,margin,border 如`border-box` ,`content-box` 应为其默认值
- 圆角使用CSS3可以实现 ,border-radius:10px; 或者分别指定,依次是左上,右上,右下,左下,使其兼容性更好,需要这样
```CSS
-webkit-border-radius:5px;
-moz-border-radius:5px;
-o-border-radius:5px;
border-radius:5px;
```
- 使用`opacity`和`background:rgba(r,g,b,a)` 均可实现透明,但是前者实现的透明,也会导致图层上的文字也透明,使其不清楚
- transition 可以实现元素的缓动,例如
```CSS
-webkit-transition: width .6s ease;
-o-transition: width .6s ease;
transition: width .6s ease;
```
可以指定缓动那些,时间,效果等,不一一说明了
transform,可以实现倾斜,重定位,放大缩小,等
- 帧动画利用`@keyframes` 声明动画实现

### JAVASCRIPT部分
- JS带`var`的声明作用域为当前的作用域,不带`var`的声明,作用域即为window, 可以直接赋值不带var的变量即为全局变量,或者在最外层声明
- $.post(url,{},callback) 发起post请求
- $('#id').attr('rel') 即获取此元素的rel的属性值
- \$('#id').addClass() $('#id').removeClass()
- 隐藏菜单内容,定位菜单内容为菜单下方,使用$('#id').dropUp();
- null
- null
- null
- null
- null
- null


### PHP与MYSQL部分
- session存储与服务端,有php.ini定义存储位置,是由一个`sess_`+phpsessionid命名的文本文件,cookie存储于浏览器端,session相比cookie具有较高的信任度
- post发送的内容是属于http请求正文的,不会再浏览器的地址栏显示出来,可以发送较大的数据,get发送的数据在http协议头部,属于QueryString,其中的数据在地址栏中显示,同时浏览器对其也有大小限制
- echo 属于语法结构不是函数,所有不需要添加括号,同时它的参数也可以是一个或多个,print是函数 ,print_r常用于打印数组,可以方便的格式化输出,相比较而言,echo是语法结构,比其他都会快
- __get ,__set ,__call等都是魔术方法...
- 静态变量只生命一次,下次使用仍保持上次的值....
- empty() isset() is_null .....
- 使用正则 
```PHP
$reg='/http:\/\/t\.cn\/[a-z0-9A-Z]{8}/';
```
- `strtotime(date('Y-m-d'))`
- 使用 `mb_substr()`
- 使用static的变量保存实例化的对象,并且检测clone
- php5.3增加闭包,命名空间,php5.4增加闭包中可以使用this,新的array使用格式
- CI,TP,YII ...
- ...