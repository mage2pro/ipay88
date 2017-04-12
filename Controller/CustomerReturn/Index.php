<?php
namespace Dfe\IPay88\Controller\CustomerReturn;
// 2017-04-13
/** @final Unable to use the PHP «final» keyword here because of the M2 code generation. */
class Index extends \Df\Payment\CustomerReturn {
	/**
	 * 2017-04-13
	 * iPay88 не присылает IPN в случае сбоя,
	 * поэтому в момент возвращения покупателя в магазин после неудачной попытки оплаты заказа
	 * заказ ещё не отменён, и нам нужно именно здесь установить факт неудачности.
	 * @override
	 * @see \Df\Payment\CustomerReturn::message()
	 * @used-by \Df\Payment\CustomerReturn::execute()
	 * @return string
	 */
	final protected function isSuccess() {return df_bool(df_request('Status'));}

	/**
	 * 2017-04-13
	 * @override
	 * @see \Df\Payment\CustomerReturn::message()
	 * @used-by \Df\Payment\CustomerReturn::execute()
	 * @return string
	 */
	final protected function message() {return df_request('ErrDesc');}
}