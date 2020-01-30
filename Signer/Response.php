<?php
namespace Dfe\IPay88\Signer;
// 2017-04-10
// 2017-04-12
// «Technical Specification v1.6.2 (For Malaysia Only)» Page 8. https://mage2.pro/t/3682
// 3.2 Response page signature
final class Response extends \Dfe\IPay88\Signer {
	/**
	 * 2017-04-10
	 * @override
	 * @see \Dfe\IPay88\Signer::values()
	 * @used-by \Dfe\IPay88\Signer::sign()
	 * @return string[]
	 */
	protected function values() {return dfa($this->v(), ['PaymentId', 'RefNo', 'Amount', 'Currency', 'Status']);}
}