<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="renderer"  content="webkit">
  <title><?php echo CMSNAME;?>管理后台-V<?php echo APP_VERSION;?>-<?php echo RELEASE_TIME;?></title>
  <link rel="shortcut icon" href="<?php echo SITE_DIR;?>/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="<?php echo APP_THEME_DIR;?>/layui/css/layui.css?v=v2.5.4">
  <link rel="stylesheet" href="<?php echo APP_THEME_DIR;?>/font-awesome/css/font-awesome.min.css?v=v4.7.0" type="text/css">
  <link rel="stylesheet" href="<?php echo APP_THEME_DIR;?>/css/comm.css?v=v3.0.6">
  <link href="<?php echo APP_THEME_DIR;?>/css/jquery.treetable.css" rel="stylesheet" type="text/css" />
  <script type="text/javascript" src="<?php echo APP_THEME_DIR;?>/js/jquery-1.12.4.min.js"></script>
  <script type="text/javascript" src="<?php echo APP_THEME_DIR;?>/js/jquery.treetable.js"></script>
</head>

<body class="layui-layout-body">

<!--定义部分地址方便JS调用-->
<div style="display: none">
	<span id="controller" data-controller="<?php echo C;?>"></span>
	<span id="url" data-url="<?php echo URL;?>"></span>
	<span id="preurl" data-preurl="<?php echo url('/admin',false);?>"></span>
	<span id="sitedir" data-sitedir="<?php echo SITE_DIR;?>"></span>
	<span id="mcode" data-mcode="<?php echo get('mcode');?>"></span>
</div>

<div class="layui-layout layui-layout-admin">
  <div class="layui-header">
    <div class="layui-logo">
    <a href="<?php echo \core\basic\Url::get('/admin/Index/home');?>">
    <img src="<?php echo APP_THEME_DIR;?>/images/logo.png" height="30">
	    <?php echo CMSNAME;?> 
	   	<?php if (LICENSE==3) {?>
	   		<span class="layui-badge">SVIP</span>
	   	<?php } else { ?>
	   		<span class="layui-badge layui-bg-gray">V<?php echo APP_VERSION;?></span>	
	   	<?php } ?>
    </a>
    </div>
    
    <ul class="menu">
    	<li class="menu-ico" title="显示或隐藏侧边栏"><i class="fa fa-bars" aria-hidden="true"></i></li>
	</ul>
	<?php if (!$this->getVar('one_area')) {?>
	<form method="post" action="<?php echo \core\basic\Url::get('/admin/Index/area');?>" class="area-select">
		<input type="hidden" name="formcheck" value="<?php echo $this->getVar('formcheck');?>" > 
		<div class="layui-col-xs8">
		   <select name="acode">
		       <?php echo $this->getVar('area_html');?>
		   </select>
		</div>
		<div class="layui-col-xs4">
		 	<button type="submit" class="layui-btn layui-btn-sm">切换</button>
		</div>
   	</form>
 	<?php } ?>

    <ul class="layui-nav layui-layout-right">
    
       <li class="layui-nav-item layui-hide-xs">
      	 <a href="<?php echo SITE_DIR;?>/" target="_blank"><i class="fa fa-home" aria-hidden="true"></i> 网站主页</a>
       </li>

       <li class="layui-nav-item layui-hide-xs">
       		<a href="<?php echo \core\basic\Url::get('/admin/Index/clearCache');?>" class="ajaxlink"><i class="fa fa-trash-o" aria-hidden="true"></i> 清理缓存</a>
       </li>
       
       <li class="layui-nav-item layui-hide-xs">
	        <a href="javascript:;">
	          <i class="fa fa-user-circle-o" aria-hidden="true"></i> <?php echo session('realname');?>
	        </a>
	        <dl class="layui-nav-child">
	          <dd><a href="<?php echo \core\basic\Url::get('/admin/Index/ucenter');?>"><i class="fa fa-address-card-o" aria-hidden="true"></i> 密码修改</a></dd>
	          <dd><a href="<?php echo \core\basic\Url::get('/admin/Index/loginOut');?>"><i class="fa fa-sign-out" aria-hidden="true"></i> 退出登录</a></dd>
	          <?php if (session('ucode')==10001) {?>
	          	<dd><a href="<?php echo \core\basic\Url::get('/admin/Upgrade/index');?>"><i class="fa fa-cloud-upload" aria-hidden="true"></i> 在线更新</a></dd>
	          	<dd><a href="<?php echo \core\basic\Url::get('/admin/Index/clearSession');?>" class="ajaxlink"><i class="fa fa-trash-o" aria-hidden="true"></i> 清理会话</a></dd>
	          <?php } ?>
	        </dl>
      </li>
    </ul>
  </div>
  
  <div class="layui-side layui-bg-black">
    <div class="layui-side-scroll">
      <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
      <ul class="layui-nav layui-nav-tree" id="nav" lay-shrink="all">
	   <?php $num = 0;foreach ($this->getVar('menu_tree') as $key => $value) { $num++;?>
        <li class="layui-nav-item nav-item <?php if ($this->getVar('primary_menu_url')==$value->url) {?>layui-nav-itemed<?php } ?>">
          <a class="" href="javascript:;"><i class="fa <?php echo $value->ico; ?>" aria-hidden="true"></i><?php echo $value->name; ?></a>
          <dl class="layui-nav-child">
			<?php if ($value->mcode=='M130') {?>
				 <?php $num3 = 0;foreach ($this->getVar('menu_models') as $key3 => $value3) { $num3++;?>
				 	<?php if ($value3->type==1) {?>
						<dd><a href="<?php echo \core\basic\Url::get('/admin/Single/index/mcode/'.$value3->mcode.'');?>"><i class="fa fa-file-text-o" aria-hidden="true"></i><?php echo $value3->name; ?>内容</a></dd>
					<?php } ?>
					<?php if ($value3->type==2) {?>
						<dd><a href="<?php echo \core\basic\Url::get('/admin/Content/index/mcode/'.$value3->mcode.'');?>"><i class="fa fa-file-text-o" aria-hidden="true"></i><?php echo $value3->name; ?>内容</a></dd>
					<?php } ?>
				 <?php } ?>
			<?php } else { ?>
				<?php $num2 = 0;foreach ($value->son as $key2 => $value2) { $num2++;?>
					<?php if (!isset($value2->status)|| $value2->status==1) {?>
	            		<dd><a href="<?php echo \core\basic\Url::get(''.$value2->url.'');?>"><i class="fa <?php echo $value2->ico; ?>" aria-hidden="true"></i><?php echo $value2->name; ?></a></dd>
	            	<?php } ?>
				<?php } ?>
				
				<?php if ($value->mcode=='M101' && session('ucode')==10001) {?>
					<dd><a href="<?php echo \core\basic\Url::get('/admin/Upgrade/index');?>"><i class="fa fa-cloud-upload" aria-hidden="true"></i>在线更新</a></dd>
				<?php } ?>
		    <?php } ?>
          </dl>
        </li>
		<?php } ?>
		
		<li style="height:1px;background:#666" class="layui-hide-sm"></li>
		
		<li class="layui-nav-item layui-hide-sm">
		 <a href="<?php echo SITE_DIR;?>/" target="_blank"><i class="fa fa-home" aria-hidden="true"></i> 网站主页</a>
		</li>
		
		<li class="layui-nav-item layui-hide-sm">
          <a href="<?php echo \core\basic\Url::get('/admin/Index/ucenter');?>"><i class="fa fa-address-card-o" aria-hidden="true"></i> 资料修改</a>
        </li>
        
        <li class="layui-nav-item layui-hide-sm">
         <a href="<?php echo \core\basic\Url::get('/admin/Index/clearCache');?>"><i class="fa fa-trash-o" aria-hidden="true"></i> 清理缓存</a>
        </li>
        
        <li class="layui-nav-item layui-hide-sm">
         <a href="<?php echo \core\basic\Url::get('/admin/Index/loginOut');?>"><i class="fa fa-sign-out" aria-hidden="true"></i> 退出登录</a>
        </li>

      </ul>
    </div>
  </div>

<div class="layui-body">
	<div class="layui-tab layui-tab-brief" lay-filter="tab">
	  <ul class="layui-tab-title">
	    <li class="layui-this" lay-id="t1">服务器基本信息</li>
	  </ul>
	  <div class="layui-tab-content">
	  	   <div class="layui-tab-item layui-show">
				<table class="layui-table table-two">
				   <thead>
					    <tr>
			               <th colspan=2>服务器基本信息</th>
					    </tr> 
				   </thead>
				   <tbody>
						<tr>
							<th>应用版本</th>
							<td><?php echo CMSNAME;?> V<?php echo APP_VERSION;?>-<?php echo RELEASE_TIME;?></td>
						</tr>
	
						<tr>
							<th>主机系统</th>
							<td><?php echo @$this->getVar('server')->php_os;?></td>
						</tr>
						<tr>
						      <th>访问地址</th>
						      <td><?php echo @$this->getVar('server')->http_host;?></td>
						  </tr>
						  <tr>
						      <th>主机名称</th>
						      <td><?php echo @$this->getVar('server')->server_name;?></td>
						  </tr>
						
						  <tr>
						       <th>主机地址</th>
						       <td><?php echo @$this->getVar('server')->server_addr;?></td>
						  </tr>
						  <tr>
						      <th>主机端口</th>
						      <td><?php echo @$this->getVar('server')->server_port;?></td>
						  </tr>
						
						 <tr>
						      <th>WEB软件</th>
						      <td><?php echo @$this->getVar('server')->server_software;?></td>
						  </tr>	  
						  
						  <tr>
						     <th>PHP版</th>
						     <td><?php echo @$this->getVar('server')->php_version;?></td>
						 </tr>
						
						<tr>
						     <th>数据库驱动</th>
						     <td><?php echo @$this->getVar('server')->db_driver;?></td>
						 </tr>
						
						
						<tr>
						     <th>文件上传限制</th>
						     <td><?php echo @$this->getVar('server')->upload_max_filesize;?></td>
						</tr>
						   
						<tr>
						    <th>表单提交限制</th>
						    <td><?php echo @$this->getVar('server')->post_max_size;?></td>
						</tr>
						
						<tr>
						     <th>最大提交数量</th>
						     <td><?php echo @$this->getVar('server')->max_file_uploads;?></td>
						</tr>
						
						<tr>
						     <th>分配内存限制</th>
						     <td><?php echo @$this->getVar('server')->memory_limit;?></td>
						</tr>
						
						<tr>
						     <th>GD库支持</th>
						     <td><?php echo @$this->getVar('server')->gd;?></td>
						</tr>
						   
						<tr>
						    <th>Curl支持</th>
						    <td><?php echo @$this->getVar('server')->curl;?></td>
						</tr>
						
						<tr>
						   <th>加速模块支持</th>
						    <td>
						          pthreads：<?php echo @$this->getVar('server')->pthreads;?>；
						          XCache：<?php echo @$this->getVar('server')->xcache;?>；
						          APC：<?php echo @$this->getVar('server')->apc;?>； 
						          eAccelerator：<?php echo @$this->getVar('server')->eaccelerator;?>； 
						          WinCache：<?php echo @$this->getVar('server')->wincache;?>； 
						          ZendOPcache：<?php echo @$this->getVar('server')->zendopcache;?>；
						          Memcache：<?php echo @$this->getVar('server')->memcache;?>； 
						          Memcached：<?php echo @$this->getVar('server')->memcached;?>；
						    </td>
						</tr>
						
						<tr>
						    <th>已加载模块</th>
						    <td><?php echo @$this->getVar('server')->extensions;?></td>
						</tr>               
					</tbody>
				</table>
		    </div>
	  </div>
	</div>
</div>

  
</div>

<script type="text/javascript" src="<?php echo APP_THEME_DIR;?>/layui/layui.all.js?v=v2.5.4"></script>
<script type="text/javascript" src="<?php echo APP_THEME_DIR;?>/js/comm.js?v=v3.1.1"></script>
<script type="text/javascript" src="<?php echo APP_THEME_DIR;?>/js/mylayui.js?v=v3.1.0"></script>


<!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
<!--[if lt IE 9]>
  <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
  <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

</body>
</html>

<?php return array (
  0 => '/www/wwwroot/www.yyh.com/apps/admin/view/default/common/head.html',
  1 => '/www/wwwroot/www.yyh.com/apps/admin/view/default/common/foot.html',
); ?>