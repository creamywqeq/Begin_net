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
	<?php if ($this->getVar('list')) {?>
	<div class="layui-tab layui-tab-brief" lay-filter="tab">
	  <ul class="layui-tab-title">
	    <li class="layui-this" lay-id="t1">模型列表</li>
	    <li lay-id="t2">模型新增</li>
	  </ul>
	  <div class="layui-tab-content">
	  	   <div class="layui-tab-item layui-show">
	  	   		 <table class="layui-table">
	            	<thead>
	                    <tr>
	                    	<th>序号</th>
	                        <th>名称</th>
	                        <th>类型</th>
	                        <th>URL名称</th>
	                        <th>列表页模板</th>
	                        <th>详情页模板</th>
	                        <th>状态</th>
	                        <th>操作</th>
	                    </tr>
	                </thead>
	                <tbody>
	                    <?php $num = 0;foreach ($this->getVar('models') as $key => $value) { $num++;?>
	                    <tr>
	                    	<td><?php echo @(PAGE-1)*PAGESIZE+$num; ?></td>
	                        <td><?php echo $value->name; ?></td>
	                        <td>
								<?php if ($value->type==1) {?>单页<?php } ?>
	                        	<?php if ($value->type==2) {?>列表<?php } ?>
							</td>
							<td><?php echo $value->urlname; ?></td>
	                        <td><?php echo $value->listtpl; ?></td>
	                        <td><?php echo $value->contenttpl; ?></td>
	                        <td>
	                            <?php if ($value->status) {?>
	                            <a href="<?php echo \core\basic\Url::get('/admin/'.C.'/mod/id/'.$value->id.'/field/status/value/0');?>" class="switch"><i class='fa fa-toggle-on' title="点击禁用"></i></a>
	                            <?php } else { ?>
	                            <a href="<?php echo \core\basic\Url::get('/admin/'.C.'/mod/id/'.$value->id.'/field/status/value/1');?>" class="switch"><i class='fa fa-toggle-off' title="点击启用"></i></a>
	                            <?php } ?>
	                        </td>
	                        <td>
	                        	<?php if (!$value->issystem) {?>
	                            	<?php echo get_btn_del($value->id);?>
	                            <?php } ?>
	                            <?php echo get_btn_mod($value->id);?>
	                        </td>
	                    </tr>
	                    <?php } ?>
	                </tbody>
	            </table>
	            <div class="page"><?php echo $this->getVar('pagebar');?></div>
	  	   </div>
	  	   
	  	   <div class="layui-tab-item">
	  	   		<form action="<?php echo \core\basic\Url::get('/admin/Model/add');?>" method="post" class="layui-form">
	                <input type="hidden" name="formcheck" value="<?php echo $this->getVar('formcheck');?>" > 
	                <div class="layui-form-item">
	                     <label class="layui-form-label">模型名称  <span class="layui-text-red">*</span></label>
	                     <div class="layui-input-block">
	                     	<input type="text" name="name" required lay-verify="required" placeholder="请输入模型名称" class="layui-input">
	                     </div>
	                </div>
	                
	                 <div class="layui-form-item">
	                     <label class="layui-form-label">模型类型  <span class="layui-text-red">*</span></label>
	                     <div class="layui-input-block">
	                     	 <select name="type" lay-verify="required">
		                     	<option value="">请选择模型类型</option>
		                        <option value="1">单页</option>
		                        <option value="2">列表</option>
		                    </select>
	                     </div>
	                </div>
	                
	                <div class="layui-form-item">
	                     <label class="layui-form-label">URL名称 </label>
	                     <div class="layui-input-block">
	                     	<input type="text" name="urlname"  placeholder="请输入URL地址名称，如：news" class="layui-input">
	                     </div>
	                </div>
	                
	                <div class="layui-form-item">
	                     <label class="layui-form-label">列表页模板</label>
	                     <div class="layui-input-block">
	                     	<input type="text" name="listtpl" placeholder="请输入列表页模板" class="layui-input">
	                     </div>
	                </div>
	                
	                <div class="layui-form-item">
	                     <label class="layui-form-label">详情页模板</label>
	                     <div class="layui-input-block">
	                     	<input type="text" name="contenttpl" placeholder="请输入详情页模板" class="layui-input">
	                     </div>
	                </div>
	                
	                <div class="layui-form-item">
	                     <label class="layui-form-label">状态</label>
	                     <div class="layui-input-block">
	                     	<input type="radio" name="status" value="1" title="启用" checked>
							<input type="radio" name="status" value="0" title="禁用">
	                     </div>
	                </div>
	  	   		
	  	   			<div class="layui-form-item">
						 <div class="layui-input-block">
						    <button class="layui-btn" lay-submit>立即提交</button>
						    <button type="reset" class="layui-btn layui-btn-primary">重置</button>
						 </div>
					</div>

	  	   		</form>
	  	   </div>
	  </div>
	</div>
	<?php } ?> 
	
	<?php if ($this->getVar('mod')) {?>
	<div class="layui-tab layui-tab-brief" lay-filter="tab">
	  <ul class="layui-tab-title">
	    <li class="layui-this">模型修改</li>
	  </ul>
	  <div class="layui-tab-content">
	  	<div class="layui-tab-item layui-show">
	  		<form action="<?php echo \core\basic\Url::get('/admin/Model/mod/id/'.get('id').'');?><?php echo $this->getVar('backurl');?>" method="post" class="layui-form">
	  			<input type="hidden" name="formcheck" value="<?php echo $this->getVar('formcheck');?>" > 
	  			<div class="layui-form-item">
                     <label class="layui-form-label">模型名称 <span class="layui-text-red">*</span></label>
                     <div class="layui-input-block">
                     	<input type="text" name="name" required lay-verify="required" value="<?php echo @$this->getVar('model')->name;?>" placeholder="请输入模型名称" class="layui-input">
                     </div>
                </div>
                
                 <div class="layui-form-item">
                     <label class="layui-form-label">模型类型  <span class="layui-text-red">*</span></label>
                     <div class="layui-input-block">
                     	 <select name="type" lay-verify="required">
	                     	<option value="">请选择模型类型</option>
	                        <option value="1" <?php if ($this->getVar('model')->type==1) {?>selected<?php } ?>>单页</option>
	                        <option value="2" <?php if ($this->getVar('model')->type==2) {?>selected<?php } ?>>列表</option>
	                    </select>
                     </div>
                </div>
                
                <div class="layui-form-item">
                     <label class="layui-form-label">URL名称</label>
                     <div class="layui-input-block">
                     	<input type="text" name="urlname" value="<?php echo @$this->getVar('model')->urlname;?>" placeholder="请输入URL地址名称，如：news" class="layui-input">
                     </div>
                </div>
                
                <div class="layui-form-item">
                     <label class="layui-form-label">列表页模板</label>
                     <div class="layui-input-block">
                     	<input type="text" name="listtpl" value="<?php echo @$this->getVar('model')->listtpl;?>" placeholder="请输入列表页模板" class="layui-input">
                     </div>
                </div>
                
                <div class="layui-form-item">
                     <label class="layui-form-label">详情页模板</label>
                     <div class="layui-input-block">
                     	<input type="text" name="contenttpl"  value="<?php echo @$this->getVar('model')->contenttpl;?>" placeholder="请输入详情页模板" class="layui-input">
                     </div>
                </div>
                
                <div class="layui-form-item">
                     <label class="layui-form-label">状态</label>
                     <div class="layui-input-block">
                     	<input type="radio" name="status" value="1" title="启用" <?php if ($this->getVar('model')->status==1) {?>checked<?php } ?>>
						<input type="radio" name="status" value="0" title="禁用" <?php if ($this->getVar('model')->status==0) {?>checked<?php } ?>>
                     </div>
                </div>
  	   		
  	   			<div class="layui-form-item">
					 <div class="layui-input-block">
					    <button class="layui-btn" lay-submit>立即提交</button>
					    <button type="reset" class="layui-btn layui-btn-primary">重置</button>
					    <?php echo get_btn_back();?>
					 </div>
				</div>	
	  		</form>
	  	</div>
	  </div>
	 </div>
	<?php } ?> 

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
  0 => '/www/wwwroot/117.72.81.203/apps/admin/view/default/common/head.html',
  1 => '/www/wwwroot/117.72.81.203/apps/admin/view/default/common/foot.html',
); ?>