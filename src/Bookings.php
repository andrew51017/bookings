<?php
/**
 * Bookings plugin for Craft CMS 3.x
 *
 * An advanced booking plugin for Craft CMS and Craft Commerce
 *
 * @link      https://ethercreative.co.uk
 * @copyright Copyright (c) 2018 Ether Creative
 */

namespace ether\bookings;

use craft\web\twig\variables\CraftVariable;
use ether\bookings\elements\Booking as BookingElement;

use craft\base\Plugin;
use craft\services\Elements;
use craft\events\RegisterComponentTypesEvent;

use ether\bookings\web\twig\CraftVariableBehavior;
use yii\base\Event;

/**
 * @author    Ether Creative
 * @package   Bookings
 * @since     1.0.0-alpha.1
 */
class Bookings extends Plugin
{

	// Properties
	// =========================================================================

	public static $plugin;

	public $schemaVersion = '1.0.0-alpha.1';

	// Plugin
	// =========================================================================

	public function init ()
	{
		parent::init();
		self::$plugin = $this;

		// Events
		// ---------------------------------------------------------------------

		// Register our elements
		Event::on(
			Elements::class,
			Elements::EVENT_REGISTER_ELEMENT_TYPES,
			[$this, 'onRegisterElementTypes']
		);

		// Register our variable behaviours
		Event::on(
			CraftVariable::class,
			CraftVariable::EVENT_INIT,
			[$this, 'onCraftVariableInit']
		);
	}

	// Events
	// =========================================================================

	/**
	 * Registers our elements
	 *
	 * @param RegisterComponentTypesEvent $event
	 */
	public function onRegisterElementTypes (RegisterComponentTypesEvent $event)
	{
		$event->types[] = BookingElement::class;
	}

	/**
	 * Registers our CraftVariableBehaviour
	 *
	 * @param Event $event
	 */
	public function onCraftVariableInit (Event $event)
	{
		/** @var CraftVariable $variable */
		$variable = $event->sender;
		$variable->attachBehavior(
			'bookings',
			CraftVariableBehavior::class
		);
	}

}
