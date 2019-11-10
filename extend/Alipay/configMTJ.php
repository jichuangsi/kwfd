<?php
$config = array (	
		//应用ID,您的APPID。
		'app_id' => "2016100100639850",

		//商户私钥
		'merchant_private_key' => "MIIEpQIBAAKCAQEAu3nelg0vriZOA4q+uQKK16BT2TVoMlGcEQOOubWRPvPxegSA8V68zru2LuFnD5DjD9rNvraf4Ff/qF6K+I1K+W9F8VUNaVljdEIsSRg98PGirOxi0XEFp92fTQql4/kmXivC/yCokYqmoi82GZTZ34onbbRU2ZzlWGHN3w9u8ZvXYGJLpVyRuGBdhqZP57Mn6paWC8DUAu4ezlYb84ASyhTQJQEZxcomRSxi4PqxJwUXC+BpFAXlQDIPBP0mezdb1kA3JZtpvqINIdtg1opLvBuTwGzXEwJj0l+7xXWya7SYjpPM4ueEyJNR9jzFOBios9SUr3mj6Qblfj5P+340jQIDAQABAoIBAQC3I606HfWHBSpOsXnw17f0Pk3KsS5xgWGZCUWiyujxe3JYhQ/FOovs1Fh7YXvBLAN0GIXGmTaC/NPlkT3m4nfsRTQpNbHdSRIrnv0OBp1zw0jr7hv2h5dDze7xXsaBdoFxmwRpIGkrjCuN4drSkKNpiNdNhs0gq/ErLpfjIHt7jtmQkfyMFBuWtqd7rJ1X9dEFCvCUJZJoHhysguhr72F+3Nl6VR3SEzMXW82yF/fYJ1YP+b72gSdAkfF0/Td26qUeXMnAtevASz0XsPetHzLIA7l6y+oofWPiyqt3zD+B5MohRtvbdiwTGEAEYjN+E0eNF1GHvnuCqAqF+1TzwUgNAoGBAOpQ4TtTmbcDqfY37hmUY7qtMDyFj9sTfVZqpxrHxkcDJm5jHWI/lX02WGuGojOUl+SHvS6UPuOMk6eYmcB1D/z1eOxi5SKUTBiKdCngFpXgLZn7tKkMk0Ihy1FT/oH/qLzxDiBS63iZEmkQKsaNhM0HbCV0n/jQxSXWYbgo90IPAoGBAMzTUVS4fimFUKoFMgALgVOQmL8mhq2V1PZ1tBAsrJtKwSnQpG3V7W5b5CDymuSaCAWLsSBOhWSlclad/08/OgQwEZ+I53//dDEk0g7kOPQ83yuocXJ6ID51qCgB1NNAhwRyFqVeFbaJXmeWK/BTb2ErDg7C47tll98mN4Dkv4ujAoGAKpQZ6ZLuetBCoUhWjvVlDfYMruLCWlf3Ta3Bwd8Ni7fp0uNV4pWVT5SBisCDVwYod9GmsgEkUGsqJalYPx3Gkvv0RlhONPNnxIncRAPBduiuwK15jcKIO9syPAwcUnknq3XOUFdhDKAcNVVHwJ7UxAEWSNQhgbBGMvL6/OEM1UcCgYEAxqslVQaKIJ3VqsPVRqPiMfqrnaSxtwcAhHmQSKv8U7gDehqMkpiQbp2kvaxzPs6Ef1SKXmqrCf9L0uX3MJeEH3G8dkBlQwq1WcF8GcOV1piAYqlEOKRqSAr5Kqz0EF+jVlWOz6FdcCr3rYPEZJuZCeen//taxnZ5A5He/h9iBv8CgYEA0ka5zgZ6baLWvVZa9EdIMnkMxeVNcMdbU7fJVGqXl0kF4O3z0Dp+Toy1Jgkr0x3UMPZNMWvwHv7iKjR8NIAC2eTdKT3GY7Qn9kL6OE9gcRx4X4Oht6sXEhglG/duK8E3eiL84DwkaVO+kyQWej9VESqhAzYeoKH2LXarr+dI6pQ=",
		
		//异步通知地址
        'notify_url' => $http_type . $_SERVER['HTTP_HOST']."".str_replace("?s=","",U('/'))."Payoff/Alipay/notifyurl.html",
        
        //同步跳转
        'return_url' =>  $http_type . $_SERVER['HTTP_HOST']."".str_replace("?s=","",U('/'))."Payoff/Alipay/returnurl.html",

		//编码格式
		'charset' => "UTF-8",

		//签名方式
		'sign_type'=>"RSA2",

		//支付宝网关
		'gatewayUrl' => "https://openapi.alipaydev.com/gateway.do",

		//支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。切记不要点击 查看应用公钥 要点击查看支付宝公钥
		'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEA2QhDcfC5cGFenYExRajIipMuKCjp5RiA3tssnfUwt2PZ07gr5ZSNhCsGMKc3deQu7HBvlFJL153KtdFq3Gs8ngktGGD9kLBvRSoAzvGDJYsDCuTOTg1RBj3iF43AHgG/Zg7eH0uFXrt42MI2odf4NQF0/mjww12WKQ2neKJecCHh6XNWfNKNLW2Z5DppAH2kh6G/KULMvqQbIiU8p81v0xzGC2BLvTCWa6Af0bifRBGWCSQZMp3p9SrX6HgMwue4UufpJP8az0K9PxnN9yrn56Y5EtLF7iuACcw+uTKwvaLxZOHXHnkEJBs0jxliFMYrkjX/shPGwOXeSIjdUdoUewIDAQAB",
);