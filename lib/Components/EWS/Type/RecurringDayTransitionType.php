<?php
/**
 * Contains OCA\EWS\Components\EWS\Type\RecurringDayTransitionType.
 */

namespace OCA\EWS\Components\EWS\Type;

/**
 * Represents a time zone transition that occurs on the same day each year.
 *
 * @package OCA\EWS\Components\EWS\Type
 */
class RecurringDayTransitionType extends RecurringTimeTransitionType
{
    /**
     * The day of the week on which the time zone transition occurs.
     *
     * @since Exchange 2010
     *
     * @var string
     *
     * @see \OCA\EWS\Components\EWS\Enumeration\DayOfWeekType
     */
    public $DayOfWeek;

    /**
     * The occurrence of the day of the week in the month that the time zone
     * transition occurs.
     *
     * @since Exchange 2010
     *
     * @var string
     *
     * @see \OCA\EWS\Components\EWS\Enumeration\Occurrence
     */
    public $Occurrence;
}
