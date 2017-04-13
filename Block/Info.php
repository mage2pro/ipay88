<?php
namespace Dfe\IPay88\Block;
use Dfe\IPay88\W\Event;
/**
 * 2017-04-10
 * @final Unable to use the PHP «final» keyword here because of the M2 code generation.
 * @method Event|string|null e(...$k)
 */
class Info extends \Df\Payment\Block\Info {
	/**
	 * 2017-04-10
	 * @override
	 * @see \Df\Payment\Block\Info::prepare()
	 * @used-by \Df\Payment\Block\Info::_prepareSpecificInformation()
	 */
	final protected function prepare() {
		/** @var Event $e */
		$e = $this->e();
		$this->siEx('iPay88 ID', $e->idE());
		$this->si('Payment Option', $e->optionTitle());
		if ($e->isBankCard()) {
			$this->si([
				'Card Number' => $e->r('CCNo')
				,'Cardholder' => $e->r('CCName')
			]);
		}
	}
}