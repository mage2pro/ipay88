<?php
namespace Dfe\IPay88\Source;
// 2017-04-10
// [iPay88] The available payment options for Malaysia: https://mage2.pro/t/3635
/** @method static Option s() */
final class Option extends \Df\Config\Source {
	/**
	 * 2017-04-10
	 * @override
	 * @see \Df\Config\Source::map()
	 * @used-by \Df\Config\Source::toOptionArray()
	 * @return array(string => string)
	 */
	protected function map() {return df_module_json($this, 'options/myr');}
}