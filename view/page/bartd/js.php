<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <ul class="hovertreelist-ul">
        <li id="li" class="hovertreelist-li">
            <div class="con">
                何问起，你的快递到了，请到楼下签收<a href="http://hovertree.com/">详情</a>
            </div>
            <div class="hovertreebtn">删除</div>
        </li>
        <li class="hovertreelist-li">
            <div class="con">
                哇，你在干嘛，快点来啊就等你了
            </div>
            <div class="hovertreebtn">删除</div>
        </li>
        <li class="hovertreelist-li">
            <div class="con">
                何问起发给你一个节日红包，<a href="http://hovertree.com/wx/hwq/6/">点这里查收</a>
            </div>
            <div class="hovertreebtn">删除</div>
        </li>
        <li class="hovertreelist-li">
            <div class="con">
                <a href="http://hovertree.com/hovertreescj/">何问起收藏夹</a>欢迎您的使用。
            </div>
            <div class="hovertreebtn">删除</div>
        </li>
        <li class="hovertreelist-li">
            <div class="con">
                <a href="http://hovertree.com/h/bjaf/jtkqnsc1.htm">CSS3</a>绘制各种各样的图形图标
            </div>
            <div class="hovertreebtn">删除</div>
        </li>
        <li class="hovertreelist-li">
            <div class="con">
                何问起发给你一个节日红包，请注意查收。
            </div>
            <div class="hovertreebtn">删除</div>
        </li>
        <li class="hovertreelist-li">
            <div class="con">
                <a href="http://hovertree.com/menu/bootstrap/">Bootstrap</a>十分实用，大大提高效率。
            </div>
            <div class="hovertreebtn">删除</div>
        </li>
        <li class="hovertreelist-li">
            <div class="con">
                何问起你有一个到付快递，请到门口查收。
            </div>
            <div class="hovertreebtn">删除</div>
        </li>
        <li class="hovertreelist-li">
            <div class="con">
                柯乐义给你寄来了一张贺卡，请到门口查收。
            </div>
            <div class="hovertreebtn">删除</div>
        </li>
    </ul>
    <script>
        var hovertreeItems = document.getElementsByClassName("hovertreebtn");
        var h_count = hovertreeItems.length;
        for (var i = 0; i < h_count; i++) {
            hovertreeItems[i].addEventListener('click', function(event) {
                var hovertreeitem = event.target.parentNode;
                hovertreeitem.style.display = 'none';
            })
        }
    </script>
</body>

</html>