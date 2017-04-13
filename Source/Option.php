<?php
namespace Dfe\IPay88\Source;
// 2017-04-10
// [iPay88] The available payment options for Malaysia: https://mage2.pro/t/3635
/** @method static Option s() */
final class Option extends \Df\Config\Source {
	/**
	 * 2017-04-13
	 * Ключи у нас целочисленные, поэтому @see array_merge() привело бы к их утрате,
	 * а вот «+» их сохраняет: http://stackoverflow.com/a/5929690
	 * @used-by \Dfe\IPay88\Block\Info::prepare()
	 * @return array(int => string)
	 */
	function all() {return $this->map() + df_module_json($this, 'options/multicurrency');}

	/**
	 * 2017-04-10
	 * @override
	 * @see \Df\Config\Source::map()
	 * @used-by all()
	 * @used-by \Df\Config\Source::toOptionArray()
	 * @return array(int => string)
	 */
	function map() {return df_module_json($this, 'options/myr');}
}