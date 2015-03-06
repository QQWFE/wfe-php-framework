<?php
/**
*@author liuxulei
*2015-2-24
*/	
class wechatController extends Controller_Action {
	
	public function jssdk(){
		
		require_once ROOT_PATH."/core/Tencent/Jssdk/jssdk.php";
		$jssdk = new JSSDK(Config::get_config_value('tencent')['app_id'], 
			Config::get_config_value('tencent')['app_secret']);
		$signPackage = $jssdk->GetSignPackage();
		?>
		<!DOCTYPE html>
		<html lang="en">
		<head>
		  <meta charset="UTF-8">
		  <title></title>
		</head>
		<body>
  
		</body>
		<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
		<script>
		  /*
		   * 注意：
		   * 1. 所有的JS接口只能在公众号绑定的域名下调用，公众号开发者需要先登录微信公众平台进入“公众号设置”的“功能设置”里填写“JS接口安全域名”。
		   * 2. 如果发现在 Android 不能分享自定义内容，请到官网下载最新的包覆盖安装，Android 自定义分享接口需升级至 6.0.2.58 版本及以上。
		   * 3. 常见问题及完整 JS-SDK 文档地址：http://mp.weixin.qq.com/wiki/7/aaa137b55fb2e0456bf8dd9148dd613f.html
		   *
		   * 开发中遇到问题详见文档“附录5-常见错误及解决办法”解决，如仍未能解决可通过以下渠道反馈：
		   * 邮箱地址：weixin-open@qq.com
		   * 邮件主题：【微信JS-SDK反馈】具体问题
		   * 邮件内容说明：用简明的语言描述问题所在，并交代清楚遇到该问题的场景，可附上截屏图片，微信团队会尽快处理你的反馈。
		   */
		  wx.config({
		    debug: true,
		    appId: '<?php echo $signPackage["appId"];?>',
		    timestamp: <?php echo $signPackage["timestamp"];?>,
		    nonceStr: '<?php echo $signPackage["nonceStr"];?>',
		    signature: '<?php echo $signPackage["signature"];?>',
		    jsApiList: [
		      // 所有要调用的 API 都要加到这个列表中
		    ]
		  });
		  wx.ready(function () {
		    // 在这里调用 API
		  });
		</script>
		</html><?php
	}
	
	public function testing(){
		

		include_once ROOT_PATH."/core/Tencent/Wechat/wxBizMsgCrypt.php";

		// 第三方发送消息给公众平台
		$encodingAesKey = "abcdefghijklmnopqrstuvwxyz0123456789ABCDEFG";
		$token = "pamtest";
		$timeStamp = "1409304348";
		$nonce = "xxxxxx";
		$appId = "wxb11529c136998cb6";
		$text = "<xml><ToUserName><![CDATA[oia2Tj我是中文jewbmiOUlr6X-1crbLOvLw]]></ToUserName><FromUserName><![CDATA[gh_7f083739789a]]></FromUserName><CreateTime>1407743423</CreateTime><MsgType><![CDATA[video]]></MsgType><Video><MediaId><![CDATA[eYJ1MbwPRJtOvIEabaxHs7TX2D-HV71s79GUxqdUkjm6Gs2Ed1KF3ulAOA9H1xG0]]></MediaId><Title><![CDATA[testCallBackReplyVideo]]></Title><Description><![CDATA[testCallBackReplyVideo]]></Description></Video></xml>";


		$pc = new WXBizMsgCrypt($token, $encodingAesKey, $appId);
		$encryptMsg = '';
		$errCode = $pc->encryptMsg($text, $timeStamp, $nonce, $encryptMsg);
		if ($errCode == 0) {
			print("加密后: " . $encryptMsg . "\n");
		} else {
			print($errCode . "\n");
		}

		$xml_tree = new DOMDocument();
		$xml_tree->loadXML($encryptMsg);
		$array_e = $xml_tree->getElementsByTagName('Encrypt');
		$array_s = $xml_tree->getElementsByTagName('MsgSignature');
		$encrypt = $array_e->item(0)->nodeValue;
		$msg_sign = $array_s->item(0)->nodeValue;

		$format = "<xml><ToUserName><![CDATA[toUser]]></ToUserName><Encrypt><![CDATA[%s]]></Encrypt></xml>";
		$from_xml = sprintf($format, $encrypt);

		// 第三方收到公众号平台发送的消息
		$msg = '';
		$errCode = $pc->decryptMsg($msg_sign, $timeStamp, $nonce, $from_xml, $msg);
		if ($errCode == 0) {
			print("解密后: " . $msg . "\n");
		} else {
			print($errCode . "\n");
		}
	}
}
	
?>