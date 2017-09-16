<?php
namespace Dfe\IPay88;
/**
 * 2017-04-10
 * 2017-08-13
 * The charge parameters are described in the Chapter 2.3 «Payment Request Parameter» (page 6)
 * of the PDF documentation («Technical Specification v1.6.2 (for Malaysia Only)»): https://mage2.pro/t/4259
 * @method Method m()
 * @method Settings s()
 */
final class Charge extends \Df\PaypalClone\Charge {
	/**
	 * 2017-08-19
	 * 2017-04-10 «Payment amount with two decimals and thousand symbols. Example: 1,278.99» Required, Currency.
	 * @see \Dfe\IPay88\Method::amountFactor()
	 * @see \Dfe\IPay88\Method::amountFormat()
	 * @override
	 * @see \Df\PaypalClone\Charge::k_Amount()
	 * @used-by \Df\PaypalClone\Charge::p()
	 * @return string
	 */
	protected function k_Amount() {return 'Amount';}
	
	/**
	 * 2017-08-19
	 * 2017-04-10
	 * «Refer to Appendix I.pdf file for MYR gateway.
	 * Refer to Appendix II.pdf file for Multi-curency gateway.».
	 * Required, String, 5.
	 * @override
	 * @see \Df\PaypalClone\Charge::k_Currency()
	 * @used-by \Df\PaypalClone\Charge::p()
	 * @return string
	 */
	protected function k_Currency() {return 'Currency';}

	/**
	 * 2017-08-19
	 * 2017-04-10 «Customer email for receiving receipt». Required, String, 100.
	 * @override
	 * @see \Df\PaypalClone\Charge::k_Email()
	 * @used-by \Df\PaypalClone\Charge::p()
	 * @return string
	 */
	protected function k_Email() {return 'UserEmail';}

	/**
	 * 2017-08-19   
	 * 2017-04-10
	 * «The Merchant Code provided by iPay88 and use to uniquely identify the Merchant.»
	 * Required, String, 20.
	 * @override
	 * @see \Df\PaypalClone\Charge::k_MerchantId()
	 * @used-by \Df\PaypalClone\Charge::p()
	 * @return string
	 */
	protected function k_MerchantId() {return 'MerchantCode';}
	
	/**
	 * 2017-04-10
	 * «Unique merchant transaction number / Order ID». Required, String, 30.
	 * @override
	 * @see \Df\PaypalClone\Charge::k_RequestId()
	 * @used-by \Df\PaypalClone\Charge::p()
	 * @return string
	 */
	protected function k_RequestId() {return 'RefNo';}

	/**
	 * 2017-04-10
	 * «SHA-256 signature (refer to 3.1)». Required, String, 100.
	 * @override
	 * @see \Df\PaypalClone\Charge::k_Signature()
	 * @used-by \Df\PaypalClone\Charge::p()
	 * @return string
	 */
	protected function k_Signature() {return 'Signature';}

	/**
	 * 2017-04-10
	 * @override
	 * @see \Df\PaypalClone\Charge::pCharge()
	 * @used-by \Df\PaypalClone\Charge::p()
	 * @return array(string => mixed)
	 */
	protected function pCharge() {return [
		// 2017-04-10 «Backend response page URL (refer to 2.7)».  Required, String, 200.
		'BackendURL' => $this->callback()
		// 2017-04-10
		// «Encoding type
		//		“ISO-8859-1” – English
		//		“UTF-8” – Unicode
		//		“GB2312” – Chinese Simplified
		//		“GD18030” – Chinese Simplified
		//		“BIG5” – Chinese Traditional
		// ».
		// Optional, String, 20.
		,'Lang' => 'UTF-8'
		// 2017-04-10
		// «Refer to Appendix I.pdf file for MYR gateway.
		// Refer to Appendix II.pdf file for Multi-curency gateway.».
		// Optional, Integer.
		,'PaymentId' => $this->m()->option()
		// 2017-04-10 «Product description». Required, String, 100.
		// 2017-09-04
		// [iPay88] The maximum length of a payment's products description
		// (the «ProdDesc» parameter) is 100 characters: https://mage2.pro/t/4460
		,'ProdDesc' => df_chop(df_oqi_s($this->o()), 100)
		// 2017-04-10 «Merchant remarks». Optional, String, 100.
		// 2017-09-04
		// [iPay88] The maximum length of a payment description
		// (the «Remark» parameter) is 100 characters: https://mage2.pro/t/4459
		,'Remark' => $this->description()
		// 2017-04-10 «Payment response page». Required, String, 200.
		,'ResponseURL' => $this->customerReturnRemote()
		/**
		 * 2017-04-10
		 * «Signature type = “SHA256”».
		 * Required, String, 10.
		 * 2017-04-12
		 * Я использую алгоритм @see sha1(),
		 * поэтому передавать значение параметра «SignatureType» не нужно.
		 * Т.е. официальная документация врёт, утверждая, что этот параметр обязателен.
		 * SHA256 — совсем другой алгоритм.
		 */
		//,'SignatureType' => 'SHA256'
		// 2017-04-10 «Customer contact number». Required, String, 20.
		,'UserContact' => df_chop($this->customerPhone(), 0, 20) ?: 'absent'
		,'UserName' => $this->customerName() // 2017-04-10 «Customer name». Required, String, 100.
	];}

	/**
	 * 2017-08-19
	 * 2017-09-02
	 * «Test transaction with amount MYR 1.00».
	 * The PDF documentation («Technical Specification v1.6.2 (for Malaysia Only)»), page 2:
	 * https://mage2.pro/t/4259
	 * @override
	 * @see \Df\PaypalClone\Charge::testAmountF()
	 * @used-by \Df\PaypalClone\Charge::p()
	 * @return string
	 */
	protected function testAmountF() {return '1.00';}
}