<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登录OnlyMyBlog | 轻博客</title>
<meta http-equiv="X-UA-Compatible" content="IE=100" />
<link rel="shortcut icon" type="image/x-icon" href="http://s.libdd.com/img/icon/favicon.$5106.ico" />
<!--[if lt IE 7]>
<script>
try { document.execCommand('BackgroundImageCache', false, true); } catch (e) {}
</script>
<![endif]-->
<script>
window.DDformKey = '908d4425f621a01a656f99c0bdd9221c';
window.DDHostName = 'web01.dd.hn';
window.DDrev = '23085 e03eafe76908 2012111216 built by liwei';
window.DDrequestStart = '1352866223128';
window.DDrequestEnd = '1352866223202';
</script>
<link href="http://localhost:8887/blog/Tpl/Login/css/layout.css" rel="stylesheet" type="text/css" />
<script src="http://s.libdd.com/js/kissy/1.2/seed.$6804.js"></script>
<script>
KISSY.use("app/reg-login-third.$7202", function(S, app){
ENV.page = 'login';
S.ready(function() {
app.initLogin();
});
})
</script>
</head>
<body>
<div id="startpage" class="clearfix">
  <div id="reg-login-switch"> <a href="#" id="go-register">注册</a></div>
  <div id="startpage-wrap" class="login-bg">
    <h1 id="logo-startpage"> <span class="login-logo"> <a  id="login_pic" href="http://localhost:8887/blog/">OnlyMyBlog - 让博客从此中二</a> </span> </h1>
    <div id="login-wrap">
      <div id="login-form-wrap">
        <form id="login-form" class="clearfix" action="__APP__/Login/loginCheck" method="post">
          <div class="input-wrap" id="input-login-email"> <span class="input-icon"></span>
            <label>邮箱/手机号</label>
            <input class="startpage-input-text" type="text" name="name" value="">
          </div>
          <div class="input-wrap" id="input-login-pwd"> <span class="input-icon"></span>
            <label>密码</label>
            <input class="startpage-input-text" type="password" name="password" >
            <div class="tip" style="display:none"></div>
          </div>
          <input type="hidden" name="nextUrl" value="" />
          <input type="hidden" name="lcallback" value="" />
          <input type="hidden" name="persistent" value="1" checked="checked">
          <input type="submit" name="login-submit" class="input-button hidden-submit" value="登录">
          <div cloud="type:Button;id:login-submit;width:283;skin:willblue">登录</div>
        </form>
      </div>
    </div>

  </div>
</div>
<iframe src="http://acl.a.libdd.com/acl.html?2" width="0" height="0" frameborder="0"></iframe>
</body>
</html>