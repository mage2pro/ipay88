<?php
namespace Dfe\IPay88\Block;
use Dfe\IPay88\Source\Option as Opt;
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
		$this->si('Payment Option', dftr($this->e()->r('PaymentId'), Opt::s()->all()));
		$this->siEx('iPay88 ID', $this->e()->idE());
	}
}