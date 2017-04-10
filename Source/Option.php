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
	protected function map() {return [
		2 => 'Credit Card (MYR)'
		,6 => 'Maybank2U'
		,8 => 'Alliance Online'
		,10 => 'AmOnline'
		,14 => 'RHB Online'
		,15 => 'Hong Leong Online'
		,20 => ' CIMB Click'
		,22 => 'Web Cash'
		,48 => ' PayPal (MYR)'
		,100 => 'Celcom AirCash'
		,102 => ' Bank Rakyat Internet Banking'
		,103 => 'AffinOnline'
		,134 => 'Bank Islam'
		,152 => 'UOB'
		,166 => 'Bank Muamalat'
		,167 => 'OCBC'
		,168 => 'Standard Chartered Bank'
	];}
}