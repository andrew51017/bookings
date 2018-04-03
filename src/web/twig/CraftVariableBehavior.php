<?php
/**
 * Bookings plugin for Craft CMS 3.x
 *
 * An advanced booking plugin for Craft CMS and Craft Commerce
 *
 * @link      https://ethercreative.co.uk
 * @copyright Copyright (c) 2018 Ether Creative
 */

namespace ether\bookings\web\twig;

use craft\elements\db\ElementQueryInterface;
use ether\bookings\elements\Booking;
use ether\bookings\elements\db\BookingQuery;
use yii\base\Behavior;

/**
 * Class CraftVariableBehavior
 *
 * @author  Ether Creative
 * @package ether\bookings\web\twig
 * @since   1.0.0-alpha.1
 */
class CraftVariableBehavior extends Behavior
{

	// Methods
	// =========================================================================

	/**
	 * Adds a `craft.bookings()` function to the templates
	 *
	 * @param null $criteria
	 *
	 * @return BookingQuery|ElementQueryInterface
	 */
	public function bookings ($criteria = null) : BookingQuery
	{
		$query = Booking::find();

		if ($criteria)
			\Craft::configure($query, $criteria);

		return $query;
	}

}