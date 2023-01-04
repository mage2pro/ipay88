<?php
namespace Dfe\IPay88\W;
use Dfe\IPay88\Source\Option as Opt;
# 2017-04-12
# «Technical Specification v1.6.2 (For Malaysia Only)» Page 8. https://mage2.pro/t/3682
# «2.5 Payment Response Parameters»
final class Event extends \Df\PaypalClone\W\Event {
	/**
	 * 2017-04-13
	 * @used-by \Dfe\IPay88\Choice::title()
	 * @return string
	 */
	function optionTitle() {return dftr($this->option(), Opt::s()->all());}

	/**
	 * 2017-04-13
	 * @used-by \Dfe\IPay88\Block\Info::prepare()
	 * @return bool
	 */
	function isBankCard() {/** @var int $o */ $o = $this->option(); return 2 === $o || $o > 24 && $o < 43;}

	/**
	 * 2017-04-12 «iPay88 OPSG Transaction ID»
	 * @override
	 * @see \Df\PaypalClone\W\Event::k_idE()
	 * @used-by \Df\PaypalClone\W\Event::idE()
	 */
	protected function k_idE():string {return 'TransId';}

	/**
	 * 2017-04-12 «Unique merchant transaction number / Order ID»
	 * @override
	 * @see \Df\Payment\W\Event::k_pid()
	 * @used-by \Df\Payment\W\Event::pid()
	 */
	protected function k_pid():string {return 'RefNo';}

	/**
	 * 2017-04-12 «SHA-256 signature (refer to 3.2)»
	 * @override
	 * @see \Df\PaypalClone\W\Event::k_signature()
	 * @used-by \Df\PaypalClone\W\Event::signatureProvided()
	 */
	protected function k_signature():string {return 'Signature';}

	/**
	 * 2017-04-12 «Payment status: “1” – Success, “0” – Fail»
	 * @override
	 * @see \Df\PaypalClone\W\Event::k_status()
	 * @used-by \Df\PaypalClone\W\Event::status()
	 */
	protected function k_status():string {return 'Status';}

	/**
	 * 2017-04-12 «Payment status description»
	 * @override
	 * @see \Df\PaypalClone\W\Event::k_statusT()
	 * @used-by \Df\PaypalClone\W\Event::statusT()
	 */
	protected function k_statusT():string {return 'ErrDesc';}

	/**
	 * 2017-04-12 «“1” – Success, “0” – Fail»
	 * 2017-08-14
	 * As I understand from the documentation,
	 * the iPay88 payments are always instant: there are no offine / pending payments.
	 * @override
	 * @see \Df\PaypalClone\W\Event::statusExpected()
	 * @used-by \Df\PaypalClone\W\Event::isSuccessful()
	 */
	protected function statusExpected():string {return '1';}

	/**
	 * 2017-04-13
	 * https://github.com/mage2pro/ipay88/blob/0.2.1/etc/options/myr.json
	 * https://github.com/mage2pro/ipay88/blob/0.2.1/etc/options/multicurrency.json
	 * Если не использовать (int), то результат будет строкой, например: "2".
	 * @used-by self::isBankCard()
	 * @used-by self::optionTitle()
	 * @return int
	 */
	private function option() {return (int)$this->r('PaymentId');}
}