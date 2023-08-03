<?php
/**
 * Contains OCA\EWS\Components\EWS\Type\ContactsFolderType.
 */

namespace OCA\EWS\Components\EWS\Type;

/**
 * Represents a contacts folder that is contained in a mailbox.
 *
 * @package OCA\EWS\Components\EWS\Type
 */
class ContactsFolderType extends BaseFolderType
{
    /**
     * Contains all the configured permissions for a folder.
     *
     * @since Exchange 2007 SP1
     *
     * @var \OCA\EWS\Components\EWS\Type\PermissionSetType
     */
    public $PermissionSet;

    /**
     * Indicates the permissions that the user has for the contact data that is
     * being shared.
     *
     * @since Exchange 2010
     *
     * @var string
     *
     * @see \OCA\EWS\Components\EWS\Enumeration\PermissionReadAccessType
     */
    public $SharingEffectiveRights;
}
