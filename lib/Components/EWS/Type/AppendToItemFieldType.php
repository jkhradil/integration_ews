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
 * Identifies data to append to a single property of an item during an
 * UpdateItem operation.
 *
 * @package OCA\EWS\Components\EWS\Type
 */
class AppendToItemFieldType extends ItemChangeDescriptionType
{
    /**
     * Represents an Exchange calendar item.
     *
     * @since Exchange 2007
     *
     * @var \OCA\EWS\Components\EWS\Type\CalendarItemType
     */
    public $CalendarItem;

    /**
     * Represents an Exchange contact item.
     *
     * @since Exchange 2007
     *
     * @var \OCA\EWS\Components\EWS\Type\ContactItemType
     */
    public $Contact;

    /**
     * Represents a distribution list.
     *
     * @since Exchange 2007
     *
     * @var \OCA\EWS\Components\EWS\Type\DistributionListType
     */
    public $DistributionList;

    /**
     * Represents an item in the Exchange store.
     *
     * @since Exchange 2007
     *
     * @var \OCA\EWS\Components\EWS\Type\ItemType
     */
    public $Item;

    /**
     * Represents a meeting cancellation in the Exchange store.
     *
     * @since Exchange 2007
     *
     * @var \OCA\EWS\Components\EWS\Type\MeetingCancellationMessageType
     */
    public $MeetingCancellation;

    /**
     * Represents a meeting in the Exchange store.
     *
     * @since Exchange 2007
     *
     * @var \OCA\EWS\Components\EWS\Type\MeetingMessageType
     */
    public $MeetingMessage;

    /**
     * Represents a meeting request in the Exchange store.
     *
     * @since Exchange 2007
     *
     * @var \OCA\EWS\Components\EWS\Type\MeetingRequestMessageType
     */
    public $MeetingRequest;

    /**
     * Represents a meeting response in the Exchange store.
     *
     * @since Exchange 2007
     *
     * @var \OCA\EWS\Components\EWS\Type\MeetingResponseMessageType
     */
    public $MeetingResponse;

    /**
     * Represents an Exchange e-mail message.
     *
     * @since Exchange 2007
     *
     * @var \OCA\EWS\Components\EWS\Type\MessageType
     */
    public $Message;

    /**
     * Represents a task in the Exchange store.
     *
     * @since Exchange 2007
     *
     * @var \OCA\EWS\Components\EWS\Type\TaskType
     */
    public $Task;
}
