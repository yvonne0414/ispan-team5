<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .img_container {
            max-height: 200px;
            max-width: 200px;
            border-radius: 10px;
            overflow: hidden;
            display: none;
        }

        .img_container img {
            object-fit: cover;
            width: 100%;
        }
    </style>
</head>

<body>
    <form action="" class="d-flex flex-wrap mt-4" ">
    <div class=" d-flex align-items-center w-50 pe-4 mb-3 me-1">
        <div>
            <label for="prd_img" class="form-label mb-0">商品圖片</label>
        </div>
        <div class="flex-grow-1">
            <input type="file" class="form-control" name="prd_img" id="prd_img" accept=".jpg, .jpeg, .png, .webp, .svg">
        </div>
        </div>
        <div class="justify-content-center align-items-center img_container my-2">
            <img id="prd_img_show" src="#" />
        </div>
    </form>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        // 圖片預覽
        $("#prd_img").change(function() {
            readURL(this);
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $(".img_container").css('display', "flex");
                    $("#prd_img_show").attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</body>

</html>