<?php
/**
 * Contains OCA\EWS\Components\EWS\Request\GetServerTimeZonesType.
 */

namespace OCA\EWS\Components\EWS\Request;

/**
 * Represents a request to retrieve time zone definitions from the Exchange
 * server.
 *
 * @package OCA\EWS\Components\EWS\Request
 */
class GetServerTimeZonesType extends BaseRequestType
{
    /**
     * Contains an array of time zone definition identifiers that specifies the
     * requested time zone definitions.
     *
     * This element is optional.
     *
     * If this element is not included in the GetServerTimeZones operation
     * request, all time zone definitions that are available on the server are
     * returned in the response.
     *
     * @since Exchange 2010
     *
     * @var \OCA\EWS\Components\EWS\ArrayType\NonEmptyArrayOfTimeZoneIdType
     */
    public $Ids;

    /**
     * Specifies whether the GetServerTimeZones operation returns the complete
     * definition or only the name and identifier for each time zone.
     *
     * This attribute is optional.
     *
     * @since Exchange 2010
     *
     * @var boolean
     */
    public $ReturnFullTimeZoneData = true;
}
