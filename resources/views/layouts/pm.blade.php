<!DOCTYPE html>
<html>
  <head>
    <title>@yield('title')  Project Management</title>
    <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

	<link rel="stylesheet" href="{{ admin_asset("/vendor/pm/jquery-weui/lib/weui.min.css") }}">

    <link rel="stylesheet" href="{{ admin_asset("/vendor/pm/jquery-weui/css/jquery-weui.min.css") }}">

    <link rel="stylesheet" href="{{ admin_asset("/vendor/pm/jquery-weui/demos/css/demos.css") }}">
    <link rel="stylesheet" href="{{ admin_asset("/vendor/pm/web/web.css") }}">

<style type="text/css">

</style>
</head>
  <body ontouchstart>




    <div class="weui-tab">
      <div class="weui-tab__bd">
        <div id="tab1" class="weui-tab__bd-item weui-tab__bd-item--active">
    <header class='demos-header'>
      <h1 class="demos-title">项目管理</h1>

    </header>
          @yield('content')
        </div>
        <div id="tab2" class="weui-tab__bd-item">
        </div>
        <div id="tab3" class="weui-tab__bd-item">
        </div>
        <div id="tab4" class="weui-tab__bd-item">
        </div>
      </div>

      <div class="weui-tabbar">
        <a href="/pm/task#tab1" class="weui-tabbar__item">
          <div class="weui-tabbar__icon">
            <img src="/vendor/pm/jquery-weui/demos/images/icon_nav_msg.png" alt="">
          </div>
          <p class="weui-tabbar__label">任务</p>
        </a>
        <a href="/pm/meeting#tab2" class="weui-tabbar__item">
          <div class="weui-tabbar__icon">
            <img src="/vendor/pm/jquery-weui/demos/images/icon_nav_button.png" alt="">
          </div>
          <p class="weui-tabbar__label">会议</p>
        </a>
        <a href="/pm/schedule#tab3" class="weui-tabbar__item">
          <div class="weui-tabbar__icon">
            <img src="/vendor/pm/jquery-weui/demos/images/icon_nav_article.png" alt="">
          </div>
          <p class="weui-tabbar__label">行程</p>
        </a>
        <a href="#tab4" class="weui-tabbar__item weui-bar__item--on">
          <div class="weui-tabbar__icon">
            <img src="/vendor/pm/jquery-weui/demos/images/icon_nav_cell.png" alt="">
          </div>
          <p class="weui-tabbar__label">我</p>
        </a>
      </div>
    </div>

<script src="{{ admin_asset ("/vendor/pm/jquery-weui/lib/jquery-2.1.4.js") }}"></script>
<script src="{{ admin_asset ("/vendor/pm/jquery-weui/lib/fastclick.js") }}"></script>
<script>
  $(function() {
    FastClick.attach(document.body);
  });
</script>
<script src="{{ admin_asset ("/vendor/pm/jquery-weui/js/jquery-weui.min.js") }}"></script>
<script src="{{ admin_asset ("/vendor/pm/jquery-weui/js/swiper.min.js") }}"></script>
<script src="{{ admin_asset ("/vendor/pm/jquery-weui/js/city-picker.min.js") }}"></script>

  </body>
</html>
