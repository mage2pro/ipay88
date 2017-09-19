<?php
namespace Dfe\IPay88;
use Df\Payment\ConfigProvider\IOptions;
use Dfe\IPay88\Source\Option as Opt;
// 2017-04-10
final class ConfigProvider extends \Df\Payment\ConfigProvider implements IOptions {
	/**
	 * 2017-09-18
	 * @override
	 * @see \Df\Payment\ConfigProvider\IOptions::options()
	 * @used-by \Df\Payment\ConfigProvider::configOptions()
	 * @return array(<value> => <label>)
	 */
	function options() {return Opt::s()->map();}

	/**
	 * 2017-04-13
	 * @override
	 * @see \Df\Payment\ConfigProvider::config()
	 * @used-by \Df\Payment\ConfigProvider::getConfig()
	 * @return array(string => mixed)
	 */
	protected function config() {return self::configOptions($this) + parent::config();}
}