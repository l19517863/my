<?php    
    include_once 'aliyun-php-sdk-core/Config.php';
    use Dm\Request\V20151123 as Dm;            
    //需要设置对应的region名称，如华东1（杭州）设为cn-hangzhou，新加坡Region设为ap-southeast-1，澳洲Region设为ap-southeast-2。
    $iClientProfile = DefaultProfile::getProfile("cn-hangzhou", "LTAIY7ZQGYM9QCIN", "Ret7S350KpxP2940800R6ZSmGWh1FS");        
    //新加坡或澳洲region需要设置服务器地址，华东1（杭州）不需要设置。
    //$iClientProfile::addEndpoint("ap-southeast-1","ap-southeast-1","Dm","dm.ap-southeast-1.aliyuncs.com");
    //$iClientProfile::addEndpoint("ap-southeast-2","ap-southeast-2","Dm","dm.ap-southeast-2.aliyuncs.com");
    $client = new DefaultAcsClient($iClientProfile);    
    $request = new Dm\SingleSendMailRequest();     
    //新加坡或澳洲region需要设置SDK的版本，华东1（杭州）不需要设置。
    //$request->setVersion("2017-06-22");
    $request->setAccountName("postmaster@liuhaozhe.com");
    $request->setFromAlias("发信人昵称");
    $request->setAddressType(1);
    $request->setTagName("控制台创建的标签");
    $request->setReplyToAddress("true");
    $request->setToAddress("1824910921@qq.com");        
    $request->setSubject("邮件主题");
    $request->setHtmlBody("邮件正文");        
    try {
        $response = $client->getAcsResponse($request);
        print_r($response);
    }
    catch (ClientException  $e) {
        print_r($e->getErrorCode());   
        print_r($e->getErrorMessage());   
    }
    catch (ServerException  $e) {        
        print_r($e->getErrorCode());   
        print_r($e->getErrorMessage());
    }
?>