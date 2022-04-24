<!-- header -->
<header>
    <div class="container-fluid d-flex justify-content-between align-items-center border-bottom border-2 user-header bg-dark py-3  px-3">
        <div class="d-flex flex-grow-1 justify-content-evenly">
            <a href="/ispan-team5/view/frontend/prd-list.php">商品</a>
            <a href="/ispan-team5/view/frontend/bartd-list.php">酒譜</a>
            <a href="/ispan-team5/view/frontend/groupList.php">揪團趣</a>
        </div>
        <div class="logo d-flex text-nowrap mx-4">
            <a href="/ispan-team5/view/frontend/homePage.php">
                <figure>
                    <img class="object-cover" src="/ispan-team5/assets/img/logo/logo.png" alt="INJOIN-Logo">
                </figure>
            </a>
            <!-- <a href="/ispan-team5/view/frontend/homePage.php"><h1 class="logo-text">INJOIN</h1></a> -->
            
        </div>
        <div class="d-flex flex-grow-1 justify-content-evenly">
            <a href="/ispan-team5/view/frontend/coupon-list.php">優惠券</a>
            <a href="/ispan-team5/view/frontend/shopingCart.php">確認下單</a>
            <span class="mouse-pointer" title='登出' onclick='logout()' ><i class="fa-solid fa-right-to-bracket fa-xl text-white me-5"></i></span>
        </div>
        

    </div>
</header>

<script>
    function logout(){
        if(confirm('確定要登出？')){
            location.href='/ispan-team5/view/frontend/api/user-logout.php'
        }
    }
</script>
