<?php
/**
 * Created by PhpStorm.
 * User: kilo
 * Date: 2017/10/20
 * Time: 17:07
 */
?>



<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="noodp, noydir" />
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="-1">
    <meta name="data-spm" content="a1z23" />
    <title>阿里巴巴集团首页</title>
    <link rel="shortcut icon" href="https://g.alicdn.com/vip/havana-login/0.3.0/images/favicon.ico?v=20141022" type="image/x-icon"/>
    <link href="https://g.alicdn.com/vip/havana-login/0.3.0/css/mini-login-form-min.css" rel="stylesheet" type="text/css" />
    <link href="https://g.alicdn.com/vip/havana-login/0.2.1/css/module/aliyun-min.css" rel="stylesheet" type="text/css" />
</head>
<body id="mini-login-body" scroll="no" class="aliyun lang-zh_CN  "  data-spm="3047821"	 ><script>
    with(document)with(body)with(insertBefore(createElement("script"),firstChild))setAttribute("exparams","category=&userid=&aplus&yunid=&831eb8e19e77&trid=0bfa910615084903895964814e&asid=AQAAAACVvOlZGVU9GAAAAAD39Ra0CnzKvw==",id="tb-beacon-aplus",src=(location>"https"?"//g":"//g")+".alicdn.com/alilog/mlog/aplus_v2.js")
</script>

<div id="login-wrap"  class=" login-static  nc-outer-box"    >
    <div class="hd" >
        <h2 id="J_Static2Quick" class="quick" tabindex="0">快速登录</h2>
        <h2 id="J_Quick2Static" class="static" tabindex="0">账密登录</h2>
        <div class="login-tip">
            <div class="poptip">
                <div class="poptip-arrow">
                    <em></em>
                    <span></span>
                </div>
                <div class="poptip-content">
                    扫码登录                </div>
            </div>
        </div>
        <div class="login-tip login-tip2">
            <div class="poptip">
                <div class="poptip-arrow">
                    <em></em>
                    <span></span>
                </div>
                <div class="poptip-content">
                    密码登录                </div>
            </div>
        </div>
    </div>

    <div class="qrcode-login" id="J_QRCodeLogin">
        <div class="title">
            扫码登录        </div>
        <div class="qrcode-mod">
            <div class="qrcode-main">
                <div class="qrcode-img" id="J_QRCodeImg" style="opacity: 1;"></div>
            </div>

            <p class="qrcode-desc qrcode-desc-title" style="font-weight: bold;font-size: 14px;">手机扫码 安全登录</p>
            <p class="qrcode-desc">打开 <a href="https://promotion.aliyun.com/ntms/mobile.html" target="_blank">阿里云APP</a> 扫一扫登录</p>
        </div>
        <div class="qrcode-msg">
            <div class="msg-err">
                <p><i class="iconfont icon-error">&#xe61b;</i></p>
                <h6 class="error-expired" style="display:none;">二维码已失效</h6>
                <h6 class="error-canceled">登录失败</h6>
                <p class="qrcode-refresh-tips">请刷新二维码后重新扫码</p>
                <p><a href="javascript:;" class="fm-button refresh J_QRCodeRefresh">刷新二维码</a>
                </p>
            </div>
            <div class="msg-ok">
                <p><i class="iconfont icon-ok">&#xe60e;</i></p>
                <h6>扫描成功！</h6>
                <p>请在手机上根据提示确认登录</p>
            </div>
        </div>
        <div id="qrlogin-other">
            <div class="register">
                <a href="https://account.aliyun.com/register/register.htm?spm=5176.8142029.388261.6.VmfdL4&amp;qrCodeFirst=false&amp;oauth_callback=https%3A%2F%2Fwww.aliyun.com%2F%3Futm_medium%3Dtext%26utm_source%3Dbdbrand%26utm_campaign%3Dbdbrand%26utm_content%3Dse_32492" class="register" target=" _blank" data-spm-protocol="i">免费注册</a>
            </div>
            <div class="app-download-link">
                <a href="https://promotion.aliyun.com/ntms/mobile.html" target="_blank">下载阿里云APP</a>            </div>
        </div>
    </div>

    <form id="login-form" name="login-form" method="post"
          class="form clr style-type-vertical lang-zh_CN vertical-zh_CN ">
        <div class="title">
            密码登录        </div>
        <div id="login-title" style="font-size:12px;font-weight:normal;">
            淘宝及1688帐号可直接使用会员名登录</div>

        <div id="login-loading" class="loading-mask">
            <div class="loading-icon"></div>
            <div class="loading-mask-body"></div>
        </div>


        <div id="login-error" class="form-error notice notice-error">
            <span class="icon-notice icon-error"></span>
            <span class="notice-descript"></span>
        </div>


        <div id="login-content" class="form clr">
            <dl>
                <dt class="fm-label">
                <div class="fm-label-wrap clr">
                <span id="login-id-label-extra" class="fm-label-extra">
                    				</span>
                    <label for="fm-login-id">                    登录名                :</label>
                </div>
                </dt>
                <dd id="fm-login-id-wrap" class="fm-field">
                    <div class="fm-field-wrap ">
                        <div id="account-check-loading" class="loading-mask">
                            <div class="loading-icon"></div>
                            <div class="loading-mask-body"></div>
                        </div>

                        <input id="fm-login-id" class="fm-text" name="loginId" tabindex="1"
                               placeholder="邮箱/会员名/8位ID"
                               value="" autocorrect="off" autocapitalize="off"
                        />

                    </div>
                </dd>
            </dl>
            <dl>
                <dt class="fm-label">
                <div class="fm-label-wrap clr">
                    <label for="fm-login-password">登录密码:</label>
                </div>
                </dt>
                <dd id="fm-login-password-wrap" class="fm-field">
                    <div class="fm-field-wrap">
                        <input id="fm-login-password" class="fm-text" type="password" name="password" tabindex="2"
                               placeholder="登录密码"
                               autocorrect="off" autocapitalize="off"
                        />
                    </div>
                </dd>
            </dl>
            <dl class="fm-login-checkcode-nc">
                <dt id="fm-login-checkcode-title" class="about-checkcode fm-label">
                    <label for="fm-login-checkcode">滑动验证码:</label>
                </dt>
                <dd id="fm-login-checkcode-wrap" class="about-checkcode fm-field">
                    <div id="nocaptcha" class="nc-container tb-login"></div>
                </dd>
                <dd id="fm-login-extra" class="fm-field">

                </dd>
            </dl>
        </div>
        <div id="login-submit">
            <input type="hidden" name="event_submit_do_login" value="submit"/>
            <input id="fm-login-submit" value="登录" class="fm-button fm-submit" type="submit"
                   tabindex="4" name="submit-btn"/>
        </div>
        <div id="login-other">
            <div class="login-login-links">
            </div>

            <div class="register">
                <a href="https://account.aliyun.com/register/register.htm?spm=5176.8142029.388261.6.VmfdL4&amp;qrCodeFirst=false&amp;oauth_callback=https%3A%2F%2Fwww.aliyun.com%2F%3Futm_medium%3Dtext%26utm_source%3Dbdbrand%26utm_campaign%3Dbdbrand%26utm_content%3Dse_32492" class="register" target=" _blank" data-spm-protocol="i">免费注册</a>
            </div>
            <span class="fm-label-extra">
            <a id="forgot-password-link" href="https://passport.alibaba.com/ac/password_find.htm?lang=zh_CN&amp;appName=aliyun&amp;fromSite=6" target="_blank" data-spm-protocol="i">忘记密码</a>
    </span>

        </div>
        <div class="login-login-links"><span class="thirdpart-login-text">其他方式登录：</span><span id="thirdpart-login"></span></div>
        <input id="fm-app-name" name="appName" value="aliyun" type="hidden"/>
        <input id="fm-app-entrance" name="appEntrance" value="aliyun" type="hidden"/>
        <input id="fm-csrf-tk" name="_csrf_token" value="U4tMiXGorCC2Eue85zq1WA" type="hidden"/>
        <input id="fm-rds-tk" name="rdsToken" value="" type="hidden"/>
        <input id="fm-cid" name="cid" value="00298ea5-798b-4232-8445-cb43327c6371" type="hidden"/>
        <input id="fm-umid-token" name="umidToken" value="210f6f3fdc138c4106f433f86130e2e1ee46a1f1" type="hidden"/>
        <input id="fm-lang" name="lang" value="zh_CN" type="hidden"/>
        <input id="fm-hsid" name="hsid" value="1fd8f1371f95d23c8c0613b22a463d94" type="hidden"/>
        <input id="fm-is-rds-ready" name="isRDSReady" value="false" type="hidden"/>
        <input id="fm-is-umid-ready" name="isUMIDReady" value="false" type="hidden"/>
        <input id="fm-umid-getstatus" name="umidGetStatusVal" type="hidden"/>
        <input id="fm-biz-params" name="bizParams" value="" type="hidden"/>
        <input id="fm-is-requires-has-timeout" name="isRequiresHasTimeout" value="false" type="hidden"/>
        <input id="login-host" name="loginHost" value="https://passport.alibaba.com/" type="hidden"/>
        <input id="fm-scene" name="scene" value="" type="hidden"/>
        <input id="fm-isMobile" name="isMobile" value="false"
               type="hidden"/>
        <input id="fm-modulus" name="modulus"  value="d3bcef1f00424f3261c89323fa8cdfa12bbac400d9fe8bb627e8d27a44bd5d59dce559135d678a8143beb5b8d7056c4e1f89c4e1f152470625b7b41944a97f02da6f605a49a93ec6eb9cbaf2e7ac2b26a354ce69eb265953d2c29e395d6d8c1cdb688978551aa0f7521f290035fad381178da0bea8f9e6adce39020f513133fb" type="hidden" />
        <input id="fm-exponent" name="exponent"  value="10001" type="hidden" />
    </form>


    <script type="text/javascript" charset="utf-8" src="//g.alicdn.com/sd/ncpc/nc.js?t=2015052012"></script>
    <script>

        var UA_Opt = new Object;
        UA_Opt.ExTarget = ['fm-login-password'];
        UA_Opt.FormId = "login-form";

        (function () {
            var nc = new noCaptcha();
            var opt = window.NC_Opt = {
                renderTo: "nocaptcha",
                appkey: "CF_APP_TBLogin_PC",
                token: "210f6f3fdc138c4106f433f86130e2e1ee46a1f1",
//            is_Opt: 1,
                elementID: ["fm-login-id"],
                language: "zh_CN",
                isEnabled: true,
                is_tbLogin: true,
                trans: {"isMobile": "false"},
                times: 3,
                callback: function (data) {
                    opt.__sig = data.sig;
                    opt.__csessionid = data.csessionid;
                },
                error: function (s) {
                    window.console && console.log("error");
                    window.console && console.log(s);
                },
                foreign: "0"
            };

            nc.init(opt);

        })();
    </script>


</div>

<script type="text/javascript" charset="utf-8" src="https://g.alicdn.com/vip/havana-login/0.3.0/js/mini-login-min.js"></script>
<script>
    HVN.ajaxSetup({csrfLongToken:'U4tMiXGorCC2Eue85zq1WA'});
    HVN.i18n['ajax-500-error'] = '操作已超时，请刷新后登录';
    var miniLogin = HVN.page.MiniLogin();
    miniLogin.init({
        'fromSite':-2,
        'isCheckCodeShowed' : eval('false'),
        'checkCodeLink' : '',
        i18n : {
            'error-fm-login-id-empty' : ' 请输入帐户名 ',
            'error-fm-login-password-empty' : '请输入密码',
            'error-login-checkcode-empty' : '请输入验证码',
            'error-login-havana-checkcode-empty' : '请拖动滑块完成验证',
            'error-login-havana-audiocheckcode-empty' : '请输入语音验证码'
        },
        qrCodeGenDomain:'https://gcodex.alicdn.com',
        useGcodeQrCode: true,
        qrCodeUseShortLink: true,
        qrCodeLogin:true,
    });
</script>
<script type="text/javascript" charset="utf-8" src="https://g.alicdn.com/vip/havana-login/0.3.0/js/thirdpart-login-min.js"></script>
<script>
    var thirdLogin = new window.ThirdPartLogin();

    thirdLogin.init({
        targetId: "thirdpart-login",
        isMobile: false,
        lang: "zh_CN",
        returnUrl: "https%3A%2F%2Faccount.aliyun.com%3A443%2Flogin%2Flogin_aliyun.htm%3Foauth_callback%3Dhttps%253A%252F%252Fwww.aliyun.com%252F%253Futm_medium%253Dtext%2526utm_source%253Dbdbrand%2526utm_campaign%253Dbdbrand%2526utm_content%253Dse_32492",
        returnUrlEncoded: true,
        appName: "aliyun",
        appEntrance: "aliyun",
        iframeUrl: "https://passport.alibaba.com/sns_oauth.htm",
        iconType: "" || "icon",
        iconSize: eval("22") || 25,
        iconMargin: eval("") || 10,
        windowWidth: eval("") || 800,
        windowHeight: eval("") || 600,
        loginType: [{"customUrl":"https://account.www.net.cn/weibo/login.htm","name":"weibo","responseAction":"top_redirect","text":"微博授权登录"},{"name":"alipay","responseAction":"top_redirect","text":"支付宝授权登录"},{"name":"dingtalk","onClickFn":"window.dingTalkEmbeddedQRLoginJumpFn","responseAction":"iframe","text":"钉钉授权登录"}]        });
</script>
<script>
    HVN("#login-id-label-extra").html('<a  href="https://account.aliyun.com/find_loginid/findLoginId.htm" target="_blank" data-spm-protocol="i">忘记登录名？</a>');
</script>

</body>


<div id="_umfp" style="display:inline;width:1px;height:1px;overflow:hidden">
    <img src="https://ynuf.alipay.com//service/clear.png?xt=210f6f3fdc138c4106f433f86130e2e1ee46a1f1&xa=090D1F110F18782C252D0E0009"/>
</div>




<!-- host: alibabalogin010178108105.et2  -->
</html>

