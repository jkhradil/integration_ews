<?php
//declare(strict_types=1);

/**
* @copyright Copyright (c) 2016 James I. Armes http://jamesarmes.com/
*
* @author James I. Armes http://jamesarmes.com/
*
* @license AGPL-3.0-or-later
*
* This program is free software: you can redistribute it and/or modify
* it under the terms of the GNU Affero General Public License as
* published by the Free Software Foundation, either version 3 of the
* License, or (at your option) any later version.
*
* This program is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU Affero General Public License for more details.
*
* You should have received a copy of the GNU Affero General Public License
* along with this program.  If not, see <http://www.gnu.org/licenses/>.
*
*/

namespace OCA\EWS\Components\EWS\Type;

/**
 * Represents an event in which an item or folder is created.
 *
 * @package OCA\EWS\Components\EWS\Type
 */
class BaseObjectChangedEventType extends BaseNotificationEventType
{
    /**
     * Represents the identifier of the folder.
     *
     * @since Exchange 2007
     *
     * @var \OCA\EWS\Components\EWS\Type\FolderIdType
     */
    public $FolderId;

    /**
     * Represents the identifier of the item.
     *
     * @since Exchange 2007
     *
     * @var \OCA\EWS\Components\EWS\Type\ItemIdType
     */
    public $ItemId;

    /**
     * Represents the identifier of the folder that contains the copy.
     *
     * @since Exchange 2007
     *
     * @var \OCA\EWS\Components\EWS\Type\FolderIdType
     */
    public $ParentFolderId;

    /**
     * Represents the timestamp of a copy item/folder mailbox event.
     *
     * @since Exchange 2007
     *
     * @var string
     *
     * @todo Make a DateTime object.
     */
    public $TimeStamp;
}
