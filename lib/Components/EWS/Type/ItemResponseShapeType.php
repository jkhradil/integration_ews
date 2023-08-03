<?php
/**
 * Contains OCA\EWS\Components\EWS\Type\ItemResponseShapeType.
 */

namespace OCA\EWS\Components\EWS\Type;

use OCA\EWS\Components\EWS\Type;

/**
 * Represents a set of properties to return in a GetItem operation, FindItem
 * operation, or SyncFolderItems operation response.
 *
 * @package OCA\EWS\Components\EWS\Type
 */
class ItemResponseShapeType extends Type
{
    /**
     * Identifies additional properties to return in a response.
     *
     * @since Exchange 2007
     *
     * @var \OCA\EWS\Components\EWS\ArrayType\NonEmptyArrayOfPathsToElementType
     */
    public $AdditionalProperties;

    /**
     * Identifies the basic configuration of properties to return in an item or
     * folder response.
     *
     * @since Exchange 2007
     *
     * @var string
     *
     * @see \OCA\EWS\Components\EWS\Enumeration\DefaultShapeNamesType
     */
    public $BaseShape;

    /**
     * Identifies how the body text is formatted in the response.
     *
     * @since Exchange 2007
     *
     * @var string
     *
     * @see \OCA\EWS\Components\EWS\Enumeration\BodyTypeResponseType
     */
    public $BodyType;

    /**
     * Indicates whether the item HTML body is converted to UTF8.
     *
     * @since Exchange 2010
     *
     * @var boolean
     */
    public $ConvertHtmlCodePageToUTF8;

    /**
     * Specifies whether HTML content filtering is enabled.
     *
     * @since Exchange 2010
     *
     * @var boolean
     */
    public $FilterHtmlContent;

    /**
     * Specifies whether the Multipurpose Internet Mail Extensions (MIME)
     * content of an item is returned in the response.
     *
     * @since Exchange 2007
     *
     * @var boolean
     */
    public $IncludeMimeContent;
}
