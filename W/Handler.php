<?php
namespace Dfe\IPay88\W;
use Df\Framework\Controller\Result\Text;
// 2017-04-12
final class Handler extends \Df\PaypalClone\W\Handler {
	/**
	 * 2017-04-12
	 * «On the ‘backend_response.asp’ page you need to write out the word ‘RECEIVEOK’ only (without quote)
	 * as an acknowledgement once the backend page success get the payment status from iPay88 OPSG
	 * and update status to success on merchant system.
	 * iPay88 OPSG will re-try send the payment status to the ‘backend_response.asp’ page up to 3 times
	 * on different interval if no ‘RECEIVEOK’ acknowledgement detected.»
	 * «Online Payment Switching Gateway (OPSG) Technical Specification v1.6.2 (For Malaysia Only).»
	 * Page 10. https://mage2.pro/t/3682
	 * @override
	 * @see \Df\Payment\W\Handler::result()
	 * @used-by \Df\Payment\W\Handler::handle()
	 * @return Text
	 */
	protected function result() {return Text::i('RECEIVEOK');}
}