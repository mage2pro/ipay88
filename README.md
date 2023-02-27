This module integrates a Magento 2 based webstore with the **[iPay88](https://www.ipay88.com)** payment service (Malaysia, Indonesia, Philippines, Thailand, Singapore, China).  
The module is **free** and **open source**.

## Demo video
https://www.youtube.com/watch?v=hgg7cu9y57c&list=PLTq8uOpBQGsEVWfTrncggf2XnngZYaUJa

## [Screenshots](https://mage2.pro/tags/ipay88-screenshot)
- The frontend checkout screen:
	- [in the «**images**» mode](https://mage2.pro/t/topic/4540)
	- [in the «**text**» mode](https://mage2.pro/t/topic/4539)
- [The **payment information** blocks](https://mage2.pro/t/topic/4543)
- [The backend settings](https://mage2.pro/t/topic/4542)
- [The bank card payment form](https://mage2.pro/t/topic/3683)
- [An email receipt to a buyer](https://mage2.pro/t/topic/3684)
- [An email payment notification for a merchant](https://mage2.pro/t/topic/3685)

## The available payment options for Malaysia
- [Affin Bank](https://www.affinbank.com.my) ([affinOnline](http://www.affinonline.com))
- [Alliance Bank](http://www.alliancebank.com.my) ([Alliance Online](https://www.allianceonline.com.my))
- [AmBank](https://www.ambank.com.my) ([AmOnline](https://www.ambank.com.my/eng/online-banking))
- [Bank Islam](http://www.bankislam.com.my)
- [Bank Muamalat](http://www.muamalat.com.my)
- [Bank Rakyat](http://www.bankrakyat.com.my)
- [Celcom AirCash](https://aircash.celcom.com.my)
- [CIMB Bank](https://www.cimbbank.com.my) ([CIMB Click](https://www.cimbclicks.com.my))
- [Hong Leong Bank](https://www.hlb.com.my/main/)
- [Maybank](http://www.maybank.com) ([Maybank2U](http://www.maybank2u.com.my/))
- [OCBC](https://www.ocbc.com.my)
- PayPal (MYR)
- [RHB Bank](http://www.rhbgroup.com) ([RHB Online](https://logon.rhb.com.my/))
- [Standard Chartered Bank](https://www.sc.com/my)
- [United Overseas Bank (UOB)](http://www1.uob.com.my)
- [Webcash](https://www.webcash.com.my/pages/merchant/merchant-overview)

## How to install
[Hire me in Upwork](https://upwork.com/fl/mage2pro), and I will: 
- install and configure the module properly on your website
- answer your questions
- solve compatiblity problems with third-party checkout, shipping, marketing modules
- implement new features you need 

### 2. Self-installation
```
bin/magento maintenance:enable
rm -f composer.lock
composer clear-cache
composer require mage2pro/ipay88:*
bin/magento setup:upgrade
bin/magento cache:enable
rm -rf var/di var/generation generated/code
bin/magento setup:di:compile
rm -rf pub/static/*
bin/magento setup:static-content:deploy -f ms_Latn_MY en_US <additional locales, e.g.: zh_Hans_CN>
bin/magento maintenance:disable
```

## How to update
```
bin/magento maintenance:enable
composer remove mage2pro/ipay88
rm -f composer.lock
composer clear-cache
composer require mage2pro/ipay88:*
bin/magento setup:upgrade
bin/magento cache:enable
rm -rf var/di var/generation generated/code
bin/magento setup:di:compile
rm -rf pub/static/*
bin/magento setup:static-content:deploy -f ms_Latn_MY en_US <additional locales, e.g.: zh_Hans_CN>
bin/magento maintenance:disable
```