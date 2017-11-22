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
	 * @used-by \Df\Payment\Block\Info::prepareToRendering()
	 */
	final protected function prepare() {
		$e = $this->e(); /** @var Event $e */
		$this->siEx('iPay88 ID', $e->idE());
		$this->si('Payment Option', $this->choiceT());
		if ($e->isBankCard()) {
			$this->si(['Card Number' => $e->r('CCNo'), 'Cardholder' => $e->r('CCName')]);
			$this->siEx([
				'Bank ID' =>  $e->r('BankMID')
				,'Bank Name' => $e->r('S_bankname')
				,'Bank Country' => df_country_ctn($e->r('S_country'))
			]);
		}
	}
}