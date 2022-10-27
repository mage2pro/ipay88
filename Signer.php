<?php
namespace Dfe\IPay88;
/**
 * 2017-04-10
 * @see \Dfe\IPay88\Signer\Request
 * @see \Dfe\IPay88\Signer\Response
 * @method Settings s()
 */
abstract class Signer extends \Df\PaypalClone\Signer {
	/**
	 * 2017-04-10
	 * @used-by self::sign()
	 * @see \Dfe\IPay88\Signer\Request::values()
	 * @see \Dfe\IPay88\Signer\Response::values()
	 * @return string[]
	 */
	abstract protected function values();

	/**
	 * 2017-04-10
	 * @override
	 * @see \Df\PaypalClone\Signer::adjust()
	 * @used-by \Df\PaypalClone\Signer::_sign()
	 * @see \Dfe\IPay88\Signer::adjust()
	 * @param array(string => mixed) $v
	 * @return array(string => mixed)
	 */
	final protected function adjust(array $v) {return ['Amount' => df_string_clean($v['Amount'], '.', ',')] + $v;}

	/**
	 * 2017-04-10
	 * 2022-10-27
	 * https://3v4l.org/ZVTE9
	 * https://stackoverflow.com/a/50056467
	 * php.net/manual/function.hex2bin.php
	 * @override
	 * @see \Df\PaypalClone\Signer::sign()
	 * @used-by \Df\PaypalClone\Signer::_sign()
	 * @return string
	 */
	final protected function sign() {return base64_encode(hex2bin(sha1(df_cc('',
		$this->s()->privateKey(), $this->v('MerchantCode'), $this->values()
	))));}
}