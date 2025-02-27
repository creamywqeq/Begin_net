<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="renderer"  content="webkit">
<title><?php echo CMSNAME;?>管理中心-V<?php echo APP_VERSION;?>-<?php echo RELEASE_TIME;?></title>
<link rel="shortcut icon" href="<?php echo SITE_DIR;?>/favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="<?php echo APP_THEME_DIR;?>/layui/css/layui.css?v=v2.5.4">
<link rel="stylesheet" href="<?php echo APP_THEME_DIR;?>/font-awesome/css/font-awesome.min.css?v=v4.7.0" type="text/css">
<link rel="stylesheet" href="<?php echo APP_THEME_DIR;?>/css/login.css?v=v1.1.6">
<script type="text/javascript" src="<?php echo APP_THEME_DIR;?>/js/jquery-1.12.4.min.js"></script>
</head>

<body>
	
<div class="user-login" >
	<div class="user-login-main">
		<div class="user-login-header">
			<h2>
			<img src="<?php echo APP_THEME_DIR;?>/images/logo.png" height="40">
			<?php echo CMSNAME;?>管理后台
			</h2>
			<p>高效、简洁、强悍的PHP网站管理系统</p>
		</div>
		
		<form action="<?php echo \core\basic\Url::get('/admin/Index/login');?>"  onsubmit="return false" class="layui-form" id="dologin">
			<input type="hidden" name="formcheck" id="formcheck" value="<?php echo $this->getVar('formcheck');?>" > 
			<div class="user-login-box">
				<div class="layui-form-item">
					<label class="user-login-icon layui-icon layui-icon-username"></label>
					<input name="username" id="username" type="text" lay-verify="required" placeholder="用户名" autocomplete="off" class="layui-input">
				</div>
				<div class="layui-form-item">
					<label class="user-login-icon layui-icon layui-icon-password"></label>
					<input name="password" id="password" type="password" lay-verify="required" placeholder="密码" autocomplete="off" class="layui-input">
				</div>
				<?php if (\core\basic\Config::get('admin_check_code')) {?>
				<div class="layui-form-item">
					<div class="layui-row">
						<div class="layui-col-xs7 layui-col-sm8">
							<label class="user-login-icon layui-icon layui-icon-vercode" ></label>
							<input name="checkcode" id="checkcode" type="text" lay-verify="required" placeholder="验证码" autocomplete="off" class="layui-input">
						</div>
						<div class="layui-col-xs5 layui-col-sm4">
							<div style="margin-left: 10px;"> 
								<img title="点击刷新"  src="<?php echo CORE_DIR;?>/code.php" class="user-login-codeimg" id="codeimg" onclick="this.src='<?php echo CORE_DIR;?>/code.php?'+Math.round(Math.random()*10);" />
						    </div>
						</div>
					</div>
				</div>
				<?php } ?>
				<div class="layui-form-item">
					<button class="layui-btn layui-btn-fluid" lay-submit lay-filter="login-submit" >登录后台</button>
				</div>
				<div style="color:red;" id="note"></div>
			</div>
		</form>
	</div>
	
	<?php if (CMSNAME=='PbootCMS') {?>
	<div class="layui-trans user-login-footer">
		<p>© 2018-<?php echo date('Y');?> <a href="http://www.pbootcms.com/" target="_blank">pbootcms.com</a></p>
		<p><span><a href="http://demo.pbootcms.com" target="_blank">在线演示</a></span><span><a href="http://www.pbootcms.com" target="_blank">前往官网</a></span><span><a href="http://www.ifyzx.com" target="_blank">枫雨在线</a></span></p>
	</div>
	<?php } ?>
	
</div>
	
	
<script type="text/javascript" src="<?php echo APP_THEME_DIR;?>/layui/layui.all.js?v=v2.5.4"></script> 
<script type="text/javascript" src="<?php echo APP_THEME_DIR;?>/js/mylayui.js?v=v1.1.6"></script> 

<!-- 让IE8/9支持媒体查询，从而兼容栅格 --> 
<!--[if lt IE 9]>
  <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
  <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
<![endif]--> 


</body>
</html><?php return array (
); ?>