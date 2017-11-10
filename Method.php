<?php
namespace Dfe\IPay88;
/**
 * 2017-04-10
 * 2017-11-10
 * «Class Dfe\IPay88\Method\Interceptor may not inherit from final class (Dfe\IPay88\Method)
 * in /generated/code/Dfe/IPay88/Method/Interceptor.php»
 * https://mage2.pro/t/4904
 * @final Unable to use the PHP «final» keyword here because of the M2 code generation.
 * @method Settings s()
 */
class Method extends \Df\PaypalClone\Method {
	/**
	 * 2017-04-10
	 * «Payment amount with two decimals and thousand symbols. Example: 1,278.99»
	 * @override
	 * @see \Df\Payment\Method::amountFormat()
	 * @used-by \Df\Payment\Operation::amountFormat()
	 * @param float|int $a
	 * @return string
	 */
	function amountFormat($a) {return number_format($a, 2, '.', ',');}

	/**
	 * 2017-04-14
	 * @used-by \Dfe\IPay88\Charge::pCharge()
	 * @return string
	 */
	function option() {return df_result_sne($this->iia(self::$II_OPTION));}

	/**
	 * 2017-04-10
	 * @override
	 * @see \Df\Payment\Method::amountFactor()
	 * @used-by \Df\Payment\Method::amountFormat()
	 * @used-by \Df\Payment\Method::amountParse()
	 * @return int
	 */
	protected function amountFactor() {return 1;}

	/**
	 * 2017-04-10
	 * @override
	 * @see \Df\Payment\Method::amountLimits()
	 * @used-by \Df\Payment\Method::isAvailable()
	 * @return null
	 */
	protected function amountLimits() {return null;}

	/**
	 * 2017-04-14
	 * @override
	 * @see \Df\Payment\Method::iiaKeys()
	 * @used-by \Df\Payment\Method::assignData()
	 * @return string[]
	 */
	protected function iiaKeys() {return [self::$II_OPTION];}

	/**
	 * 2017-04-10
	 * @used-by https://github.com/mage2pro/ipay88/blob/0.0.2/etc/di.xml#L9
	 * @used-by \Df\Payment\Method::codeS()
	 * @see \Df\Payment\Settings::prefix()
	 */
	const CODE = 'dfe_ipay88';

	/**
	 * 2017-04-14 https://github.com/mage2pro/core/blob/2.12.17/Payment/view/frontend/web/withOptions.js#L56-L72
	 * @used-by iiaKeys()
	 * @used-by option()
	 */
	private static $II_OPTION = 'option';
}