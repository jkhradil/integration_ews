<?php
/**
 * Contains OCA\EWS\Components\EWS\Enumeration\FolderQueryTraversalType.
 */

namespace OCA\EWS\Components\EWS\Enumeration;

use OCA\EWS\Components\EWS\Enumeration;

/**
 * Defines the type of sub-tree traversal for an operation.
 *
 * @package OCA\EWS\Components\EWS\Enumeration
 */
class FolderQueryTraversalType extends Enumeration
{
    /**
     * Consider both direct children as well as all subfolders contained within
     * those children as well as the children's children, etc.
     *
     * @since Exchange 2007
     *
     * @var string
     */
    const DEEP = 'Deep';

    /**
     * Consider only folders that are direct children of the parent folder(s) in
     * question.
     *
     * @since Exchange 2007
     *
     * @var string
     */
    const SHALLOW = 'Shallow';

    /**
     * Consider only those items that are soft deleted from the parent folders
     * specified.
     *
     * @since Exchange 2007
     *
     * @var string
     */
    const SOFT_DELETED = 'SoftDeleted';
}
