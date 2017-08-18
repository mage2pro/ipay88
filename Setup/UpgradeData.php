<?php
namespace Dfe\IPay88\Setup;
// 2017-08-19
class UpgradeData extends \Df\Framework\Upgrade\Data {
	/**
	 * 2017-08-19
	 * @override
	 * @see \Df\Framework\Upgrade::_process()
	 * @used-by \Df\Framework\Upgrade::process()
	 */
	protected function _process() {
		$t = $this->t('core_config_data'); /** @var string $t */
		$this->c()->query("
			UPDATE $t
			SET path = REPLACE(path, 'PublicKey', 'MerchantID')
			WHERE path LIKE 'df_payment/ipay88/%PublicKey'
		");
		df_cache_clean();
	}

	/**
	 * 2017-08-19
	 * @override
	 * @see \Df\Framework\Upgrade::initial()
	 * @used-by \Df\Framework\Upgrade::isInitial()
	 * @return string
	 */
	final protected function initial() {return '0.0.1';}
}