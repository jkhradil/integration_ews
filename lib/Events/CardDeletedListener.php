<?php
//declare(strict_types=1);

/**
* @copyright Copyright (c) 2023 Sebastian Krupinski <krupinski01@gmail.com>
*
* @author Sebastian Krupinski <krupinski01@gmail.com>
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

namespace OCA\EWS\Events;

use Psr\Log\LoggerInterface;

use OCP\EventDispatcher\Event;
use OCP\EventDispatcher\IEventListener;
use OCA\DAV\Events\CardDeletedEvent;

use OCA\EWS\Db\Action;
use OCA\EWS\Db\ActionMapper;
use OCA\EWS\Db\Correlation;
use OCA\EWS\Service\CorrelationsService;

class CardDeletedListener implements IEventListener {
    /**
	 * @var LoggerInterface
	 */
	private $logger;

	public function __construct(LoggerInterface $logger, ActionMapper $ActionManager, CorrelationsService $CorrelationsService) {
		$this->logger = $logger;
		$this->ActionManager = $ActionManager;
		$this->CorrelationsService = $CorrelationsService;
	}

    public function handle(Event $event): void {

        if ($event instanceof CardDeletedEvent) {
			try {
				// retrieve collection and object attributes
				$ec = $event->getAddressBookData();
				$eo = $event->getCardData();
				// determine ids and state  
				$uid = str_replace('principals/users/', '', $ec['principaluri']);
				$cid = (string) $ec['id'];
				$oid = str_replace('-deleted', '', $eo['uri']);
				// retrieve object corrollation
				$ci = $this->CorrelationsService->findByLocalId($uid, 'CO', $oid, $cid);
				// evaluate corrollation, if exists, create action
				if ($ci instanceof \OCA\EWS\Db\Correlation) {
					// construct action entry
					$a = new Action();
					$a->setuid($uid);
					$a->settype('CO');
					$a->setaction('D');
					$a->setorigin('L');
					$a->setlcid($cid);
					$a->setloid($oid);
					$a->setcreatedon(date(DATE_W3C));
					// deposit action entry
					$this->ActionManager->insert($a);
				}
			} catch (Exception $e) {
				$this->logger->warning($e->getMessage(), ['uid' => $event->getUser()->getUID()]);
			}
		}
		
    }
}