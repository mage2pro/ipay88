<?php
namespace Dfe\IPay88\W;
use Df\Framework\Controller\Response\Text;
// 2017-09-13
final class Responder extends \Df\Payment\W\Responder {
	/**
	 * 2017-04-12
	 * «On the ‘backend_response.asp’ page you need to write out the word ‘RECEIVEOK’ only (without quote)
	 * as an acknowledgement once the backend page success get the payment status from iPay88 OPSG
	 * and update status to success on merchant system.
	 * iPay88 OPSG will re-try send the payment status to the ‘backend_response.asp’ page up to 3 times
	 * on different interval if no ‘RECEIVEOK’ acknowledgement detected.»
	 * «Technical Specification v1.6.2 (For Malaysia Only)» Page 10. https://mage2.pro/t/3682
	 * @override
	 * @see \Df\Payment\W\Responder::success()
	 * @used-by \Df\Payment\W\Responder::get()
	 * @return Text
	 */
	protected function success() {return Text::i('RECEIVEOK');}
}