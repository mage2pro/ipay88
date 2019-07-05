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
		/**
		 * 2018-02-06
		 * "Clicking the «Invoice» backend button for an order in the «Pending» state
		 * leads to the «Call to a member function idE() on null
		 * in vendor/mage2pro/ipay88/Block/Info.php:18» error":
		 * https://github.com/mage2pro/ipay88/issues/8
		 * 2019-07-05
		 * All these methods return `null` when a backend user clicks the «Invoice» backend button
		 * for an order in the «Pending» state:
		 * @see \Df\Payment\Block\Info::e()
		 * @see \Df\Payment\TM::responseF()
		 * @see \Df\Payment\TM::responseL()
		 */
		if ($e = $this->e() /** @var Event $e */) {
			$this->siEx('iPay88 ID', $e->idE());
			$this->si('Payment Option', $this->choiceT());
			if ($e->isBankCard()) {
				$this->si(['Card Number' => $e->r('CCNo'), 'Cardholder' => $e->r('CCName')]);
				$this->siEx([
					'Bank ID' =>  $e->r('BankMID')
					,'Bank Name' => $e->r('S_bankname')
					/**
					 * 2018-06-08
					 * «Do not run df_country_ctn() if S_country is empty»:
					 * https://github.com/mage2pro/ipay88/pull/12
					 * https://github.com/mage2pro/ipay88/issues/11
					 * @var string $c
					 */
					,'Bank Country' => !($c = $e->r('S_country')) ? __('Unknown') : df_country_ctn($c)
				]);
			}
		}
	}
}
