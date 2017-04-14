<?php
namespace Dfe\IPay88;
/**
 * 2017-04-10
 * @method Method m()
 * @method Settings s()
 */
final class Charge extends \Df\PaypalClone\Charge {
	/**
	 * 2017-04-10
	 * @override
	 * @see \Df\PaypalClone\Charge::pCharge()
	 * @used-by \Df\PaypalClone\Charge::p()
	 * @return array(string => mixed)
	 */
	protected function pCharge() {$s = $this->s(); return [
		/**
		 * 2017-04-10
		 * «Payment amount with two decimals and thousand symbols. Example: 1,278.99»
		 * Required, Currency.
		 * @see \Dfe\IPay88\Method::amountFactor()
		 * @see \Dfe\IPay88\Method::amountFormat()
		 */
		'Amount' => $s->test() ? '1.00' : $this->amountF()
		// 2017-04-10
		// «Backend response page URL (refer to 2.7)».
		// Required, String, 200.
		,'BackendURL' => $this->callback()
		// 2017-04-10
		// «Refer to Appendix I.pdf file for MYR gateway.
		// Refer to Appendix II.pdf file for Multi-curency gateway.».
		// Required, String, 5.
		,'Currency' => $this->currencyC()
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
		// «The Merchant Code provided by iPay88 and use to uniquely identify the Merchant.»
		// Required, String, 20.
		,'MerchantCode' => $this->s()->publicKey()
		// 2017-04-10
		// «Refer to Appendix I.pdf file for MYR gateway.
		// Refer to Appendix II.pdf file for Multi-curency gateway.».
		// Optional, Integer.
		,'PaymentId' => $this->m()->option()
		// 2017-04-10
		// «Product description».
		// Required, String, 100.
		,'ProdDesc' => mb_substr(df_oi_s($this->o()), 0, 100)
		// 2017-04-10
		// «Merchant remarks».
		// Optional, String, 100.
		,'Remark' => mb_substr($this->description(), 0, 100)
		// 2017-04-10
		// «Payment response page».
		// Required, String, 200.
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
		// 2017-04-10
		// «Customer contact number».
		// Required, String, 20.
		,'UserContact' => mb_substr($this->addressBS()->getTelephone(), 0, 100) ?: 'absent'
		// 2017-04-10
		// «Customer email for receiving receipt».
		// Required, String, 100.
		,'UserEmail' => $this->customerEmail()
		// 2017-04-10
		// «Customer name».
		// Required, String, 100.
		,'UserName' => $this->customerName()
	];}

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
}