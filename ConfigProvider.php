<?php
namespace Dfe\IPay88;
use Df\Payment\ConfigProvider\IOptions;
/**
 * 2017-04-10
 * @method Settings s()
 * 2022-11-07 @noinspection PhpSuperClassIncompatibleWithInterfaceInspection It is a false positive.
 */
final class ConfigProvider extends \Df\Payment\ConfigProvider implements IOptions {
	/**
	 * 2017-09-18
	 * @override
	 * @see \Df\Payment\ConfigProvider\IOptions::options()
	 * @used-by \Df\Payment\ConfigProvider::configOptions()
	 * @return array(<value> => <label>)
	 */
	function options():array {return $this->s()->options()->o(true);}

	/**
	 * 2017-04-13
	 * @override
	 * @see \Df\Payment\ConfigProvider::config()
	 * @used-by \Df\Payment\ConfigProvider::getConfig()
	 * @return array(string => mixed)
	 */
	protected function config():array {return self::configOptions($this) + parent::config();}
}