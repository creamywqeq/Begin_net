<!doctype html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
<title>搜索结果-{pboot:sitetitle}</title>
<meta name="keywords" content="{pboot:sitekeywords}">
<meta name="description" content="{pboot:sitedescription}">
<link rel="stylesheet" type="text/css" href="{pboot:sitetplpath}/css/style.css?t=1625543438" />
<script type="text/javascript" src="{pboot:sitetplpath}/js/jquery-2.2.4.min.js?t=1625450386"></script>
<link rel="stylesheet" type="text/css" href="{pboot:sitetplpath}/css/style_1.css?t=1625450374" />
<link rel="stylesheet" type="text/css" href="{pboot:sitetplpath}/css/ytuser.css?t=1625450374" />
</head>

<body class="">
<div class="heanav">
  <header id="header"> 
    <a href="{pboot:sitedomain}" class="logo1"> 
      <img src="{pboot:sitelogo}" class="logo1" alt="{pboot:pagetitle}">
    </a>
    <nav class="links">
      <ul>
        <li><a href="{pboot:sitedomain}" {pboot:if(0=='{sort:scode}')}class='active'{/pboot:if}>首页</a></li>
        {pboot:nav num=10 parent=0}
        <li><a href="[nav:link]" {pboot:if('[nav:scode]'=='{sort:tcode}')}class="active"{/pboot:if}>[nav:name]</a></li>
        {/pboot:nav}
      </ul>
    </nav>
    <nav class="main">
      <ul>
        <li class="search"><a class="fa-search" href="#search">Search</a>
          <form action="{pboot:scaction}" method="get" role="search" id="search">
            <input type="text" name="keyword" placeholder="输入内容回车搜索">
          </form>
        </li>
        <li class="menu"><a class="fa-bars" href="#menu">Menu</a></li>
      </ul>
    </nav>
  </header>
</div>

<style>
  .logo1 img {
    width: 50px;        /* 设置宽度为100px，您可以根据需求调整 */
    height: 50px;       /* 设置高度与宽度相同，确保图片是正方形 */
    border-radius: 15px; /* 圆角矩形，值越大，圆角越明显 */
    object-fit: cover;
  }
</style>

<div class="position">当前位置：搜索 {pboot:keyword} 的结果</div>
<div id="wrapper">
  <div id="main">
    {pboot:search num=5 order=date}
    <article class="post">
      <header>
        <div class="title">
          <h2><a href="[search:link]">[search:title]</a></h2>
        </div>
        <div class="meta">
          <time class="published" datetime="[search:date]">[search:date]</time>
          <div class="author"><span class="name">admin</span><img src="{pboot:sitetplpath}/images/dfboy.png" alt="admin"></div>
        </div>
      </header>
      <p>[search:description]...</p>
      <footer>
        <ul class="actions">
          <li><a href="[search:link]" class="button large">查看文章详情</a></li>
        </ul>
        <ul class="stats">
          <li><a href="[search:sortlink]">[search:sortname]</a></li>
          <li><a class="icon solid fa-eye">[search:visits]</a></li>
        </ul>
      </footer>
    </article>
    {/pboot:search}
    
    <div class="ab_pages">
      <ul>
        {pboot:if({page:rows}>0)}
        <a href="{page:index}">首页</a>
        <a href='{page:pre}'>上一页</a>
        {page:numbar}
        <a href='{page:next}'>下一页</a>
        <a href='{page:last}'>末页</a>
        {/pboot:if}
      </ul>
    </div>
  </div>
  <section id="sidebar">
    <section id="intro"><a href="{pboot:sitedomain}" class="logo"><img src="{pboot:sitetplpath}/images/headface.jpg"></a>
      <header>
        <h2>霜叶吟昒博客</h2>
        <p>开成花灾的玫瑰不是灿烂，而是荒凉。
          </p>
      </header>
    </section>
<dl class="function" id="divContorPanel">
      <dt style="display:none;"></dt>
      <dd class="function_c">
        <div>
          <p>QQ：{pboot:companyqq}<br />
          </p>
          <p>邮箱：{pboot:companyemail}<br />
          </p>
          <p><img src="{pboot:companyweixin}" title="二维码" alt="二维码" /></p>
        </div>
      </dd>
    </dl>
    <dl class="function" id="side-tui-article-item">
      <dt class="function_t">推荐文章</dt>
      <dd class="function_c">
        <div>
          {pboot:list num=4 scode=* order=visits}
          <article class="mini-post">
            <header>
              <h3><a href="[list:link]">[list:title]</a> </h3>
              <time class="published" datetime="[list:date style=Y-m-d]">[list:date style=Y-m-d]</time>
              <a class="author"><img src="{pboot:sitetplpath}/images/dfboy.png" alt="admin"></a> </header>
          </article>
          {/pboot:list}
        </div>
      </dd>
    </dl>
    <dl class="function" id="side-hot-view-item">
      <dt class="function_t">热门文章</dt>
      <dd class="function_c">
        <ul>
          {pboot:list num=4 scode=* order=date}
          <li>
            <article>
              <header>
                <h3><a href="[list:link]">[list:title]</a></h3>
                <time class="published" datetime="[list:date style=Y-m-d]">[list:date style=Y-m-d]</time>
              </header>
            </article>
          </li>
          {/pboot:list}
        </ul>
      </dd>
    </dl>
    <dl class="function" id="divTags">
      <dt class="function_t">标签列表</dt>
      <dd class="function_c">
        <ul>
          {pboot:tags}
          <li><a href="[tags:link]">[tags:text]</a></li>
          {/pboot:tags}
        </ul>
      </dd>
    </dl>
    <section id="footer">
      <p class="copyright">{pboot:sitecopyright}<br>
      <span><a href="https://beian.miit.gov.cn/" rel="nofollow" target="_blank">{pboot:siteicp}</a></span>
      <!--<span><a href="{pboot:sitedomain}/sitemap.xml" target="_blank">XML地图</a></span>-->
      <span>技术支持：<a href="https://space.bilibili.com/398496101" target="_blank">霜叶吟昒</a></span>
      <span>{pboot:sitestatistical}</span>
      </p>
</section>
  </section>
</div>
<section id="menu">
  <section>
    <form action="{pboot:scaction}" method="get" role="search" class="search">
      <input type="text" name="keyword" placeholder="输入内容回车搜索">
    </form>
  </section>
  <section>
    <ul class="links">
      <li><a href="{pboot:sitedomain}">首页</a></li>
      {pboot:nav num=10 parent=0}
      <li><a href="[nav:link]">[nav:name]</a></li>
	  {/pboot:nav}
    </ul>
  </section>
</section>
<script>

    $(function() {

        var surl = location.href;

        var surl2 = $(".breadcrumbs a:eq(1)").attr("href");

        $("#header nav ul li a").each(function() {

            if ($(this).attr("href") == surl || $(this).attr("href") == surl2) $(this).addClass(

                "active")

        });

    });

</script> 
<script type="text/javascript" src="{pboot:sitetplpath}/js/browser.min.js?t=1625450376"></script>
<script type="text/javascript" src="{pboot:sitetplpath}/js/breakpoints.min.js?t=1625450376"></script>
<script type="text/javascript" src="{pboot:sitetplpath}/js/util.js?t=1625450384"></script>
<script type="text/javascript" src="{pboot:sitetplpath}/js/main.js?t=1625450382"></script>
<div class="Jz52-gotop fas fa-angle-double-up"><span class="label">返回顶部</span></div>
</body>
</html>
<?php return array (
  0 => '/www/wwwroot/117.72.81.203/template/default/html/head.html',
  1 => '/www/wwwroot/117.72.81.203/template/default/html/left.html',
  2 => '/www/wwwroot/117.72.81.203/template/default/html/foot.html',
  3 => '/www/wwwroot/117.72.81.203/template/default/html/menu.html',
); ?>