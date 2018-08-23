<?php
namespace Dfe\IPay88;
use Df\Payment\Settings\Options as O;
use Dfe\IPay88\Source\Option as OptionSource;
// 2017-04-10
/** @method static Settings s() */
final class Settings extends \Df\Payment\Settings {
	/**
	 * 2018-08-24
	 * @used-by \Dfe\IPay88\ConfigProvider::options()
	 * @return O
	 */
	function options() {return $this->_options(OptionSource::class);}
}