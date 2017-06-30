# 契约锁PHP SDK示例
# sdk-php-sample
[契约锁](http://www.qiyuesuo.com) 成立于2015年，是新一代数字签名服务领域的领军企业。依托雄厚的企业管理软件服务经验，致力为全国的企业及个人用户提供最具可用性、稳定性及前瞻性的电子签署、数据存证及数据交互服务。 契约锁深耕企业级市场，产品线涵盖电子签署、合同管理、公文签发、数据存证等企业内签署场景，并提供本地签、远程签、标准签等多种API调用方式接入企业内部管理系统。目前主要为教育、旅游、互联网金融、政府事业单位、集团企业、B2B电商、地产中介、O2O等企业及个人提供签署、存证服务。 契约锁严格遵守《中华人民共和国电子签名法》，并联合公安部公民网络身份识别系统（eID）、工商相关身份识别系统、权威CA机构、公证处及律师事务所，确保在契约锁上签署的每一份合同真实且具有法律效力。 契约锁平台由上海亘岩网络科技有限公司运营开发，核心团队具有丰富的企业管理软件、金融支付行业、数字证书行业从业经验，致力于通过技术手段让企业合同签署及管理业务更简单、更便捷。

了解更多契约锁详情请访问 [www.qiyuesuo.com](http://www.qiyuesuo.com).


Requirements
============
php SDK提供了契约锁API的请求封装、摘要签名、响应解释等功能，您可以直接使用SDK实现合同的签署流程。

php 版本说明：PHP5.6及以上 ； 

============

前往 [契约锁开放平台](http://open.qiyuesuo.com/download)下载PHP SDK及依赖包，并添加到项目中。

Usage
=====

#### 印章接口
印章创建查询相关操作接口。

详情请参考： [SealTest.php](https://github.com/qiyuesuo/sdk-php-sample/blob/master/com.qiyuesuo.Test/SealTest.php).

#### 远程签
将文件上传的云平台进行签署，或者使用云平台的模板进行签署。

详情请参考： [RemoteSignTest.php](https://github.com/qiyuesuo/sdk-php-sample/blob/master/com.qiyuesuo.Test/RemoteSignTest.php).

#### 标准签
发起方通过接口发起合同签署合同，接收方登录契约锁云平台进行签署。

详情请参考： [StandardSignTest.php](https://github.com/qiyuesuo/sdk-php-sample/blob/master/com.qiyuesuo.Test/StandardSignTest.php).

#### 模板接口
查询合同模板信息。

详情请参考： [TemplateTest.php](https://github.com/qiyuesuo/sdk-php-sample/blob/master/com.qiyuesuo.Test/TemplateTest.php).

Notes
=======
示例代码中的参数均为测试环境参数，实际运行时需要将相关参数修改为生产环境参数，或沙箱测试环境参数。

 [Util.php](https://github.com/qiyuesuo/sdk-php-sample/blob/master/com.qiyuesuo.Test/Util.php).是对接方需要填写的基本参数信息。

phpSDk.phar 是需要引用的包

扫码关注契约锁公众号,了解契约锁最新动态。

![契约锁公众号](qrcode.png)
