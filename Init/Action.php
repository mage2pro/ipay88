<?php
namespace Dfe\IPay88\Init;
// 2017-04-10
/** @method \Dfe\IPay88\Method m() */
final class Action extends \Df\PaypalClone\Init\Action {
	/**
	 * 2017-04-10
	 * @override
	 * @see \Df\Payment\Init\Action::redirectUrl()
	 * @used-by \Df\Payment\Init\Action::action()
	 * @return string
	 */
	protected function redirectUrl() {return 'https://www.mobile88.com/epayment/entry.asp';}
}