<?php
namespace Dfe\IPay88\Signer;
# 2017-04-10
final class Request extends \Dfe\IPay88\Signer {
	/**
	 * 2017-04-10
	 * @override
	 * @see \Dfe\IPay88\Signer::values()
	 * @used-by \Dfe\IPay88\Signer::sign()
	 * @return string[]
	 */
	protected function values() {return dfa($this->v(), ['RefNo', 'Amount', 'Currency']);}
}