<?php
/**
 * Contains OCA\EWS\Components\EWS\Request\GetServiceConfigurationType.
 */

namespace OCA\EWS\Components\EWS\Request;

/**
 * Defines a GetServiceConfiguration request.
 *
 * @package OCA\EWS\Components\EWS\Request
 */
class GetServiceConfigurationType extends BaseRequestType
{
    /**
     * Identifies who the caller is sending as.
     *
     * This element is optional.
     *
     * If this element is not present, the authenticated user is assumed to be
     * the sender. The ActingAs element must be included for requesting sender
     * hints. An ErrorInvalidArgument error can be returned in a response if the
     * ActingAs element is missing, does not include a routing type, does not
     * include an e-mail address, contains an invalid e-mail address, does not
     * resolve to a user in Active Directory Domain Services (AD DS), or
     * resolves to multiple users in AD DS.
     *
     * @since Exchange 2010
     *
     * @var \OCA\EWS\Components\EWS\Type\EmailAddressType
     */
    public $ActingAs;

    /**
     * Contains the requested service configurations.
     *
     * This element is required.
     *
     * @since Exchange 2010
     *
     * @var \OCA\EWS\Components\EWS\ArrayType\ArrayOfServiceConfigurationType
     */
    public $RequestedConfiguration;
}
