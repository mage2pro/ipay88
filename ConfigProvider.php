<?php
namespace Dfe\IPay88;
use Dfe\IPay88\Source\Option as Opt;
// 2017-04-10
final class ConfigProvider extends \Df\Payment\ConfigProvider {
	/**
	 * 2017-04-13
	 * @override
	 * @see \Df\Payment\ConfigProvider::config()
	 * @used-by \Df\Payment\ConfigProvider::getConfig()
	 * @return array(string => mixed)
	 */
	protected function config() {/** @var Settings $s */ $s = $this->s(); return [
		'options' => Opt::s()->map()
	] + parent::config();}
}