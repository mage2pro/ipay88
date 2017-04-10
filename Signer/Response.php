<?php
namespace Dfe\IPay88\Signer;
// 2017-04-10
final class Response extends \Dfe\IPay88\Signer {
	/**
	 * 2017-04-10
	 * @override
	 * @see \Dfe\IPay88\Signer::values()
	 * @used-by \Dfe\IPay88\Signer::sign()
	 * @return string[]
	 */
	protected function values() {return dfa_select_ordered($this->v(), [
		'PaymentId', 'RefNo', 'Amount', 'Currency', 'Status'
	]);}
}