<?php
$config = array (	
		//应用ID,您的APPID。
		'app_id' => "2016091200490918",

		//商户私钥
		'merchant_private_key' => "MIIEowIBAAKCAQEAtl/1KgrN+NzwYI/hBq7HT97rdhJXEvnzEjyoCyxJv55CFPn3hjo+dXe0PIorY5quIvu/IdSEL0DrIIySBPto5BfNfKCmtOc8oZG/f2/jAySSlKRYPBEs7yVef5deEG4r6SgFBlb6CFRmJn9A3WtD872VQO6AjiC8mzEiiIm0Dq+a1cZIyovmE8SoFsBKaek1rOIUfb9aJDD1NvefWwKnXx+oZZ7YhY86rrbekhwDcUalHbpSUsjCknMU/AVEFf2y/ki5Q5Z7kY0WNcyCstSYvJuZUo3ez8tzamdHZ0Mf6trIjFSmadvD46chaHZ20x2Wa/ds79M5HtHHJoEbSd6SFQIDAQABAoIBAFl67VQKZxLSfFI0ZckcmggTLN4Kk5Ro9J0fC6gnu6t7n5qhJpRCIYELEXCerjk5nHTnpdiYZ56zsGmQ7tfo7obzMswSGpkp13LCiv2gzPYuzIiHtg8KskxHvnzFrM5M79h+3TBGHnlVx6TdzNqWlYmSnBd2rbaOU1ulmPb68VA+fmMLrUCDBniwJpNrf8Jh3uOO7vU8HAp83dtUgHTq2zYoVSPQtZt9UnK8hM0VMyfKOnoOaWv1UJEPHqmxEddbj32/8+ms458sNIMc2g2sAgxfvWPHqX6Lvk9Nt723z4EJZqE8wSj1cfrs1bovhElWZgtyygIUch3xQMPi9Q88ecECgYEA4x4OI/wqC8e0XyO6fHikZ9lV/KxoYNZ5OdnUX51WS8z2V9wt0PO2Vmhj+8ZJTYPnS5M0XaQ2BPfu8VBgJv+pDQLYinYeRtpMfnMFjQUK2rdvUdpMxzDPTKtst9ltrv74pUh/ZDyNVKNZeLuEOhY53EDt+dNU7ZG9gGgGgpQEUFECgYEAzZFH7tN9xAHj0Xes7/6VTtJ1O0zuu4i0aMMpIFBUEoI78zAXbZ4qBOyRGatpfYtfQIo4u+ft8107RUDaNlBJZmpkqlG+EK6PT194plCpotImWYvIg53D1VLzJfdLZV7fAvXZA10P7gi751cCMC8PHzlOHQiFvtZqwXwC1UN1WIUCgYEAwnSJRuYwWcWy+YJtuQTSPtgmdyBmfgMj6BRJcVQU/vGOOcuarrz78R+P+5HaUTQOZPa0bziZx8dAHfzjVoCvDSTSojpf0eo2dE2nAwa+NGW6Oirece2oj8x2WTMgZiSIX3ujFv+BQmZZxLVIkTNWdu5g0vXOUVnnFnn6mPKCfwECgYBQ7dY87uQ/a2MOTyg1X6vWWUKv8uy1xe8Io3SodRd0JfOGHTPMAw2V3LCPQ42HUHxSg1gsmfVy7wxrikmeQmNzP4WcDAxgsuhWnkZ4a58tK8DPVhm9vzme3UY+dyomoX/4wWMLUPL5ilS3keiZoZ05dK0M/xLwe6eRvsm6vhEPpQKBgAZ2ZDJGPA0eUkbs3QSdoY2pFQFq1HEBWSaMtdXML11IKOLbI68OuWfupkXolDCTpErCSCcuy7lLR/Z7kHIiywWH/TvDHO+xwIyU05Ael9FG0U2qLnSuqewUWyKr9Pi+OUdX1oIFZrLRNjw2Ln8p3Ic1jkYO9mxo8WVToXrodURm",
		
		//异步通知地址
		'notify_url' => "http://www.a.com/pay/notify_url.php",
		
		//同步跳转
		'return_url' => "http://www.a.com/pay/return_url.php",

		//编码格式
		'charset' => "UTF-8",

		//签名方式
		'sign_type'=>"RSA2",

		//支付宝网关
		'gatewayUrl' => "https://openapi.alipaydev.com/gateway.do",

		//支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
		'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAsC8u/BAbbFVOy1spqvW0mESXUsVYk0iBREZ9++gA1XNUoKbAh/eaeq0EFHGugAtDT8GHWK3/nPOENHZBriREuzRyVEOZ6MHEli32IhCR6k5hOyMvCGfG0/zJnGwJ41YroqJHynyn5PjYid+iG2ScOELvuWraUWXFDdGXFASc9rv5l5cQwuYUYB+gqm4tPuX1OArdNTkoxaqSv0oLzZkB1JCtSHOXAAhUk2lLWcBeql4jxvyuh2kcnCGzflBoG0K1qF9m6SGgqXgDQ8odLdzMb9Y3r4SBbr87Qa0FBz6U/h/7hpCJU9m9sCH0XsTUAlU6kb47PHetfRPwE34VynySJQIDAQAB",
);