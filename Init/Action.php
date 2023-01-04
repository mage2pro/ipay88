<?php
namespace Dfe\IPay88\Init;
# 2017-04-10
/** @method \Dfe\IPay88\Method m() */
final class Action extends \Df\PaypalClone\Init\Action {
	/**
	 * 2017-04-10
	 * 2018-06-11
	 * «All integration using URL https://www.mobile88.com
	 * should switch to https://payment.ipay88.com.my effective 1st June 2018.»
	 * https://github.com/mage2pro/ipay88/issues/13
	 * @override
	 * @see \Df\Payment\Init\Action::redirectUrl()
	 * @used-by \Df\Payment\Init\Action::action()
	 */
	protected function redirectUrl():string {return 'https://payment.ipay88.com.my/epayment/entry.asp';}
}