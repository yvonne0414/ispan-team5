<!doctype html>
<html lang="en">

<head>
    <title>CreateProduct</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


</head>

<body>
    <div class="container py-3">
        <form action=".php" method="post" enctype="multipart/form-data">

            <div class="container">
                <div class="col-10 mt-3 p-0">
                    <div class="form-group">
                        <label for="classify_type">類別</label>
                        <select id="main_menu" name="classify" class="form-control main_menu">
                            <option value="">請選擇</option>
                            <option value="居家生活">居家生活</option>
                            <option value="香氛系列">香氛系列</option>
                            <option value="配件飾品">配件飾品</option>
                            <option value="家電3C">家電/3C</option>
                            <option value="辦公文具">辦公文具</option>
                            <option value="玩偶玩具">玩偶玩具</option>
                            <option value="包包提袋">包包提袋</option>
                        </select>
                    </div>
                </div>
                <div class="col-10 mt-3 p-0 mb-3">
                    <div class="form-group">
                        <label for="category_type">種類</label>
                        <select id="sub_menu" name="category_type" class="form-control sub_menu">
                            <option value="">請先選擇種類</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="col-10 mt-3 p-0">
                    <div class="form-group">
                        <label for="classify_type">類別</label>
                        <select id="main_menu" name="classify" class="form-control main_menu">
                            <option value="">請選擇</option>
                            <option value="居家生活">居家生活</option>
                            <option value="香氛系列">香氛系列</option>
                            <option value="配件飾品">配件飾品</option>
                            <option value="家電3C">家電/3C</option>
                            <option value="辦公文具">辦公文具</option>
                            <option value="玩偶玩具">玩偶玩具</option>
                            <option value="包包提袋">包包提袋</option>
                        </select>
                    </div>
                </div>
                <div class="col-10 mt-3 p-0 mb-3">
                    <div class="form-group">
                        <label for="category_type">種類</label>
                        <select id="sub_menu" name="category_type" class="form-control sub_menu">
                            <option value="">請先選擇種類</option>
                        </select>
                    </div>
                </div>
            </div>
    </div>
    </form>
    <script>
        let category = {
            居家生活: ['餐具', '抱枕', '夜燈', '擺飾', '衛浴用品', '便利小物'],
            香氛系列: ['沐浴', '精油與配件', '香水'],
            配件飾品: ['個人配件', '首飾', '髮飾', ],
            家電3C: ['3C產品', '家用電器'],
            辦公文具: ['書寫工具', '辦公用具'],
            玩偶玩具: ['玩偶', '玩具', '療癒小物'],
            包包提袋: ['日常包款', '錢包', '收納包', '旅行'],


        };
        let main = document.getElementsByClassName('main_menu');
        let sub = document.getElementsByClassName('sub_menu')
        var main_count = main.length;
        var sub_count = sub.length;
        for (var i = 0; i < main_count; i++) {
            main[i].addEventListener('change', function() {
                console.log(1);
                // while (sub.options.length > 0) {
                //     sub.options.remove(0);
                // }
                // for (let i = 0; i < category[this.value].length; i++) {
                //     sub.appendChild(new Option(category[this.value][i], i));
                // }

            });
        }


        // var main = document.getElementById('main_menu');
        // var sub = document.getElementById('sub_menu');

        // main.addEventListener('change', function() {

        //     // console.log(category[this.value]);
        //     // return;
        //     // var selected_option = category[this.value];


        //     while (sub.options.length > 0) {
        //         sub.options.remove(0);
        //     }
        //     // console.log(sub.options);
        //     // console.log(typeof(sub.options));
        //     // console.log(selected_option);
        //     // console.log(Array.from(selected_option));
        //     // console.log(typeof(selected_option));
        //     // console.log(typeof(Array.from(selected_option)));
        //     // return;
        //     // selected_option.forEach(function(el){
        //     //     let option = new Option(el, el);

        //     //     sub.appendChild(option);
        //     // });
        //     // console.log(category[this.value].length);
        //     // category[this.value].forEach(function(el) {
        //     //     sub.appendChild(new Option(el, el));
        //     // });
        //     for (let i = 0; i < category[this.value].length; i++) {
        //         sub.appendChild(new Option(category[this.value][i], i));
        //     }
        //     // Array.from(selected_option).forEach(function(el) {

        //     //     let option = new Option(el, el);

        //     //     sub.appendChild(option);
        //     // });

        // });
    </script>
</body>


<!-- Bootstrap JavaScript Libraries -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>

</html>