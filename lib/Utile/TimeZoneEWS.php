<?php
declare(strict_types=1);

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

namespace OCA\EWS\Utile;

use DateTimeZone;

class TimeZoneEWS {
	
	/**
     * table of EWS (Microsoft/Windows) time zones information
     * @var array $ewstoiana
     */
	private static $ewszones = [
		array( 'id' => 'AUS Central Standard Time', 'StandardName' => 'Standard', 'StandardBias' => '-PT9H30M0S', 'StandardOffset' => '+09:30', 'DaylightStartMonth' => '', 'DaylightStartDay' => '', 'DaylightStartWeeK' => '', 'DaylightStartTime' => '', 'DaylightName' => '', 'DaylightBias' => '', 'DaylightOffset' => '', 'DaylightEndMonth' => '', 'DaylightEndDay' => '', 'DaylightEndWeek' => '', 'DaylightEndTime' => '' ), 
		// Aus Central W. Standard Time
		array( 'id' => 'AUS Eastern Standard Time', 'StandardName' => 'Standard', 'StandardBias' => '-PT10H0M0S', 'StandardOffset' => '+10:00', 'DaylightStartMonth' => '10', 'DaylightStartDay' => 'Sunday', 'DaylightStartWeeK' => '1', 'DaylightStartTime' => 'PT2H0M0S', 'DaylightName' => 'Daylight', 'DaylightBias' => '-PT11H0M0S', 'DaylightOffset' => '+11:00', 'DaylightEndMonth' => '4', 'DaylightEndDay' => 'Sunday', 'DaylightEndWeek' => '1', 'DaylightEndTime' => 'PT3H0M0S' ), 
		array( 'id' => 'Afghanistan Standard Time', 'StandardName' => 'Standard', 'StandardBias' => '-PT4H30M0S', 'StandardOffset' => '+04:30', 'DaylightStartMonth' => '', 'DaylightStartDay' => '', 'DaylightStartWeeK' => '', 'DaylightStartTime' => '', 'DaylightName' => '', 'DaylightBias' => '', 'DaylightOffset' => '', 'DaylightEndMonth' => '', 'DaylightEndDay' => '', 'DaylightEndWeek' => '', 'DaylightEndTime' => '' ), 
		array( 'id' => 'Alaskan Standard Time', 'StandardName' => 'Standard', 'StandardBias' => 'PT9H0M0S', 'StandardOffset' => '-09:00', 'DaylightStartMonth' => '3', 'DaylightStartDay' => 'Sunday', 'DaylightStartWeeK' => '2', 'DaylightStartTime' => 'PT2H0M0S', 'DaylightName' => 'Daylight', 'DaylightBias' => 'PT8H0M0S', 'DaylightOffset' => '-08:00', 'DaylightEndMonth' => '11', 'DaylightEndDay' => 'Sunday', 'DaylightEndWeek' => '1', 'DaylightEndTime' => 'PT2H0M0S' ), 
		// Aleutian Standard Time
		array( 'id' => 'Altai Standard Time', 'StandardName' => 'Standard', 'StandardBias' => '-PT6H0M0S', 'StandardOffset' => '+06:00', 'DaylightStartMonth' => '3', 'DaylightStartDay' => 'Sunday', 'DaylightStartWeeK' => '-1', 'DaylightStartTime' => 'PT2H0M0S', 'DaylightName' => 'Daylight', 'DaylightBias' => '-PT7H0M0S', 'DaylightOffset' => '+07:00', 'DaylightEndMonth' => '1', 'DaylightEndDay' => 'Friday', 'DaylightEndWeek' => '1', 'DaylightEndTime' => 'PT0S' ), 
		array( 'id' => 'Arab Standard Time', 'StandardName' => 'Standard', 'StandardBias' => '-PT3H0M0S', 'StandardOffset' => '+03:00', 'DaylightStartMonth' => '', 'DaylightStartDay' => '', 'DaylightStartWeeK' => '', 'DaylightStartTime' => '', 'DaylightName' => '', 'DaylightBias' => '', 'DaylightOffset' => '', 'DaylightEndMonth' => '', 'DaylightEndDay' => '', 'DaylightEndWeek' => '', 'DaylightEndTime' => '' ), 
		array( 'id' => 'Arabian Standard Time', 'StandardName' => 'Standard', 'StandardBias' => '-PT4H0M0S', 'StandardOffset' => '+04:00', 'DaylightStartMonth' => '', 'DaylightStartDay' => '', 'DaylightStartWeeK' => '', 'DaylightStartTime' => '', 'DaylightName' => '', 'DaylightBias' => '', 'DaylightOffset' => '', 'DaylightEndMonth' => '', 'DaylightEndDay' => '', 'DaylightEndWeek' => '', 'DaylightEndTime' => '' ), 
		array( 'id' => 'Arabic Standard Time', 'StandardName' => 'Standard', 'StandardBias' => '-PT3H0M0S', 'StandardOffset' => '+03:00', 'DaylightStartMonth' => '', 'DaylightStartDay' => '', 'DaylightStartWeeK' => '', 'DaylightStartTime' => '', 'DaylightName' => '', 'DaylightBias' => '', 'DaylightOffset' => '', 'DaylightEndMonth' => '', 'DaylightEndDay' => '', 'DaylightEndWeek' => '', 'DaylightEndTime' => '' ), 
		array( 'id' => 'Argentina Standard Time', 'StandardName' => 'Standard', 'StandardBias' => 'PT3H0M0S', 'StandardOffset' => '-03:00', 'DaylightStartMonth' => '', 'DaylightStartDay' => '', 'DaylightStartWeeK' => '', 'DaylightStartTime' => '', 'DaylightName' => '', 'DaylightBias' => '', 'DaylightOffset' => '', 'DaylightEndMonth' => '', 'DaylightEndDay' => '', 'DaylightEndWeek' => '', 'DaylightEndTime' => '' ), 
		array( 'id' => 'Astrakhan Standard Time', 'StandardName' => 'Standard', 'StandardBias' => '-PT3H0M0S', 'StandardOffset' => '+03:00', 'DaylightStartMonth' => '3', 'DaylightStartDay' => 'Sunday', 'DaylightStartWeeK' => '-1', 'DaylightStartTime' => 'PT2H0M0S', 'DaylightName' => 'Daylight', 'DaylightBias' => '-PT4H0M0S', 'DaylightOffset' => '+04:00', 'DaylightEndMonth' => '1', 'DaylightEndDay' => 'Friday', 'DaylightEndWeek' => '1', 'DaylightEndTime' => 'PT0S' ), 
		array( 'id' => 'Atlantic Standard Time', 'StandardName' => 'Standard', 'StandardBias' => 'PT4H0M0S', 'StandardOffset' => '-04:00', 'DaylightStartMonth' => '3', 'DaylightStartDay' => 'Sunday', 'DaylightStartWeeK' => '2', 'DaylightStartTime' => 'PT2H0M0S', 'DaylightName' => 'Daylight', 'DaylightBias' => 'PT3H0M0S', 'DaylightOffset' => '-03:00', 'DaylightEndMonth' => '11', 'DaylightEndDay' => 'Sunday', 'DaylightEndWeek' => '1', 'DaylightEndTime' => 'PT2H0M0S' ), 
		array( 'id' => 'Azerbaijan Standard Time', 'StandardName' => 'Standard', 'StandardBias' => '-PT4H0M0S', 'StandardOffset' => '+04:00', 'DaylightStartMonth' => '', 'DaylightStartDay' => '', 'DaylightStartWeeK' => '', 'DaylightStartTime' => '', 'DaylightName' => '', 'DaylightBias' => '', 'DaylightOffset' => '', 'DaylightEndMonth' => '', 'DaylightEndDay' => '', 'DaylightEndWeek' => '', 'DaylightEndTime' => '' ), 
		array( 'id' => 'Azores Standard Time', 'StandardName' => 'Standard', 'StandardBias' => 'PT1H0M0S', 'StandardOffset' => '-01:00', 'DaylightStartMonth' => '3', 'DaylightStartDay' => 'Sunday', 'DaylightStartWeeK' => '-1', 'DaylightStartTime' => 'PT0S', 'DaylightName' => 'Daylight', 'DaylightBias' => 'PT0S', 'DaylightOffset' => '+00:00', 'DaylightEndMonth' => '10', 'DaylightEndDay' => 'Sunday', 'DaylightEndWeek' => '-1', 'DaylightEndTime' => 'PT1H0M0S' ), 
		array( 'id' => 'Bahia Standard Time', 'StandardName' => 'Standard', 'StandardBias' => 'PT3H0M0S', 'StandardOffset' => '-03:00', 'DaylightStartMonth' => '', 'DaylightStartDay' => '', 'DaylightStartWeeK' => '', 'DaylightStartTime' => '', 'DaylightName' => '', 'DaylightBias' => '', 'DaylightOffset' => '', 'DaylightEndMonth' => '', 'DaylightEndDay' => '', 'DaylightEndWeek' => '', 'DaylightEndTime' => '' ), 
		array( 'id' => 'Bangladesh Standard Time', 'StandardName' => 'Standard', 'StandardBias' => '-PT6H0M0S', 'StandardOffset' => '+06:00', 'DaylightStartMonth' => '', 'DaylightStartDay' => '', 'DaylightStartWeeK' => '', 'DaylightStartTime' => '', 'DaylightName' => '', 'DaylightBias' => '', 'DaylightOffset' => '', 'DaylightEndMonth' => '', 'DaylightEndDay' => '', 'DaylightEndWeek' => '', 'DaylightEndTime' => '' ), 
		array( 'id' => 'Belarus Standard Time', 'StandardName' => 'Standard', 'StandardBias' => '-PT3H0M0S', 'StandardOffset' => '+03:00', 'DaylightStartMonth' => '', 'DaylightStartDay' => '', 'DaylightStartWeeK' => '', 'DaylightStartTime' => '', 'DaylightName' => '', 'DaylightBias' => '', 'DaylightOffset' => '', 'DaylightEndMonth' => '', 'DaylightEndDay' => '', 'DaylightEndWeek' => '', 'DaylightEndTime' => '' ), 
		// Bougainville Standard Time
		array( 'id' => 'Cape Verde Standard Time', 'StandardName' => 'Standard', 'StandardBias' => 'PT1H0M0S', 'StandardOffset' => '-01:00', 'DaylightStartMonth' => '', 'DaylightStartDay' => '', 'DaylightStartWeeK' => '', 'DaylightStartTime' => '', 'DaylightName' => '', 'DaylightBias' => '', 'DaylightOffset' => '', 'DaylightEndMonth' => '', 'DaylightEndDay' => '', 'DaylightEndWeek' => '', 'DaylightEndTime' => '' ), 
		array( 'id' => 'Canada Central Standard Time', 'StandardName' => 'Standard', 'StandardBias' => 'PT6H0M0S', 'StandardOffset' => '-06:00', 'DaylightStartMonth' => '', 'DaylightStartDay' => '', 'DaylightStartWeeK' => '', 'DaylightStartTime' => '', 'DaylightName' => '', 'DaylightBias' => '', 'DaylightOffset' => '', 'DaylightEndMonth' => '', 'DaylightEndDay' => '', 'DaylightEndWeek' => '', 'DaylightEndTime' => '' ), 
		array( 'id' => 'Caucasus Standard Time', 'StandardName' => 'Standard', 'StandardBias' => '-PT4H0M0S', 'StandardOffset' => '+04:00', 'DaylightStartMonth' => '', 'DaylightStartDay' => '', 'DaylightStartWeeK' => '', 'DaylightStartTime' => '', 'DaylightName' => '', 'DaylightBias' => '', 'DaylightOffset' => '', 'DaylightEndMonth' => '', 'DaylightEndDay' => '', 'DaylightEndWeek' => '', 'DaylightEndTime' => '' ), 
		array( 'id' => 'Cen. Australia Standard Time', 'StandardName' => 'Standard', 'StandardBias' => '-PT9H30M0S', 'StandardOffset' => '+09:30', 'DaylightStartMonth' => '10', 'DaylightStartDay' => 'Sunday', 'DaylightStartWeeK' => '1', 'DaylightStartTime' => 'PT2H0M0S', 'DaylightName' => 'Daylight', 'DaylightBias' => '-PT10H30M0S', 'DaylightOffset' => '+10:30', 'DaylightEndMonth' => '4', 'DaylightEndDay' => 'Sunday', 'DaylightEndWeek' => '1', 'DaylightEndTime' => 'PT3H0M0S' ), 
		array( 'id' => 'Central America Standard Time', 'StandardName' => 'Standard', 'StandardBias' => 'PT6H0M0S', 'StandardOffset' => '-06:00', 'DaylightStartMonth' => '', 'DaylightStartDay' => '', 'DaylightStartWeeK' => '', 'DaylightStartTime' => '', 'DaylightName' => '', 'DaylightBias' => '', 'DaylightOffset' => '', 'DaylightEndMonth' => '', 'DaylightEndDay' => '', 'DaylightEndWeek' => '', 'DaylightEndTime' => '' ), 
		array( 'id' => 'Central Asia Standard Time', 'StandardName' => 'Standard', 'StandardBias' => '-PT6H0M0S', 'StandardOffset' => '+06:00', 'DaylightStartMonth' => '', 'DaylightStartDay' => '', 'DaylightStartWeeK' => '', 'DaylightStartTime' => '', 'DaylightName' => '', 'DaylightBias' => '', 'DaylightOffset' => '', 'DaylightEndMonth' => '', 'DaylightEndDay' => '', 'DaylightEndWeek' => '', 'DaylightEndTime' => '' ), 
		array( 'id' => 'Central Brazilian Standard Time', 'StandardName' => 'Standard', 'StandardBias' => 'PT4H0M0S', 'StandardOffset' => '-04:00', 'DaylightStartMonth' => '10', 'DaylightStartDay' => 'Saturday', 'DaylightStartWeeK' => '3', 'DaylightStartTime' => 'PT23H59M0S', 'DaylightName' => 'Daylight', 'DaylightBias' => 'PT3H0M0S', 'DaylightOffset' => '-03:00', 'DaylightEndMonth' => '2', 'DaylightEndDay' => 'Saturday', 'DaylightEndWeek' => '3', 'DaylightEndTime' => 'PT23H59M0S' ), 
		array( 'id' => 'Central Europe Standard Time', 'StandardName' => 'Standard', 'StandardBias' => '-PT1H0M0S', 'StandardOffset' => '+01:00', 'DaylightStartMonth' => '3', 'DaylightStartDay' => 'Sunday', 'DaylightStartWeeK' => '-1', 'DaylightStartTime' => 'PT2H0M0S', 'DaylightName' => 'Daylight', 'DaylightBias' => '-PT2H0M0S', 'DaylightOffset' => '+02:00', 'DaylightEndMonth' => '10', 'DaylightEndDay' => 'Sunday', 'DaylightEndWeek' => '-1', 'DaylightEndTime' => 'PT3H0M0S' ), 
		array( 'id' => 'Central European Standard Time', 'StandardName' => 'Standard', 'StandardBias' => '-PT1H0M0S', 'StandardOffset' => '+01:00', 'DaylightStartMonth' => '3', 'DaylightStartDay' => 'Sunday', 'DaylightStartWeeK' => '-1', 'DaylightStartTime' => 'PT2H0M0S', 'DaylightName' => 'Daylight', 'DaylightBias' => '-PT2H0M0S', 'DaylightOffset' => '+02:00', 'DaylightEndMonth' => '10', 'DaylightEndDay' => 'Sunday', 'DaylightEndWeek' => '-1', 'DaylightEndTime' => 'PT3H0M0S' ), 
		array( 'id' => 'Central Pacific Standard Time', 'StandardName' => 'Standard', 'StandardBias' => '-PT11H0M0S', 'StandardOffset' => '+11:00', 'DaylightStartMonth' => '', 'DaylightStartDay' => '', 'DaylightStartWeeK' => '', 'DaylightStartTime' => '', 'DaylightName' => '', 'DaylightBias' => '', 'DaylightOffset' => '', 'DaylightEndMonth' => '', 'DaylightEndDay' => '', 'DaylightEndWeek' => '', 'DaylightEndTime' => '' ), 
		array( 'id' => 'Central Standard Time', 'StandardName' => 'Standard', 'StandardBias' => 'PT6H0M0S', 'StandardOffset' => '-06:00', 'DaylightStartMonth' => '3', 'DaylightStartDay' => 'Sunday', 'DaylightStartWeeK' => '2', 'DaylightStartTime' => 'PT2H0M0S', 'DaylightName' => 'Daylight', 'DaylightBias' => 'PT5H0M0S', 'DaylightOffset' => '-05:00', 'DaylightEndMonth' => '11', 'DaylightEndDay' => 'Sunday', 'DaylightEndWeek' => '1', 'DaylightEndTime' => 'PT2H0M0S' ), 
		array( 'id' => 'Central Standard Time (Mexico)', 'StandardName' => 'Standard', 'StandardBias' => 'PT6H0M0S', 'StandardOffset' => '-06:00', 'DaylightStartMonth' => '4', 'DaylightStartDay' => 'Sunday', 'DaylightStartWeeK' => '1', 'DaylightStartTime' => 'PT2H0M0S', 'DaylightName' => 'Daylight', 'DaylightBias' => 'PT5H0M0S', 'DaylightOffset' => '-05:00', 'DaylightEndMonth' => '10', 'DaylightEndDay' => 'Sunday', 'DaylightEndWeek' => '-1', 'DaylightEndTime' => 'PT2H0M0S' ), 
		// Chatham Islands Standard Time
		array( 'id' => 'China Standard Time', 'StandardName' => 'Standard', 'StandardBias' => '-PT8H0M0S', 'StandardOffset' => '+08:00', 'DaylightStartMonth' => '', 'DaylightStartDay' => '', 'DaylightStartWeeK' => '', 'DaylightStartTime' => '', 'DaylightName' => '', 'DaylightBias' => '', 'DaylightOffset' => '', 'DaylightEndMonth' => '', 'DaylightEndDay' => '', 'DaylightEndWeek' => '', 'DaylightEndTime' => '' ), 
		array( 'id' => 'Coordinated Universal Time', 'StandardName' => 'Standard', 'StandardBias' => 'PT0S', 'StandardOffset' => '+00:00', 'DaylightStartMonth' => '', 'DaylightStartDay' => '', 'DaylightStartWeeK' => '', 'DaylightStartTime' => '', 'DaylightName' => '', 'DaylightBias' => '', 'DaylightOffset' => '', 'DaylightEndMonth' => '', 'DaylightEndDay' => '', 'DaylightEndWeek' => '', 'DaylightEndTime' => '' ), 
		//Cuba Standard Time
		array( 'id' => 'Dateline Standard Time', 'StandardName' => 'Standard', 'StandardBias' => 'PT12H0M0S', 'StandardOffset' => '-12:00', 'DaylightStartMonth' => '', 'DaylightStartDay' => '', 'DaylightStartWeeK' => '', 'DaylightStartTime' => '', 'DaylightName' => '', 'DaylightBias' => '', 'DaylightOffset' => '', 'DaylightEndMonth' => '', 'DaylightEndDay' => '', 'DaylightEndWeek' => '', 'DaylightEndTime' => '' ), 
		array( 'id' => 'E. Africa Standard Time', 'StandardName' => 'Standard', 'StandardBias' => '-PT3H0M0S', 'StandardOffset' => '+03:00', 'DaylightStartMonth' => '', 'DaylightStartDay' => '', 'DaylightStartWeeK' => '', 'DaylightStartTime' => '', 'DaylightName' => '', 'DaylightBias' => '', 'DaylightOffset' => '', 'DaylightEndMonth' => '', 'DaylightEndDay' => '', 'DaylightEndWeek' => '', 'DaylightEndTime' => '' ), 
		array( 'id' => 'E. Australia Standard Time', 'StandardName' => 'Standard', 'StandardBias' => '-PT10H0M0S', 'StandardOffset' => '+10:00', 'DaylightStartMonth' => '', 'DaylightStartDay' => '', 'DaylightStartWeeK' => '', 'DaylightStartTime' => '', 'DaylightName' => '', 'DaylightBias' => '', 'DaylightOffset' => '', 'DaylightEndMonth' => '', 'DaylightEndDay' => '', 'DaylightEndWeek' => '', 'DaylightEndTime' => '' ), 
		array( 'id' => 'E. Europe Standard Time', 'StandardName' => 'Standard', 'StandardBias' => '-PT2H0M0S', 'StandardOffset' => '+02:00', 'DaylightStartMonth' => '3', 'DaylightStartDay' => 'Sunday', 'DaylightStartWeeK' => '-1', 'DaylightStartTime' => 'PT2H0M0S', 'DaylightName' => 'Daylight', 'DaylightBias' => '-PT3H0M0S', 'DaylightOffset' => '+03:00', 'DaylightEndMonth' => '10', 'DaylightEndDay' => 'Sunday', 'DaylightEndWeek' => '-1', 'DaylightEndTime' => 'PT3H0M0S' ), 
		array( 'id' => 'E. South America Standard Time', 'StandardName' => 'Standard', 'StandardBias' => 'PT3H0M0S', 'StandardOffset' => '-03:00', 'DaylightStartMonth' => '10', 'DaylightStartDay' => 'Saturday', 'DaylightStartWeeK' => '3', 'DaylightStartTime' => 'PT23H59M0S', 'DaylightName' => 'Daylight', 'DaylightBias' => 'PT2H0M0S', 'DaylightOffset' => '-02:00', 'DaylightEndMonth' => '2', 'DaylightEndDay' => 'Saturday', 'DaylightEndWeek' => '3', 'DaylightEndTime' => 'PT23H59M0S' ), 
		array( 'id' => 'Easter Island Standard Time', 'StandardName' => 'Standard', 'StandardBias' => 'PT6H0M0S', 'StandardOffset' => '-06:00', 'DaylightStartMonth' => '8', 'DaylightStartDay' => 'Saturday', 'DaylightStartWeeK' => '2', 'DaylightStartTime' => 'PT22H0M0S', 'DaylightName' => 'Daylight', 'DaylightBias' => 'PT5H0M0S', 'DaylightOffset' => '-05:00', 'DaylightEndMonth' => '5', 'DaylightEndDay' => 'Saturday', 'DaylightEndWeek' => '2', 'DaylightEndTime' => 'PT22H0M0S' ), 
		array( 'id' => 'Eastern Standard Time', 'StandardName' => 'Standard', 'StandardBias' => 'PT5H0M0S', 'StandardOffset' => '-05:00', 'DaylightStartMonth' => '3', 'DaylightStartDay' => 'Sunday', 'DaylightStartWeeK' => '2', 'DaylightStartTime' => 'PT2H0M0S', 'DaylightName' => 'Daylight', 'DaylightBias' => 'PT4H0M0S', 'DaylightOffset' => '-04:00', 'DaylightEndMonth' => '11', 'DaylightEndDay' => 'Sunday', 'DaylightEndWeek' => '1', 'DaylightEndTime' => 'PT2H0M0S' ), 
		array( 'id' => 'Eastern Standard Time (Mexico)', 'StandardName' => 'Standard', 'StandardBias' => 'PT5H0M0S', 'StandardOffset' => '-05:00', 'DaylightStartMonth' => '', 'DaylightStartDay' => '', 'DaylightStartWeeK' => '', 'DaylightStartTime' => '', 'DaylightName' => '', 'DaylightBias' => '', 'DaylightOffset' => '', 'DaylightEndMonth' => '', 'DaylightEndDay' => '', 'DaylightEndWeek' => '', 'DaylightEndTime' => '' ), 
		array( 'id' => 'Egypt Standard Time', 'StandardName' => 'Standard', 'StandardBias' => '-PT2H0M0S', 'StandardOffset' => '+02:00', 'DaylightStartMonth' => '', 'DaylightStartDay' => '', 'DaylightStartWeeK' => '', 'DaylightStartTime' => '', 'DaylightName' => '', 'DaylightBias' => '', 'DaylightOffset' => '', 'DaylightEndMonth' => '', 'DaylightEndDay' => '', 'DaylightEndWeek' => '', 'DaylightEndTime' => '' ), 
		// Ekaterinburg Standard Time
		array( 'id' => 'FLE Standard Time', 'StandardName' => 'Standard', 'StandardBias' => '-PT2H0M0S', 'StandardOffset' => '+02:00', 'DaylightStartMonth' => '3', 'DaylightStartDay' => 'Sunday', 'DaylightStartWeeK' => '-1', 'DaylightStartTime' => 'PT3H0M0S', 'DaylightName' => 'Daylight', 'DaylightBias' => '-PT3H0M0S', 'DaylightOffset' => '+03:00', 'DaylightEndMonth' => '10', 'DaylightEndDay' => 'Sunday', 'DaylightEndWeek' => '-1', 'DaylightEndTime' => 'PT4H0M0S' ), 
		array( 'id' => 'Fiji Standard Time', 'StandardName' => 'Standard', 'StandardBias' => '-PT12H0M0S', 'StandardOffset' => '+12:00', 'DaylightStartMonth' => '11', 'DaylightStartDay' => 'Sunday', 'DaylightStartWeeK' => '1', 'DaylightStartTime' => 'PT2H0M0S', 'DaylightName' => 'Daylight', 'DaylightBias' => '-PT13H0M0S', 'DaylightOffset' => '+13:00', 'DaylightEndMonth' => '1', 'DaylightEndDay' => 'Sunday', 'DaylightEndWeek' => '3', 'DaylightEndTime' => 'PT3H0M0S' ), 
		array( 'id' => 'GMT Standard Time', 'StandardName' => 'Standard', 'StandardBias' => 'PT0S', 'StandardOffset' => '+00:00', 'DaylightStartMonth' => '3', 'DaylightStartDay' => 'Sunday', 'DaylightStartWeeK' => '-1', 'DaylightStartTime' => 'PT1H0M0S', 'DaylightName' => 'Daylight', 'DaylightBias' => '-PT1H0M0S', 'DaylightOffset' => '+01:00', 'DaylightEndMonth' => '10', 'DaylightEndDay' => 'Sunday', 'DaylightEndWeek' => '-1', 'DaylightEndTime' => 'PT2H0M0S' ), 
		array( 'id' => 'GTB Standard Time', 'StandardName' => 'Standard', 'StandardBias' => '-PT2H0M0S', 'StandardOffset' => '+02:00', 'DaylightStartMonth' => '3', 'DaylightStartDay' => 'Sunday', 'DaylightStartWeeK' => '-1', 'DaylightStartTime' => 'PT3H0M0S', 'DaylightName' => 'Daylight', 'DaylightBias' => '-PT3H0M0S', 'DaylightOffset' => '+03:00', 'DaylightEndMonth' => '10', 'DaylightEndDay' => 'Sunday', 'DaylightEndWeek' => '-1', 'DaylightEndTime' => 'PT4H0M0S' ), 
		array( 'id' => 'Georgian Standard Time', 'StandardName' => 'Standard', 'StandardBias' => '-PT4H0M0S', 'StandardOffset' => '+04:00', 'DaylightStartMonth' => '', 'DaylightStartDay' => '', 'DaylightStartWeeK' => '', 'DaylightStartTime' => '', 'DaylightName' => '', 'DaylightBias' => '', 'DaylightOffset' => '', 'DaylightEndMonth' => '', 'DaylightEndDay' => '', 'DaylightEndWeek' => '', 'DaylightEndTime' => '' ), 
		array( 'id' => 'Greenland Standard Time', 'StandardName' => 'Standard', 'StandardBias' => 'PT3H0M0S', 'StandardOffset' => '-03:00', 'DaylightStartMonth' => '3', 'DaylightStartDay' => 'Saturday', 'DaylightStartWeeK' => '-1', 'DaylightStartTime' => 'PT22H0M0S', 'DaylightName' => 'Daylight', 'DaylightBias' => 'PT2H0M0S', 'DaylightOffset' => '-02:00', 'DaylightEndMonth' => '10', 'DaylightEndDay' => 'Saturday', 'DaylightEndWeek' => '-1', 'DaylightEndTime' => 'PT23H0M0S' ), 
		array( 'id' => 'Greenwich Standard Time', 'StandardName' => 'Standard', 'StandardBias' => 'PT0S', 'StandardOffset' => '+00:00', 'DaylightStartMonth' => '', 'DaylightStartDay' => '', 'DaylightStartWeeK' => '', 'DaylightStartTime' => '', 'DaylightName' => '', 'DaylightBias' => '', 'DaylightOffset' => '', 'DaylightEndMonth' => '', 'DaylightEndDay' => '', 'DaylightEndWeek' => '', 'DaylightEndTime' => '' ), 
		array( 'id' => 'Haiti Standard Time', 'StandardName' => 'Standard', 'StandardBias' => 'PT5H0M0S', 'StandardOffset' => '-05:00', 'DaylightStartMonth' => '', 'DaylightStartDay' => '', 'DaylightStartWeeK' => '', 'DaylightStartTime' => '', 'DaylightName' => '', 'DaylightBias' => '', 'DaylightOffset' => '', 'DaylightEndMonth' => '', 'DaylightEndDay' => '', 'DaylightEndWeek' => '', 'DaylightEndTime' => '' ), 
		array( 'id' => 'Hawaiian Standard Time', 'StandardName' => 'Standard', 'StandardBias' => 'PT10H0M0S', 'StandardOffset' => '-10:00', 'DaylightStartMonth' => '', 'DaylightStartDay' => '', 'DaylightStartWeeK' => '', 'DaylightStartTime' => '', 'DaylightName' => '', 'DaylightBias' => '', 'DaylightOffset' => '', 'DaylightEndMonth' => '', 'DaylightEndDay' => '', 'DaylightEndWeek' => '', 'DaylightEndTime' => '' ), 
		array( 'id' => 'India Standard Time', 'StandardName' => 'Standard', 'StandardBias' => '-PT5H30M0S', 'StandardOffset' => '+05:30', 'DaylightStartMonth' => '', 'DaylightStartDay' => '', 'DaylightStartWeeK' => '', 'DaylightStartTime' => '', 'DaylightName' => '', 'DaylightBias' => '', 'DaylightOffset' => '', 'DaylightEndMonth' => '', 'DaylightEndDay' => '', 'DaylightEndWeek' => '', 'DaylightEndTime' => '' ), 
		array( 'id' => 'Iran Standard Time', 'StandardName' => 'Standard', 'StandardBias' => '-PT3H30M0S', 'StandardOffset' => '+03:30', 'DaylightStartMonth' => '3', 'DaylightStartDay' => 'Sunday', 'DaylightStartWeeK' => '3', 'DaylightStartTime' => 'PT23H59M0S', 'DaylightName' => 'Daylight', 'DaylightBias' => '-PT4H30M0S', 'DaylightOffset' => '+04:30', 'DaylightEndMonth' => '9', 'DaylightEndDay' => 'Tuesday', 'DaylightEndWeek' => '3', 'DaylightEndTime' => 'PT23H59M0S' ), 
		array( 'id' => 'Israel Standard Time', 'StandardName' => 'Standard', 'StandardBias' => '-PT2H0M0S', 'StandardOffset' => '+02:00', 'DaylightStartMonth' => '3', 'DaylightStartDay' => 'Friday', 'DaylightStartWeeK' => '-1', 'DaylightStartTime' => 'PT2H0M0S', 'DaylightName' => 'Daylight', 'DaylightBias' => '-PT3H0M0S', 'DaylightOffset' => '+03:00', 'DaylightEndMonth' => '10', 'DaylightEndDay' => 'Sunday', 'DaylightEndWeek' => '-1', 'DaylightEndTime' => 'PT2H0M0S' ), 
		array( 'id' => 'Jordan Standard Time', 'StandardName' => 'Standard', 'StandardBias' => '-PT2H0M0S', 'StandardOffset' => '+02:00', 'DaylightStartMonth' => '3', 'DaylightStartDay' => 'Thursday', 'DaylightStartWeeK' => '-1', 'DaylightStartTime' => 'PT23H59M0S', 'DaylightName' => 'Daylight', 'DaylightBias' => '-PT3H0M0S', 'DaylightOffset' => '+03:00', 'DaylightEndMonth' => '10', 'DaylightEndDay' => 'Friday', 'DaylightEndWeek' => '-1', 'DaylightEndTime' => 'PT1H0M0S' ), 
		// Kaliningrad Standard Time
		array( 'id' => 'Kamchatka Standard Time', 'StandardName' => 'Standard', 'StandardBias' => '-PT12H0M0S', 'StandardOffset' => '+12:00', 'DaylightStartMonth' => '3', 'DaylightStartDay' => 'Sunday', 'DaylightStartWeeK' => '-1', 'DaylightStartTime' => 'PT2H0M0S', 'DaylightName' => 'Daylight', 'DaylightBias' => '-PT13H0M0S', 'DaylightOffset' => '+13:00', 'DaylightEndMonth' => '10', 'DaylightEndDay' => 'Sunday', 'DaylightEndWeek' => '-1', 'DaylightEndTime' => 'PT3H0M0S' ), 
		array( 'id' => 'Korea Standard Time', 'StandardName' => 'Standard', 'StandardBias' => '-PT9H0M0S', 'StandardOffset' => '+09:00', 'DaylightStartMonth' => '', 'DaylightStartDay' => '', 'DaylightStartWeeK' => '', 'DaylightStartTime' => '', 'DaylightName' => '', 'DaylightBias' => '', 'DaylightOffset' => '', 'DaylightEndMonth' => '', 'DaylightEndDay' => '', 'DaylightEndWeek' => '', 'DaylightEndTime' => '' ), 
		array( 'id' => 'Libya Standard Time', 'StandardName' => 'Standard', 'StandardBias' => '-PT2H0M0S', 'StandardOffset' => '+02:00', 'DaylightStartMonth' => '', 'DaylightStartDay' => '', 'DaylightStartWeeK' => '', 'DaylightStartTime' => '', 'DaylightName' => '', 'DaylightBias' => '', 'DaylightOffset' => '', 'DaylightEndMonth' => '', 'DaylightEndDay' => '', 'DaylightEndWeek' => '', 'DaylightEndTime' => '' ), 
		array( 'id' => 'Line Islands Standard Time', 'StandardName' => 'Standard', 'StandardBias' => '-PT14H0M0S', 'StandardOffset' => '+14:00', 'DaylightStartMonth' => '', 'DaylightStartDay' => '', 'DaylightStartWeeK' => '', 'DaylightStartTime' => '', 'DaylightName' => '', 'DaylightBias' => '', 'DaylightOffset' => '', 'DaylightEndMonth' => '', 'DaylightEndDay' => '', 'DaylightEndWeek' => '', 'DaylightEndTime' => '' ), 
		// Lord Howe Standard Time
		array( 'id' => 'Magadan Standard Time', 'StandardName' => 'Standard', 'StandardBias' => '-PT10H0M0S', 'StandardOffset' => '+10:00', 'DaylightStartMonth' => '', 'DaylightStartDay' => '', 'DaylightStartWeeK' => '', 'DaylightStartTime' => '', 'DaylightName' => '', 'DaylightBias' => '', 'DaylightOffset' => '', 'DaylightEndMonth' => '', 'DaylightEndDay' => '', 'DaylightEndWeek' => '', 'DaylightEndTime' => '' ), 
		// Magallanes Standard Time
		array( 'id' => 'Malaysia Standard Time', 'StandardName' => 'Standard', 'StandardBias' => '-PT8H0M0S', 'StandardOffset' => '+08:00', 'DaylightStartMonth' => '', 'DaylightStartDay' => '', 'DaylightStartWeeK' => '', 'DaylightStartTime' => '', 'DaylightName' => '', 'DaylightBias' => '', 'DaylightOffset' => '', 'DaylightEndMonth' => '', 'DaylightEndDay' => '', 'DaylightEndWeek' => '', 'DaylightEndTime' => '' ), 
		// Marquesas Standard Time
		array( 'id' => 'Mauritius Standard Time', 'StandardName' => 'Standard', 'StandardBias' => '-PT4H0M0S', 'StandardOffset' => '+04:00', 'DaylightStartMonth' => '', 'DaylightStartDay' => '', 'DaylightStartWeeK' => '', 'DaylightStartTime' => '', 'DaylightName' => '', 'DaylightBias' => '', 'DaylightOffset' => '', 'DaylightEndMonth' => '', 'DaylightEndDay' => '', 'DaylightEndWeek' => '', 'DaylightEndTime' => '' ), 
		array( 'id' => 'Mid-Atlantic Standard Time', 'StandardName' => 'Standard', 'StandardBias' => 'PT2H0M0S', 'StandardOffset' => '-02:00', 'DaylightStartMonth' => '3', 'DaylightStartDay' => 'Sunday', 'DaylightStartWeeK' => '-1', 'DaylightStartTime' => 'PT2H0M0S', 'DaylightName' => 'Daylight', 'DaylightBias' => 'PT1H0M0S', 'DaylightOffset' => '-01:00', 'DaylightEndMonth' => '9', 'DaylightEndDay' => 'Sunday', 'DaylightEndWeek' => '-1', 'DaylightEndTime' => 'PT2H0M0S' ), 
		array( 'id' => 'Middle East Standard Time', 'StandardName' => 'Standard', 'StandardBias' => '-PT2H0M0S', 'StandardOffset' => '+02:00', 'DaylightStartMonth' => '3', 'DaylightStartDay' => 'Saturday', 'DaylightStartWeeK' => '-1', 'DaylightStartTime' => 'PT23H59M0S', 'DaylightName' => 'Daylight', 'DaylightBias' => '-PT3H0M0S', 'DaylightOffset' => '+03:00', 'DaylightEndMonth' => '10', 'DaylightEndDay' => 'Saturday', 'DaylightEndWeek' => '-1', 'DaylightEndTime' => 'PT23H59M0S' ), 
		array( 'id' => 'Montevideo Standard Time', 'StandardName' => 'Standard', 'StandardBias' => 'PT3H0M0S', 'StandardOffset' => '-03:00', 'DaylightStartMonth' => '', 'DaylightStartDay' => '', 'DaylightStartWeeK' => '', 'DaylightStartTime' => '', 'DaylightName' => '', 'DaylightBias' => '', 'DaylightOffset' => '', 'DaylightEndMonth' => '', 'DaylightEndDay' => '', 'DaylightEndWeek' => '', 'DaylightEndTime' => '' ), 
		array( 'id' => 'Morocco Standard Time', 'StandardName' => 'Standard', 'StandardBias' => 'PT0S', 'StandardOffset' => '+00:00', 'DaylightStartMonth' => '3', 'DaylightStartDay' => 'Sunday', 'DaylightStartWeeK' => '-1', 'DaylightStartTime' => 'PT2H0M0S', 'DaylightName' => 'Daylight', 'DaylightBias' => '-PT1H0M0S', 'DaylightOffset' => '+01:00', 'DaylightEndMonth' => '6', 'DaylightEndDay' => 'Sunday', 'DaylightEndWeek' => '1', 'DaylightEndTime' => 'PT3H0M0S' ), 
		array( 'id' => 'Mountain Standard Time', 'StandardName' => 'Standard', 'StandardBias' => 'PT7H0M0S', 'StandardOffset' => '-07:00', 'DaylightStartMonth' => '3', 'DaylightStartDay' => 'Sunday', 'DaylightStartWeeK' => '2', 'DaylightStartTime' => 'PT2H0M0S', 'DaylightName' => 'Daylight', 'DaylightBias' => 'PT6H0M0S', 'DaylightOffset' => '-06:00', 'DaylightEndMonth' => '11', 'DaylightEndDay' => 'Sunday', 'DaylightEndWeek' => '1', 'DaylightEndTime' => 'PT2H0M0S' ), 
		array( 'id' => 'Mountain Standard Time (Mexico)', 'StandardName' => 'Standard', 'StandardBias' => 'PT7H0M0S', 'StandardOffset' => '-07:00', 'DaylightStartMonth' => '4', 'DaylightStartDay' => 'Sunday', 'DaylightStartWeeK' => '1', 'DaylightStartTime' => 'PT2H0M0S', 'DaylightName' => 'Daylight', 'DaylightBias' => 'PT6H0M0S', 'DaylightOffset' => '-06:00', 'DaylightEndMonth' => '10', 'DaylightEndDay' => 'Sunday', 'DaylightEndWeek' => '-1', 'DaylightEndTime' => 'PT2H0M0S' ), 
		array( 'id' => 'Myanmar Standard Time', 'StandardName' => 'Standard', 'StandardBias' => '-PT6H30M0S', 'StandardOffset' => '+06:30', 'DaylightStartMonth' => '', 'DaylightStartDay' => '', 'DaylightStartWeeK' => '', 'DaylightStartTime' => '', 'DaylightName' => '', 'DaylightBias' => '', 'DaylightOffset' => '', 'DaylightEndMonth' => '', 'DaylightEndDay' => '', 'DaylightEndWeek' => '', 'DaylightEndTime' => '' ), 
		// N. Central Asia Standard Time
		array( 'id' => 'Namibia Standard Time', 'StandardName' => 'Standard', 'StandardBias' => '-PT1H0M0S', 'StandardOffset' => '+01:00', 'DaylightStartMonth' => '9', 'DaylightStartDay' => 'Sunday', 'DaylightStartWeeK' => '1', 'DaylightStartTime' => 'PT2H0M0S', 'DaylightName' => 'Daylight', 'DaylightBias' => '-PT2H0M0S', 'DaylightOffset' => '+02:00', 'DaylightEndMonth' => '4', 'DaylightEndDay' => 'Sunday', 'DaylightEndWeek' => '1', 'DaylightEndTime' => 'PT2H0M0S' ), 
		array( 'id' => 'Nepal Standard Time', 'StandardName' => 'Standard', 'StandardBias' => '-PT5H45M0S', 'StandardOffset' => '+05:45', 'DaylightStartMonth' => '', 'DaylightStartDay' => '', 'DaylightStartWeeK' => '', 'DaylightStartTime' => '', 'DaylightName' => '', 'DaylightBias' => '', 'DaylightOffset' => '', 'DaylightEndMonth' => '', 'DaylightEndDay' => '', 'DaylightEndWeek' => '', 'DaylightEndTime' => '' ), 
		array( 'id' => 'New Zealand Standard Time', 'StandardName' => 'Standard', 'StandardBias' => '-PT12H0M0S', 'StandardOffset' => '+12:00', 'DaylightStartMonth' => '9', 'DaylightStartDay' => 'Sunday', 'DaylightStartWeeK' => '-1', 'DaylightStartTime' => 'PT2H0M0S', 'DaylightName' => 'Daylight', 'DaylightBias' => '-PT13H0M0S', 'DaylightOffset' => '+13:00', 'DaylightEndMonth' => '4', 'DaylightEndDay' => 'Sunday', 'DaylightEndWeek' => '1', 'DaylightEndTime' => 'PT3H0M0S' ), 
		array( 'id' => 'Newfoundland Standard Time', 'StandardName' => 'Standard', 'StandardBias' => 'PT3H30M0S', 'StandardOffset' => '-03:30', 'DaylightStartMonth' => '3', 'DaylightStartDay' => 'Sunday', 'DaylightStartWeeK' => '2', 'DaylightStartTime' => 'PT2H0M0S', 'DaylightName' => 'Daylight', 'DaylightBias' => 'PT2H30M0S', 'DaylightOffset' => '-02:30', 'DaylightEndMonth' => '11', 'DaylightEndDay' => 'Sunday', 'DaylightEndWeek' => '1', 'DaylightEndTime' => 'PT2H0M0S' ), 
		// Norfolk Standard Time
		// North Asia Standard Time
		// North Asia East Standard Time
		array( 'id' => 'North Korea Standard Time', 'StandardName' => 'Standard', 'StandardBias' => '-PT8H30M0S', 'StandardOffset' => '+08:30', 'DaylightStartMonth' => '', 'DaylightStartDay' => '', 'DaylightStartWeeK' => '', 'DaylightStartTime' => '', 'DaylightName' => '', 'DaylightBias' => '', 'DaylightOffset' => '', 'DaylightEndMonth' => '', 'DaylightEndDay' => '', 'DaylightEndWeek' => '', 'DaylightEndTime' => '' ), 
		// Omsk Standard Time
		array( 'id' => 'Pacific SA Standard Time', 'StandardName' => 'Standard', 'StandardBias' => 'PT4H0M0S', 'StandardOffset' => '-04:00', 'DaylightStartMonth' => '8', 'DaylightStartDay' => 'Saturday', 'DaylightStartWeeK' => '2', 'DaylightStartTime' => 'PT23H59M0S', 'DaylightName' => 'Daylight', 'DaylightBias' => 'PT3H0M0S', 'DaylightOffset' => '-03:00', 'DaylightEndMonth' => '5', 'DaylightEndDay' => 'Saturday', 'DaylightEndWeek' => '2', 'DaylightEndTime' => 'PT23H59M0S' ), 
		array( 'id' => 'Pacific Standard Time', 'StandardName' => 'Standard', 'StandardBias' => 'PT8H0M0S', 'StandardOffset' => '-08:00', 'DaylightStartMonth' => '3', 'DaylightStartDay' => 'Sunday', 'DaylightStartWeeK' => '2', 'DaylightStartTime' => 'PT2H0M0S', 'DaylightName' => 'Daylight', 'DaylightBias' => 'PT7H0M0S', 'DaylightOffset' => '-07:00', 'DaylightEndMonth' => '11', 'DaylightEndDay' => 'Sunday', 'DaylightEndWeek' => '1', 'DaylightEndTime' => 'PT2H0M0S' ), 
		array( 'id' => 'Pacific Standard Time (Mexico)', 'StandardName' => 'Standard', 'StandardBias' => 'PT8H0M0S', 'StandardOffset' => '-08:00', 'DaylightStartMonth' => '4', 'DaylightStartDay' => 'Sunday', 'DaylightStartWeeK' => '1', 'DaylightStartTime' => 'PT2H0M0S', 'DaylightName' => 'Daylight', 'DaylightBias' => 'PT7H0M0S', 'DaylightOffset' => '-07:00', 'DaylightEndMonth' => '10', 'DaylightEndDay' => 'Sunday', 'DaylightEndWeek' => '-1', 'DaylightEndTime' => 'PT2H0M0S' ), 
		array( 'id' => 'Pakistan Standard Time', 'StandardName' => 'Standard', 'StandardBias' => '-PT5H0M0S', 'StandardOffset' => '+05:00', 'DaylightStartMonth' => '', 'DaylightStartDay' => '', 'DaylightStartWeeK' => '', 'DaylightStartTime' => '', 'DaylightName' => '', 'DaylightBias' => '', 'DaylightOffset' => '', 'DaylightEndMonth' => '', 'DaylightEndDay' => '', 'DaylightEndWeek' => '', 'DaylightEndTime' => '' ), 
		array( 'id' => 'Paraguay Standard Time', 'StandardName' => 'Standard', 'StandardBias' => 'PT4H0M0S', 'StandardOffset' => '-04:00', 'DaylightStartMonth' => '10', 'DaylightStartDay' => 'Saturday', 'DaylightStartWeeK' => '1', 'DaylightStartTime' => 'PT23H59M0S', 'DaylightName' => 'Daylight', 'DaylightBias' => 'PT3H0M0S', 'DaylightOffset' => '-03:00', 'DaylightEndMonth' => '3', 'DaylightEndDay' => 'Saturday', 'DaylightEndWeek' => '-1', 'DaylightEndTime' => 'PT23H59M0S' ), 
		// Qyzylorda Standard Time
		array( 'id' => 'Romance Standard Time', 'StandardName' => 'Standard', 'StandardBias' => '-PT1H0M0S', 'StandardOffset' => '+01:00', 'DaylightStartMonth' => '3', 'DaylightStartDay' => 'Sunday', 'DaylightStartWeeK' => '-1', 'DaylightStartTime' => 'PT2H0M0S', 'DaylightName' => 'Daylight', 'DaylightBias' => '-PT2H0M0S', 'DaylightOffset' => '+02:00', 'DaylightEndMonth' => '10', 'DaylightEndDay' => 'Sunday', 'DaylightEndWeek' => '-1', 'DaylightEndTime' => 'PT3H0M0S' ), 
		// Russian Standard Time
		array( 'id' => 'Russia Time Zone 1 Standard Time', 'StandardName' => 'Standard', 'StandardBias' => '-PT2H0M0S', 'StandardOffset' => '+02:00', 'DaylightStartMonth' => '', 'DaylightStartDay' => '', 'DaylightStartWeeK' => '', 'DaylightStartTime' => '', 'DaylightName' => '', 'DaylightBias' => '', 'DaylightOffset' => '', 'DaylightEndMonth' => '', 'DaylightEndDay' => '', 'DaylightEndWeek' => '', 'DaylightEndTime' => '' ), 
		array( 'id' => 'Russia Time Zone 10 Standard Time', 'StandardName' => 'Standard', 'StandardBias' => '-PT11H0M0S', 'StandardOffset' => '+11:00', 'DaylightStartMonth' => '', 'DaylightStartDay' => '', 'DaylightStartWeeK' => '', 'DaylightStartTime' => '', 'DaylightName' => '', 'DaylightBias' => '', 'DaylightOffset' => '', 'DaylightEndMonth' => '', 'DaylightEndDay' => '', 'DaylightEndWeek' => '', 'DaylightEndTime' => '' ), 
		// Russia Time Zone 10
		array( 'id' => 'Russia Time Zone 11 Standard Time', 'StandardName' => 'Standard', 'StandardBias' => '-PT12H0M0S', 'StandardOffset' => '+12:00', 'DaylightStartMonth' => '', 'DaylightStartDay' => '', 'DaylightStartWeeK' => '', 'DaylightStartTime' => '', 'DaylightName' => '', 'DaylightBias' => '', 'DaylightOffset' => '', 'DaylightEndMonth' => '', 'DaylightEndDay' => '', 'DaylightEndWeek' => '', 'DaylightEndTime' => '' ), 
		// Russia Time Zone 11
		array( 'id' => 'Russia Time Zone 2 Standard Time', 'StandardName' => 'Standard', 'StandardBias' => '-PT3H0M0S', 'StandardOffset' => '+03:00', 'DaylightStartMonth' => '', 'DaylightStartDay' => '', 'DaylightStartWeeK' => '', 'DaylightStartTime' => '', 'DaylightName' => '', 'DaylightBias' => '', 'DaylightOffset' => '', 'DaylightEndMonth' => '', 'DaylightEndDay' => '', 'DaylightEndWeek' => '', 'DaylightEndTime' => '' ), 
		// Russia Time Zone 3
		array( 'id' => 'Russia Time Zone 3 Standard Time', 'StandardName' => 'Standard', 'StandardBias' => '-PT4H0M0S', 'StandardOffset' => '+04:00', 'DaylightStartMonth' => '', 'DaylightStartDay' => '', 'DaylightStartWeeK' => '', 'DaylightStartTime' => '', 'DaylightName' => '', 'DaylightBias' => '', 'DaylightOffset' => '', 'DaylightEndMonth' => '', 'DaylightEndDay' => '', 'DaylightEndWeek' => '', 'DaylightEndTime' => '' ), 
		array( 'id' => 'Russia Time Zone 4 Standard Time', 'StandardName' => 'Standard', 'StandardBias' => '-PT5H0M0S', 'StandardOffset' => '+05:00', 'DaylightStartMonth' => '', 'DaylightStartDay' => '', 'DaylightStartWeeK' => '', 'DaylightStartTime' => '', 'DaylightName' => '', 'DaylightBias' => '', 'DaylightOffset' => '', 'DaylightEndMonth' => '', 'DaylightEndDay' => '', 'DaylightEndWeek' => '', 'DaylightEndTime' => '' ), 
		array( 'id' => 'Russia Time Zone 5 Standard Time', 'StandardName' => 'Standard', 'StandardBias' => '-PT6H0M0S', 'StandardOffset' => '+06:00', 'DaylightStartMonth' => '', 'DaylightStartDay' => '', 'DaylightStartWeeK' => '', 'DaylightStartTime' => '', 'DaylightName' => '', 'DaylightBias' => '', 'DaylightOffset' => '', 'DaylightEndMonth' => '', 'DaylightEndDay' => '', 'DaylightEndWeek' => '', 'DaylightEndTime' => '' ), 
		array( 'id' => 'Russia Time Zone 6 Standard Time', 'StandardName' => 'Standard', 'StandardBias' => '-PT7H0M0S', 'StandardOffset' => '+07:00', 'DaylightStartMonth' => '', 'DaylightStartDay' => '', 'DaylightStartWeeK' => '', 'DaylightStartTime' => '', 'DaylightName' => '', 'DaylightBias' => '', 'DaylightOffset' => '', 'DaylightEndMonth' => '', 'DaylightEndDay' => '', 'DaylightEndWeek' => '', 'DaylightEndTime' => '' ), 
		array( 'id' => 'Russia Time Zone 7 Standard Time', 'StandardName' => 'Standard', 'StandardBias' => '-PT8H0M0S', 'StandardOffset' => '+08:00', 'DaylightStartMonth' => '', 'DaylightStartDay' => '', 'DaylightStartWeeK' => '', 'DaylightStartTime' => '', 'DaylightName' => '', 'DaylightBias' => '', 'DaylightOffset' => '', 'DaylightEndMonth' => '', 'DaylightEndDay' => '', 'DaylightEndWeek' => '', 'DaylightEndTime' => '' ), 
		array( 'id' => 'Russia Time Zone 8 Standard Time', 'StandardName' => 'Standard', 'StandardBias' => '-PT9H0M0S', 'StandardOffset' => '+09:00', 'DaylightStartMonth' => '', 'DaylightStartDay' => '', 'DaylightStartWeeK' => '', 'DaylightStartTime' => '', 'DaylightName' => '', 'DaylightBias' => '', 'DaylightOffset' => '', 'DaylightEndMonth' => '', 'DaylightEndDay' => '', 'DaylightEndWeek' => '', 'DaylightEndTime' => '' ), 
		array( 'id' => 'Russia Time Zone 9 Standard Time', 'StandardName' => 'Standard', 'StandardBias' => '-PT10H0M0S', 'StandardOffset' => '+10:00', 'DaylightStartMonth' => '', 'DaylightStartDay' => '', 'DaylightStartWeeK' => '', 'DaylightStartTime' => '', 'DaylightName' => '', 'DaylightBias' => '', 'DaylightOffset' => '', 'DaylightEndMonth' => '', 'DaylightEndDay' => '', 'DaylightEndWeek' => '', 'DaylightEndTime' => '' ), 
		array( 'id' => 'SA Eastern Standard Time', 'StandardName' => 'Standard', 'StandardBias' => 'PT3H0M0S', 'StandardOffset' => '-03:00', 'DaylightStartMonth' => '', 'DaylightStartDay' => '', 'DaylightStartWeeK' => '', 'DaylightStartTime' => '', 'DaylightName' => '', 'DaylightBias' => '', 'DaylightOffset' => '', 'DaylightEndMonth' => '', 'DaylightEndDay' => '', 'DaylightEndWeek' => '', 'DaylightEndTime' => '' ), 
		array( 'id' => 'SA Pacific Standard Time', 'StandardName' => 'Standard', 'StandardBias' => 'PT5H0M0S', 'StandardOffset' => '-05:00', 'DaylightStartMonth' => '', 'DaylightStartDay' => '', 'DaylightStartWeeK' => '', 'DaylightStartTime' => '', 'DaylightName' => '', 'DaylightBias' => '', 'DaylightOffset' => '', 'DaylightEndMonth' => '', 'DaylightEndDay' => '', 'DaylightEndWeek' => '', 'DaylightEndTime' => '' ), 
		array( 'id' => 'SA Western Standard Time', 'StandardName' => 'Standard', 'StandardBias' => 'PT4H0M0S', 'StandardOffset' => '-04:00', 'DaylightStartMonth' => '', 'DaylightStartDay' => '', 'DaylightStartWeeK' => '', 'DaylightStartTime' => '', 'DaylightName' => '', 'DaylightBias' => '', 'DaylightOffset' => '', 'DaylightEndMonth' => '', 'DaylightEndDay' => '', 'DaylightEndWeek' => '', 'DaylightEndTime' => '' ), 
		array( 'id' => 'SE Asia Standard Time', 'StandardName' => 'Standard', 'StandardBias' => '-PT7H0M0S', 'StandardOffset' => '+07:00', 'DaylightStartMonth' => '', 'DaylightStartDay' => '', 'DaylightStartWeeK' => '', 'DaylightStartTime' => '', 'DaylightName' => '', 'DaylightBias' => '', 'DaylightOffset' => '', 'DaylightEndMonth' => '', 'DaylightEndDay' => '', 'DaylightEndWeek' => '', 'DaylightEndTime' => '' ), 
		array( 'id' => 'Sakhalin Standard Time', 'StandardName' => 'Standard', 'StandardBias' => '-PT10H0M0S', 'StandardOffset' => '+10:00', 'DaylightStartMonth' => '3', 'DaylightStartDay' => 'Sunday', 'DaylightStartWeeK' => '-1', 'DaylightStartTime' => 'PT2H0M0S', 'DaylightName' => 'Daylight', 'DaylightBias' => '-PT11H0M0S', 'DaylightOffset' => '+11:00', 'DaylightEndMonth' => '1', 'DaylightEndDay' => 'Friday', 'DaylightEndWeek' => '1', 'DaylightEndTime' => 'PT0S' ), 
		array( 'id' => 'Samoa Standard Time', 'StandardName' => 'Standard', 'StandardBias' => '-PT13H0M0S', 'StandardOffset' => '+13:00', 'DaylightStartMonth' => '9', 'DaylightStartDay' => 'Sunday', 'DaylightStartWeeK' => '-1', 'DaylightStartTime' => 'PT0S', 'DaylightName' => 'Daylight', 'DaylightBias' => '-PT14H0M0S', 'DaylightOffset' => '+14:00', 'DaylightEndMonth' => '4', 'DaylightEndDay' => 'Sunday', 'DaylightEndWeek' => '1', 'DaylightEndTime' => 'PT1H0M0S' ), 
		// Saint Pierre Standard Time
		// Sao Tome Standard Time
		// Saratov Standard Time
		// Singapore Standard Time
		array( 'id' => 'South Africa Standard Time', 'StandardName' => 'Standard', 'StandardBias' => '-PT2H0M0S', 'StandardOffset' => '+02:00', 'DaylightStartMonth' => '', 'DaylightStartDay' => '', 'DaylightStartWeeK' => '', 'DaylightStartTime' => '', 'DaylightName' => '', 'DaylightBias' => '', 'DaylightOffset' => '', 'DaylightEndMonth' => '', 'DaylightEndDay' => '', 'DaylightEndWeek' => '', 'DaylightEndTime' => '' ), 
		// South Sudan Standard Time
		array( 'id' => 'Sri Lanka Standard Time', 'StandardName' => 'Standard', 'StandardBias' => '-PT5H30M0S', 'StandardOffset' => '+05:30', 'DaylightStartMonth' => '', 'DaylightStartDay' => '', 'DaylightStartWeeK' => '', 'DaylightStartTime' => '', 'DaylightName' => '', 'DaylightBias' => '', 'DaylightOffset' => '', 'DaylightEndMonth' => '', 'DaylightEndDay' => '', 'DaylightEndWeek' => '', 'DaylightEndTime' => '' ), 
		// Sudan Standard Time
		array( 'id' => 'Syria Standard Time', 'StandardName' => 'Standard', 'StandardBias' => '-PT2H0M0S', 'StandardOffset' => '+02:00', 'DaylightStartMonth' => '3', 'DaylightStartDay' => 'Thursday', 'DaylightStartWeeK' => '-1', 'DaylightStartTime' => 'PT23H59M0S', 'DaylightName' => 'Daylight', 'DaylightBias' => '-PT3H0M0S', 'DaylightOffset' => '+03:00', 'DaylightEndMonth' => '10', 'DaylightEndDay' => 'Thursday', 'DaylightEndWeek' => '-1', 'DaylightEndTime' => 'PT23H59M0S' ), 
		array( 'id' => 'Taipei Standard Time', 'StandardName' => 'Standard', 'StandardBias' => '-PT8H0M0S', 'StandardOffset' => '+08:00', 'DaylightStartMonth' => '', 'DaylightStartDay' => '', 'DaylightStartWeeK' => '', 'DaylightStartTime' => '', 'DaylightName' => '', 'DaylightBias' => '', 'DaylightOffset' => '', 'DaylightEndMonth' => '', 'DaylightEndDay' => '', 'DaylightEndWeek' => '', 'DaylightEndTime' => '' ), 
		array( 'id' => 'Tasmania Standard Time', 'StandardName' => 'Standard', 'StandardBias' => '-PT10H0M0S', 'StandardOffset' => '+10:00', 'DaylightStartMonth' => '10', 'DaylightStartDay' => 'Sunday', 'DaylightStartWeeK' => '1', 'DaylightStartTime' => 'PT2H0M0S', 'DaylightName' => 'Daylight', 'DaylightBias' => '-PT11H0M0S', 'DaylightOffset' => '+11:00', 'DaylightEndMonth' => '4', 'DaylightEndDay' => 'Sunday', 'DaylightEndWeek' => '1', 'DaylightEndTime' => 'PT3H0M0S' ), 
		// Tocantins Standard Time
		array( 'id' => 'Tokyo Standard Time', 'StandardName' => 'Standard', 'StandardBias' => '-PT9H0M0S', 'StandardOffset' => '+09:00', 'DaylightStartMonth' => '', 'DaylightStartDay' => '', 'DaylightStartWeeK' => '', 'DaylightStartTime' => '', 'DaylightName' => '', 'DaylightBias' => '', 'DaylightOffset' => '', 'DaylightEndMonth' => '', 'DaylightEndDay' => '', 'DaylightEndWeek' => '', 'DaylightEndTime' => '' ), 
		// Tomsk Standard Time
		array( 'id' => 'Tonga Standard Time', 'StandardName' => 'Standard', 'StandardBias' => '-PT13H0M0S', 'StandardOffset' => '+13:00', 'DaylightStartMonth' => '', 'DaylightStartDay' => '', 'DaylightStartWeeK' => '', 'DaylightStartTime' => '', 'DaylightName' => '', 'DaylightBias' => '', 'DaylightOffset' => '', 'DaylightEndMonth' => '', 'DaylightEndDay' => '', 'DaylightEndWeek' => '', 'DaylightEndTime' => '' ), 
		array( 'id' => 'Transbaikal Standard Time', 'StandardName' => 'Standard', 'StandardBias' => '-PT8H0M0S', 'StandardOffset' => '+08:00', 'DaylightStartMonth' => '3', 'DaylightStartDay' => 'Sunday', 'DaylightStartWeeK' => '-1', 'DaylightStartTime' => 'PT2H0M0S', 'DaylightName' => 'Daylight', 'DaylightBias' => '-PT9H0M0S', 'DaylightOffset' => '+09:00', 'DaylightEndMonth' => '1', 'DaylightEndDay' => 'Friday', 'DaylightEndWeek' => '1', 'DaylightEndTime' => 'PT0S' ), 
		array( 'id' => 'Turkey Standard Time', 'StandardName' => 'Standard', 'StandardBias' => '-PT2H0M0S', 'StandardOffset' => '+02:00', 'DaylightStartMonth' => '3', 'DaylightStartDay' => 'Sunday', 'DaylightStartWeeK' => '-1', 'DaylightStartTime' => 'PT3H0M0S', 'DaylightName' => 'Daylight', 'DaylightBias' => '-PT3H0M0S', 'DaylightOffset' => '+03:00', 'DaylightEndMonth' => '10', 'DaylightEndDay' => 'Sunday', 'DaylightEndWeek' => '-1', 'DaylightEndTime' => 'PT4H0M0S' ), 
		// Turks And Caicos Standard Time
		array( 'id' => 'US Eastern Standard Time', 'StandardName' => 'Standard', 'StandardBias' => 'PT5H0M0S', 'StandardOffset' => '-05:00', 'DaylightStartMonth' => '3', 'DaylightStartDay' => 'Sunday', 'DaylightStartWeeK' => '2', 'DaylightStartTime' => 'PT2H0M0S', 'DaylightName' => 'Daylight', 'DaylightBias' => 'PT4H0M0S', 'DaylightOffset' => '-04:00', 'DaylightEndMonth' => '11', 'DaylightEndDay' => 'Sunday', 'DaylightEndWeek' => '1', 'DaylightEndTime' => 'PT2H0M0S' ), 
		array( 'id' => 'US Mountain Standard Time', 'StandardName' => 'Standard', 'StandardBias' => 'PT7H0M0S', 'StandardOffset' => '-07:00', 'DaylightStartMonth' => '', 'DaylightStartDay' => '', 'DaylightStartWeeK' => '', 'DaylightStartTime' => '', 'DaylightName' => '', 'DaylightBias' => '', 'DaylightOffset' => '', 'DaylightEndMonth' => '', 'DaylightEndDay' => '', 'DaylightEndWeek' => '', 'DaylightEndTime' => '' ), 
		array( 'id' => 'UTC', 'StandardName' => 'Standard', 'StandardBias' => 'PT0S', 'StandardOffset' => '+00:00', 'DaylightStartMonth' => '', 'DaylightStartDay' => '', 'DaylightStartWeeK' => '', 'DaylightStartTime' => '', 'DaylightName' => '', 'DaylightBias' => '', 'DaylightOffset' => '', 'DaylightEndMonth' => '', 'DaylightEndDay' => '', 'DaylightEndWeek' => '', 'DaylightEndTime' => '' ),
		// UTC+13
		array( 'id' => 'UTC+12', 'StandardName' => 'Standard', 'StandardBias' => '-PT12H0M0S', 'StandardOffset' => '+12:00', 'DaylightStartMonth' => '', 'DaylightStartDay' => '', 'DaylightStartWeeK' => '', 'DaylightStartTime' => '', 'DaylightName' => '', 'DaylightBias' => '', 'DaylightOffset' => '', 'DaylightEndMonth' => '', 'DaylightEndDay' => '', 'DaylightEndWeek' => '', 'DaylightEndTime' => '' ), 
		array( 'id' => 'UTC-02', 'StandardName' => 'Standard', 'StandardBias' => 'PT2H0M0S', 'StandardOffset' => '-02:00', 'DaylightStartMonth' => '', 'DaylightStartDay' => '', 'DaylightStartWeeK' => '', 'DaylightStartTime' => '', 'DaylightName' => '', 'DaylightBias' => '', 'DaylightOffset' => '', 'DaylightEndMonth' => '', 'DaylightEndDay' => '', 'DaylightEndWeek' => '', 'DaylightEndTime' => '' ), 
		//UTC-09
		array( 'id' => 'UTC-11', 'StandardName' => 'Standard', 'StandardBias' => 'PT11H0M0S', 'StandardOffset' => '-11:00', 'DaylightStartMonth' => '', 'DaylightStartDay' => '', 'DaylightStartWeeK' => '', 'DaylightStartTime' => '', 'DaylightName' => '', 'DaylightBias' => '', 'DaylightOffset' => '', 'DaylightEndMonth' => '', 'DaylightEndDay' => '', 'DaylightEndWeek' => '', 'DaylightEndTime' => '' ), 
		array( 'id' => 'Ulaanbaatar Standard Time', 'StandardName' => 'Standard', 'StandardBias' => '-PT8H0M0S', 'StandardOffset' => '+08:00', 'DaylightStartMonth' => '3', 'DaylightStartDay' => 'Saturday', 'DaylightStartWeeK' => '-1', 'DaylightStartTime' => 'PT2H0M0S', 'DaylightName' => 'Daylight', 'DaylightBias' => '-PT9H0M0S', 'DaylightOffset' => '+09:00', 'DaylightEndMonth' => '9', 'DaylightEndDay' => 'Friday', 'DaylightEndWeek' => '-1', 'DaylightEndTime' => 'PT23H59M0S' ), 
		array( 'id' => 'Venezuela Standard Time', 'StandardName' => 'Standard', 'StandardBias' => 'PT4H30M0S', 'StandardOffset' => '-04:30', 'DaylightStartMonth' => '', 'DaylightStartDay' => '', 'DaylightStartWeeK' => '', 'DaylightStartTime' => '', 'DaylightName' => '', 'DaylightBias' => '', 'DaylightOffset' => '', 'DaylightEndMonth' => '', 'DaylightEndDay' => '', 'DaylightEndWeek' => '', 'DaylightEndTime' => '' ), 
		// Vladivostok Standard Time
		// Volgograd Standard Time
		array( 'id' => 'W. Australia Standard Time', 'StandardName' => 'Standard', 'StandardBias' => '-PT8H0M0S', 'StandardOffset' => '+08:00', 'DaylightStartMonth' => '', 'DaylightStartDay' => '', 'DaylightStartWeeK' => '', 'DaylightStartTime' => '', 'DaylightName' => '', 'DaylightBias' => '', 'DaylightOffset' => '', 'DaylightEndMonth' => '', 'DaylightEndDay' => '', 'DaylightEndWeek' => '', 'DaylightEndTime' => '' ), 
		array( 'id' => 'W. Central Africa Standard Time', 'StandardName' => 'Standard', 'StandardBias' => '-PT1H0M0S', 'StandardOffset' => '+01:00', 'DaylightStartMonth' => '', 'DaylightStartDay' => '', 'DaylightStartWeeK' => '', 'DaylightStartTime' => '', 'DaylightName' => '', 'DaylightBias' => '', 'DaylightOffset' => '', 'DaylightEndMonth' => '', 'DaylightEndDay' => '', 'DaylightEndWeek' => '', 'DaylightEndTime' => '' ), 
		array( 'id' => 'W. Europe Standard Time', 'StandardName' => 'Standard', 'StandardBias' => '-PT1H0M0S', 'StandardOffset' => '+01:00', 'DaylightStartMonth' => '3', 'DaylightStartDay' => 'Sunday', 'DaylightStartWeeK' => '-1', 'DaylightStartTime' => 'PT2H0M0S', 'DaylightName' => 'Daylight', 'DaylightBias' => '-PT2H0M0S', 'DaylightOffset' => '+02:00', 'DaylightEndMonth' => '10', 'DaylightEndDay' => 'Sunday', 'DaylightEndWeek' => '-1', 'DaylightEndTime' => 'PT3H0M0S' ), 
		// W. Mongolia Standard Time
		array( 'id' => 'West Asia Standard Time', 'StandardName' => 'Standard', 'StandardBias' => '-PT5H0M0S', 'StandardOffset' => '+05:00', 'DaylightStartMonth' => '', 'DaylightStartDay' => '', 'DaylightStartWeeK' => '', 'DaylightStartTime' => '', 'DaylightName' => '', 'DaylightBias' => '', 'DaylightOffset' => '', 'DaylightEndMonth' => '', 'DaylightEndDay' => '', 'DaylightEndWeek' => '', 'DaylightEndTime' => '' ), 
		// West Bank Standard Time
		array( 'id' => 'West Pacific Standard Time', 'StandardName' => 'Standard', 'StandardBias' => '-PT10H0M0S', 'StandardOffset' => '+10:00', 'DaylightStartMonth' => '', 'DaylightStartDay' => '', 'DaylightStartWeeK' => '', 'DaylightStartTime' => '', 'DaylightName' => '', 'DaylightBias' => '', 'DaylightOffset' => '', 'DaylightEndMonth' => '', 'DaylightEndDay' => '', 'DaylightEndWeek' => '', 'DaylightEndTime' => '' ), 
		// Yakutsk Standard Time
		// Yukon Standard Time
	];

	/**
     * conversion table of IANA time zones to EWS (Microsoft/Windows) time zones
     * @var array $ewstoiana
     */
	private static $ianatoews = [
		'Africa/Abidjan' => 'Greenwich Standard Time',
		'Africa/Accra' => 'Greenwich Standard Time',
		'Africa/Addis_Ababa' => 'E. Africa Standard Time',
		'Africa/Algiers' => 'W. Central Africa Standard Time',
		'Africa/Asmera' => 'E. Africa Standard Time',
		'Africa/Bamako' => 'Greenwich Standard Time',
		'Africa/Bangui' => 'W. Central Africa Standard Time',
		'Africa/Banjul' => 'Greenwich Standard Time',
		'Africa/Bissau' => 'Greenwich Standard Time',
		'Africa/Blantyre' => 'South Africa Standard Time',
		'Africa/Brazzaville' => 'W. Central Africa Standard Time',
		'Africa/Bujumbura' => 'South Africa Standard Time',
		'Africa/Cairo' => 'Egypt Standard Time',
		'Africa/Casablanca' => 'Morocco Standard Time',
		'Africa/Ceuta' => 'Romance Standard Time',
		'Africa/Conakry' => 'Greenwich Standard Time',
		'Africa/Dakar' => 'Greenwich Standard Time',
		'Africa/Dar_es_Salaam' => 'E. Africa Standard Time',
		'Africa/Djibouti' => 'E. Africa Standard Time',
		'Africa/Douala' => 'W. Central Africa Standard Time',
		'Africa/El_Aaiun' => 'Morocco Standard Time',
		'Africa/Freetown' => 'Greenwich Standard Time',
		'Africa/Gaborone' => 'South Africa Standard Time',
		'Africa/Harare' => 'South Africa Standard Time',
		'Africa/Johannesburg' => 'South Africa Standard Time',
		'Africa/Juba' => 'South Sudan Standard Time',
		'Africa/Kampala' => 'E. Africa Standard Time',
		'Africa/Khartoum' => 'Sudan Standard Time',
		'Africa/Kigali' => 'South Africa Standard Time',
		'Africa/Kinshasa' => 'W. Central Africa Standard Time',
		'Africa/Lagos' => 'W. Central Africa Standard Time',
		'Africa/Libreville' => 'W. Central Africa Standard Time',
		'Africa/Lome' => 'Greenwich Standard Time',
		'Africa/Luanda' => 'W. Central Africa Standard Time',
		'Africa/Lubumbashi' => 'South Africa Standard Time',
		'Africa/Lusaka' => 'South Africa Standard Time',
		'Africa/Malabo' => 'W. Central Africa Standard Time',
		'Africa/Maputo' => 'South Africa Standard Time',
		'Africa/Maseru' => 'South Africa Standard Time',
		'Africa/Mbabane' => 'South Africa Standard Time',
		'Africa/Mogadishu' => 'E. Africa Standard Time',
		'Africa/Monrovia' => 'Greenwich Standard Time',
		'Africa/Nairobi' => 'E. Africa Standard Time',
		'Africa/Ndjamena' => 'W. Central Africa Standard Time',
		'Africa/Niamey' => 'W. Central Africa Standard Time',
		'Africa/Nouakchott' => 'Greenwich Standard Time',
		'Africa/Ouagadougou' => 'Greenwich Standard Time',
		'Africa/Porto-Novo' => 'W. Central Africa Standard Time',
		'Africa/Sao_Tome' => 'Sao Tome Standard Time',
		'Africa/Tripoli' => 'Libya Standard Time',
		'Africa/Tunis' => 'W. Central Africa Standard Time',
		'Africa/Windhoek' => 'Namibia Standard Time',
		'America/Adak' => 'Aleutian Standard Time',
		'America/Anchorage' => 'Alaskan Standard Time',
		'America/Anguilla' => 'SA Western Standard Time',
		'America/Antigua' => 'SA Western Standard Time',
		'America/Araguaina' => 'Tocantins Standard Time',
		'America/Argentina/La_Rioja' => 'Argentina Standard Time',
		'America/Argentina/Rio_Gallegos' => 'Argentina Standard Time',
		'America/Argentina/Salta' => 'Argentina Standard Time',
		'America/Argentina/San_Juan' => 'Argentina Standard Time',
		'America/Argentina/San_Luis' => 'Argentina Standard Time',
		'America/Argentina/Tucuman' => 'Argentina Standard Time',
		'America/Argentina/Ushuaia' => 'Argentina Standard Time',
		'America/Aruba' => 'SA Western Standard Time',
		'America/Asuncion' => 'Paraguay Standard Time',
		'America/Bahia' => 'Bahia Standard Time',
		'America/Bahia_Banderas' => 'Central Standard Time (Mexico)',
		'America/Barbados' => 'SA Western Standard Time',
		'America/Belem' => 'SA Eastern Standard Time',
		'America/Belize' => 'Central America Standard Time',
		'America/Blanc-Sablon' => 'SA Western Standard Time',
		'America/Boa_Vista' => 'SA Western Standard Time',
		'America/Bogota' => 'SA Pacific Standard Time',
		'America/Boise' => 'Mountain Standard Time',
		'America/Buenos_Aires' => 'Argentina Standard Time',
		'America/Cambridge_Bay' => 'Mountain Standard Time',
		'America/Campo_Grande' => 'Central Brazilian Standard Time',
		'America/Cancun' => 'Eastern Standard Time (Mexico)',
		'America/Caracas' => 'Venezuela Standard Time',
		'America/Catamarca' => 'Argentina Standard Time',
		'America/Cayenne' => 'SA Eastern Standard Time',
		'America/Cayman' => 'SA Pacific Standard Time',
		'America/Chicago' => 'Central Standard Time',
		'America/Chihuahua' => 'Mountain Standard Time (Mexico)',
		'America/Coral_Harbour' => 'SA Pacific Standard Time',
		'America/Cordoba' => 'Argentina Standard Time',
		'America/Costa_Rica' => 'Central America Standard Time',
		'America/Creston' => 'US Mountain Standard Time',
		'America/Cuiaba' => 'Central Brazilian Standard Time',
		'America/Curacao' => 'SA Western Standard Time',
		'America/Danmarkshavn' => 'GMT Standard Time',
		'America/Dawson' => 'Pacific Standard Time',
		'America/Dawson_Creek' => 'US Mountain Standard Time',
		'America/Denver' => 'Mountain Standard Time',
		'America/Detroit' => 'Eastern Standard Time',
		'America/Dominica' => 'SA Western Standard Time',
		'America/Edmonton' => 'Mountain Standard Time',
		'America/Eirunepe' => 'SA Pacific Standard Time',
		'America/El_Salvador' => 'Central America Standard Time',
		'America/Fort_Nelson' => 'US Mountain Standard Time',
		'America/Fortaleza' => 'SA Eastern Standard Time',
		'America/Glace_Bay' => 'Atlantic Standard Time',
		'America/Godthab' => 'Greenland Standard Time',
		'America/Goose_Bay' => 'Atlantic Standard Time',
		'America/Grand_Turk' => 'Turks And Caicos Standard Time',
		'America/Grenada' => 'SA Western Standard Time',
		'America/Guadeloupe' => 'SA Western Standard Time',
		'America/Guatemala' => 'Central America Standard Time',
		'America/Guayaquil' => 'SA Pacific Standard Time',
		'America/Guyana' => 'SA Western Standard Time',
		'America/Halifax' => 'Atlantic Standard Time',
		'America/Havana' => 'Cuba Standard Time',
		'America/Hermosillo' => 'US Mountain Standard Time',
		'America/Indiana/Knox' => 'Central Standard Time',
		'America/Indiana/Marengo' => 'US Eastern Standard Time',
		'America/Indiana/Petersburg' => 'Eastern Standard Time',
		'America/Indiana/Tell_City' => 'Central Standard Time',
		'America/Indiana/Vevay' => 'US Eastern Standard Time',
		'America/Indiana/Vincennes' => 'Eastern Standard Time',
		'America/Indiana/Winamac' => 'Eastern Standard Time',
		'America/Indianapolis' => 'US Eastern Standard Time',
		'America/Inuvik' => 'Mountain Standard Time',
		'America/Iqaluit' => 'Eastern Standard Time',
		'America/Jamaica' => 'SA Pacific Standard Time',
		'America/Jujuy' => 'Argentina Standard Time',
		'America/Juneau' => 'Alaskan Standard Time',
		'America/Kentucky/Monticello' => 'Eastern Standard Time',
		'America/Kralendijk' => 'SA Western Standard Time',
		'America/La_Paz' => 'SA Western Standard Time',
		'America/Lima' => 'SA Pacific Standard Time',
		'America/Los_Angeles' => 'Pacific Standard Time',
		'America/Louisville' => 'Eastern Standard Time',
		'America/Lower_Princes' => 'SA Western Standard Time',
		'America/Maceio' => 'SA Eastern Standard Time',
		'America/Managua' => 'Central America Standard Time',
		'America/Manaus' => 'SA Western Standard Time',
		'America/Marigot' => 'SA Western Standard Time',
		'America/Martinique' => 'SA Western Standard Time',
		'America/Matamoros' => 'Central Standard Time',
		'America/Mazatlan' => 'Mountain Standard Time (Mexico)',
		'America/Mendoza' => 'Argentina Standard Time',
		'America/Menominee' => 'Central Standard Time',
		'America/Merida' => 'Central Standard Time (Mexico)',
		'America/Metlakatla' => 'Alaskan Standard Time',
		'America/Mexico_City' => 'Central Standard Time (Mexico)',
		'America/Miquelon' => 'Saint Pierre Standard Time',
		'America/Moncton' => 'Atlantic Standard Time',
		'America/Monterrey' => 'Central Standard Time (Mexico)',
		'America/Montevideo' => 'Montevideo Standard Time',
		'America/Montreal' => 'Eastern Standard Time',
		'America/Montserrat' => 'SA Western Standard Time',
		'America/Nassau' => 'Eastern Standard Time',
		'America/New_York' => 'Eastern Standard Time',
		'America/Nipigon' => 'Eastern Standard Time',
		'America/Nome' => 'Alaskan Standard Time',
		'America/Noronha' => 'Mid-Atlantic Standard Time',
		'America/North_Dakota/Beulah' => 'Central Standard Time',
		'America/North_Dakota/Center' => 'Central Standard Time',
		'America/North_Dakota/New_Salem' => 'Central Standard Time',
		'America/Ojinaga' => 'Mountain Standard Time',
		'America/Panama' => 'SA Pacific Standard Time',
		'America/Pangnirtung' => 'Eastern Standard Time',
		'America/Paramaribo' => 'SA Eastern Standard Time',
		'America/Phoenix' => 'US Mountain Standard Time',
		'America/Port_of_Spain' => 'SA Western Standard Time',
		'America/Port-au-Prince' => 'Haiti Standard Time',
		'America/Porto_Velho' => 'SA Western Standard Time',
		'America/Puerto_Rico' => 'SA Western Standard Time',
		'America/Punta_Arenas' => 'Magallanes Standard Time',
		'America/Rainy_River' => 'Central Standard Time',
		'America/Rankin_Inlet' => 'Central Standard Time',
		'America/Recife' => 'SA Eastern Standard Time',
		'America/Regina' => 'Canada Central Standard Time',
		'America/Resolute' => 'Central Standard Time',
		'America/Rio_Branco' => 'SA Pacific Standard Time',
		'America/Santa_Isabel' => 'Pacific Standard Time (Mexico)',
		'America/Santarem' => 'SA Eastern Standard Time',
		'America/Santiago' => 'Pacific SA Standard Time',
		'America/Santo_Domingo' => 'SA Western Standard Time',
		'America/Sao_Paulo' => 'E. South America Standard Time',
		'America/Scoresbysund' => 'Azores Standard Time',
		'America/Sitka' => 'Alaskan Standard Time',
		'America/St_Barthelemy' => 'SA Western Standard Time',
		'America/St_Johns' => 'Newfoundland Standard Time',
		'America/St_Kitts' => 'SA Western Standard Time',
		'America/St_Lucia' => 'SA Western Standard Time',
		'America/St_Thomas' => 'SA Western Standard Time',
		'America/St_Vincent' => 'SA Western Standard Time',
		'America/Swift_Current' => 'Canada Central Standard Time',
		'America/Tegucigalpa' => 'Central America Standard Time',
		'America/Thule' => 'Atlantic Standard Time',
		'America/Thunder_Bay' => 'Eastern Standard Time',
		'America/Tijuana' => 'Pacific Standard Time (Mexico)',
		'America/Toronto' => 'Eastern Standard Time',
		'America/Tortola' => 'SA Western Standard Time',
		'America/Vancouver' => 'Pacific Standard Time',
		'America/Whitehorse' => 'Pacific Standard Time',
		'America/Winnipeg' => 'Central Standard Time',
		'America/Yakutat' => 'Alaskan Standard Time',
		'America/Yellowknife' => 'Mountain Standard Time',
		'Antarctica/Casey' => 'Singapore Standard Time',
		'Antarctica/Davis' => 'SE Asia Standard Time',
		'Antarctica/DumontDUrville' => 'West Pacific Standard Time',
		'Antarctica/Macquarie' => 'Central Pacific Standard Time',
		'Antarctica/Mawson' => 'West Asia Standard Time',
		'Antarctica/McMurdo' => 'New Zealand Standard Time',
		'Antarctica/Palmer' => 'SA Eastern Standard Time',
		'Antarctica/Rothera' => 'SA Eastern Standard Time',
		'Antarctica/Syowa' => 'E. Africa Standard Time',
		'Antarctica/Vostok' => 'Central Asia Standard Time',
		'Arctic/Longyearbyen' => 'W. Europe Standard Time',
		'Asia/Aden' => 'Arab Standard Time',
		'Asia/Almaty' => 'Central Asia Standard Time',
		'Asia/Amman' => 'Jordan Standard Time',
		'Asia/Anadyr' => 'Kamchatka Standard Time',
		'Asia/Aqtau' => 'West Asia Standard Time',
		'Asia/Aqtobe' => 'West Asia Standard Time',
		'Asia/Ashgabat' => 'West Asia Standard Time',
		'Asia/Atyrau' => 'West Asia Standard Time',
		'Asia/Baghdad' => 'Arabic Standard Time',
		'Asia/Bahrain' => 'Arab Standard Time',
		'Asia/Baku' => 'Azerbaijan Standard Time',
		'Asia/Bangkok' => 'SE Asia Standard Time',
		'Asia/Barnaul' => 'Altai Standard Time',
		'Asia/Beirut' => 'Middle East Standard Time',
		'Asia/Bishkek' => 'Central Asia Standard Time',
		'Asia/Brunei' => 'Singapore Standard Time',
		'Asia/Calcutta' => 'India Standard Time',
		'Asia/Chita' => 'Transbaikal Standard Time',
		'Asia/Choibalsan' => 'Ulaanbaatar Standard Time',
		'Asia/Colombo' => 'Sri Lanka Standard Time',
		'Asia/Damascus' => 'Syria Standard Time',
		'Asia/Dhaka' => 'Bangladesh Standard Time',
		'Asia/Dili' => 'Tokyo Standard Time',
		'Asia/Dubai' => 'Arabian Standard Time',
		'Asia/Dushanbe' => 'West Asia Standard Time',
		'Asia/Famagusta' => 'GTB Standard Time',
		'Asia/Gaza' => 'West Bank Standard Time',
		'Asia/Hebron' => 'West Bank Standard Time',
		'Asia/Hong_Kong' => 'China Standard Time',
		'Asia/Hovd' => 'W. Mongolia Standard Time',
		'Asia/Irkutsk' => 'North Asia East Standard Time',
		'Asia/Jakarta' => 'SE Asia Standard Time',
		'Asia/Jayapura' => 'Tokyo Standard Time',
		'Asia/Jerusalem' => 'Israel Standard Time',
		'Asia/Kabul' => 'Afghanistan Standard Time',
		'Asia/Kamchatka' => 'Kamchatka Standard Time',
		'Asia/Karachi' => 'Pakistan Standard Time',
		'Asia/Katmandu' => 'Nepal Standard Time',
		'Asia/Khandyga' => 'Yakutsk Standard Time',
		'Asia/Krasnoyarsk' => 'North Asia Standard Time',
		'Asia/Kuala_Lumpur' => 'Malaysia Standard Time',
		'Asia/Kuching' => 'Malaysia Standard Time',
		'Asia/Kuwait' => 'Arab Standard Time',
		'Asia/Macau' => 'China Standard Time',
		'Asia/Magadan' => 'Magadan Standard Time',
		'Asia/Makassar' => 'Singapore Standard Time',
		'Asia/Manila' => 'Singapore Standard Time',
		'Asia/Muscat' => 'Arabian Standard Time',
		'Asia/Nicosia' => 'GTB Standard Time',
		'Asia/Novokuznetsk' => 'North Asia Standard Time',
		'Asia/Novosibirsk' => 'N. Central Asia Standard Time',
		'Asia/Omsk' => 'Omsk Standard Time',
		'Asia/Oral' => 'West Asia Standard Time',
		'Asia/Phnom_Penh' => 'SE Asia Standard Time',
		'Asia/Pontianak' => 'SE Asia Standard Time',
		'Asia/Pyongyang' => 'North Korea Standard Time',
		'Asia/Qatar' => 'Arab Standard Time',
		'Asia/Qostanay' => 'Central Asia Standard Time',
		'Asia/Qyzylorda' => 'Qyzylorda Standard Time',
		'Asia/Rangoon' => 'Myanmar Standard Time',
		'Asia/Riyadh' => 'Arab Standard Time',
		'Asia/Saigon' => 'SE Asia Standard Time',
		'Asia/Sakhalin' => 'Sakhalin Standard Time',
		'Asia/Samarkand' => 'West Asia Standard Time',
		'Asia/Seoul' => 'Korea Standard Time',
		'Asia/Shanghai' => 'China Standard Time',
		'Asia/Singapore' => 'Singapore Standard Time',
		'Asia/Srednekolymsk' => 'Russia Time Zone 10',
		'Asia/Taipei' => 'Taipei Standard Time',
		'Asia/Tashkent' => 'West Asia Standard Time',
		'Asia/Tbilisi' => 'Georgian Standard Time',
		'Asia/Tehran' => 'Iran Standard Time',
		'Asia/Thimphu' => 'Bangladesh Standard Time',
		'Asia/Tokyo' => 'Tokyo Standard Time',
		'Asia/Tomsk' => 'Tomsk Standard Time',
		'Asia/Ulaanbaatar' => 'Ulaanbaatar Standard Time',
		'Asia/Urumqi' => 'Central Asia Standard Time',
		'Asia/Ust-Nera' => 'Vladivostok Standard Time',
		'Asia/Vientiane' => 'SE Asia Standard Time',
		'Asia/Vladivostok' => 'Vladivostok Standard Time',
		'Asia/Yakutsk' => 'Yakutsk Standard Time',
		'Asia/Yekaterinburg' => 'Ekaterinburg Standard Time',
		'Asia/Yerevan' => 'Caucasus Standard Time',
		'Atlantic/Azores' => 'Azores Standard Time',
		'Atlantic/Bermuda' => 'Atlantic Standard Time',
		'Atlantic/Canary' => 'GMT Standard Time',
		'Atlantic/Cape_Verde' => 'Cape Verde Standard Time',
		'Atlantic/Faeroe' => 'GMT Standard Time',
		'Atlantic/Madeira' => 'GMT Standard Time',
		'Atlantic/Reykjavik' => 'Greenwich Standard Time',
		'Atlantic/South_Georgia' => 'Mid-Atlantic Standard Time',
		'Atlantic/St_Helena' => 'Greenwich Standard Time',
		'Atlantic/Stanley' => 'SA Eastern Standard Time',
		'Australia/Adelaide' => 'Cen. Australia Standard Time',
		'Australia/Brisbane' => 'E. Australia Standard Time',
		'Australia/Broken_Hill' => 'Cen. Australia Standard Time',
		'Australia/Currie' => 'Tasmania Standard Time',
		'Australia/Darwin' => 'AUS Central Standard Time',
		'Australia/Eucla' => 'Aus Central W. Standard Time',
		'Australia/Hobart' => 'Tasmania Standard Time',
		'Australia/Lindeman' => 'E. Australia Standard Time',
		'Australia/Lord_Howe' => 'Lord Howe Standard Time',
		'Australia/Melbourne' => 'AUS Eastern Standard Time',
		'Australia/Perth' => 'W. Australia Standard Time',
		'Australia/Sydney' => 'AUS Eastern Standard Time',
		'Europe/Amsterdam' => 'W. Europe Standard Time',
		'Europe/Andorra' => 'W. Europe Standard Time',
		'Europe/Astrakhan' => 'Astrakhan Standard Time',
		'Europe/Athens' => 'GTB Standard Time',
		'Europe/Belgrade' => 'Central Europe Standard Time',
		'Europe/Berlin' => 'W. Europe Standard Time',
		'Europe/Bratislava' => 'Central Europe Standard Time',
		'Europe/Brussels' => 'Romance Standard Time',
		'Europe/Bucharest' => 'GTB Standard Time',
		'Europe/Budapest' => 'Central Europe Standard Time',
		'Europe/Busingen' => 'W. Europe Standard Time',
		'Europe/Chisinau' => 'E. Europe Standard Time',
		'Europe/Copenhagen' => 'Romance Standard Time',
		'Europe/Dublin' => 'GMT Standard Time',
		'Europe/Gibraltar' => 'W. Europe Standard Time',
		'Europe/Guernsey' => 'GMT Standard Time',
		'Europe/Helsinki' => 'FLE Standard Time',
		'Europe/Isle_of_Man' => 'GMT Standard Time',
		'Europe/Istanbul' => 'Turkey Standard Time',
		'Europe/Jersey' => 'GMT Standard Time',
		'Europe/Kaliningrad' => 'Kaliningrad Standard Time',
		'Europe/Kiev' => 'FLE Standard Time',
		'Europe/Kirov' => 'Russian Standard Time',
		'Europe/Lisbon' => 'GMT Standard Time',
		'Europe/Ljubljana' => 'Central Europe Standard Time',
		'Europe/London' => 'GMT Standard Time',
		'Europe/Luxembourg' => 'W. Europe Standard Time',
		'Europe/Madrid' => 'Romance Standard Time',
		'Europe/Malta' => 'W. Europe Standard Time',
		'Europe/Mariehamn' => 'FLE Standard Time',
		'Europe/Minsk' => 'Belarus Standard Time',
		'Europe/Monaco' => 'W. Europe Standard Time',
		'Europe/Moscow' => 'Russian Standard Time',
		'Europe/Oslo' => 'W. Europe Standard Time',
		'Europe/Paris' => 'Romance Standard Time',
		'Europe/Podgorica' => 'Central Europe Standard Time',
		'Europe/Prague' => 'Central Europe Standard Time',
		'Europe/Riga' => 'FLE Standard Time',
		'Europe/Rome' => 'W. Europe Standard Time',
		'Europe/Samara' => 'Russia Time Zone 3',
		'Europe/San_Marino' => 'W. Europe Standard Time',
		'Europe/Sarajevo' => 'Central European Standard Time',
		'Europe/Saratov' => 'Saratov Standard Time',
		'Europe/Simferopol' => 'Russian Standard Time',
		'Europe/Skopje' => 'Central European Standard Time',
		'Europe/Sofia' => 'FLE Standard Time',
		'Europe/Stockholm' => 'W. Europe Standard Time',
		'Europe/Tallinn' => 'FLE Standard Time',
		'Europe/Tirane' => 'Central Europe Standard Time',
		'Europe/Ulyanovsk' => 'Astrakhan Standard Time',
		'Europe/Uzhgorod' => 'FLE Standard Time',
		'Europe/Vaduz' => 'W. Europe Standard Time',
		'Europe/Vatican' => 'W. Europe Standard Time',
		'Europe/Vienna' => 'W. Europe Standard Time',
		'Europe/Vilnius' => 'FLE Standard Time',
		'Europe/Volgograd' => 'Volgograd Standard Time',
		'Europe/Warsaw' => 'Central European Standard Time',
		'Europe/Zagreb' => 'Central European Standard Time',
		'Europe/Zaporozhye' => 'FLE Standard Time',
		'Europe/Zurich' => 'W. Europe Standard Time',
		'Indian/Antananarivo' => 'E. Africa Standard Time',
		'Indian/Chagos' => 'Central Asia Standard Time',
		'Indian/Christmas' => 'SE Asia Standard Time',
		'Indian/Cocos' => 'Myanmar Standard Time',
		'Indian/Comoro' => 'E. Africa Standard Time',
		'Indian/Kerguelen' => 'West Asia Standard Time',
		'Indian/Mahe' => 'Mauritius Standard Time',
		'Indian/Maldives' => 'West Asia Standard Time',
		'Indian/Mauritius' => 'Mauritius Standard Time',
		'Indian/Mayotte' => 'E. Africa Standard Time',
		'Indian/Reunion' => 'Mauritius Standard Time',
		'Pacific/Apia' => 'Samoa Standard Time',
		'Pacific/Auckland' => 'New Zealand Standard Time',
		'Pacific/Bougainville' => 'Bougainville Standard Time',
		'Pacific/Chatham' => 'Chatham Islands Standard Time',
		'Pacific/Easter' => 'Easter Island Standard Time',
		'Pacific/Efate' => 'Central Pacific Standard Time',
		'Pacific/Enderbury' => 'UTC+13',
		'Pacific/Fakaofo' => 'UTC+13',
		'Pacific/Fiji' => 'Fiji Standard Time',
		'Pacific/Funafuti' => 'UTC+12',
		'Pacific/Galapagos' => 'Central America Standard Time',
		'Pacific/Gambier' => 'UTC-09',
		'Pacific/Guadalcanal' => 'Central Pacific Standard Time',
		'Pacific/Guam' => 'West Pacific Standard Time',
		'Pacific/Honolulu' => 'Hawaiian Standard Time',
		'Pacific/Johnston' => 'Hawaiian Standard Time',
		'Pacific/Kiritimati' => 'Line Islands Standard Time',
		'Pacific/Kosrae' => 'Central Pacific Standard Time',
		'Pacific/Kwajalein' => 'UTC+12',
		'Pacific/Majuro' => 'UTC+12',
		'Pacific/Marquesas' => 'Marquesas Standard Time',
		'Pacific/Midway' => 'UTC-11',
		'Pacific/Nauru' => 'UTC+12',
		'Pacific/Niue' => 'UTC-11',
		'Pacific/Norfolk' => 'Norfolk Standard Time',
		'Pacific/Noumea' => 'Central Pacific Standard Time',
		'Pacific/Pago_Pago' => 'UTC-11',
		'Pacific/Palau' => 'Tokyo Standard Time',
		'Pacific/Pitcairn' => 'UTC-08',
		'Pacific/Ponape' => 'Central Pacific Standard Time',
		'Pacific/Port_Moresby' => 'West Pacific Standard Time',
		'Pacific/Rarotonga' => 'Hawaiian Standard Time',
		'Pacific/Saipan' => 'West Pacific Standard Time',
		'Pacific/Tahiti' => 'Hawaiian Standard Time',
		'Pacific/Tarawa' => 'UTC+12',
		'Pacific/Tongatapu' => 'Tonga Standard Time',
		'Pacific/Truk' => 'West Pacific Standard Time',
		'Pacific/Wake' => 'UTC+12',
		'Pacific/Wallis' => 'UTC+12',
		'Etc/GMT' => 'GMT Standard Time',
		'Etc/GMT-1' => 'W. Central Africa Standard Time',
		'Etc/GMT-10' => 'West Pacific Standard Time',
		'Etc/GMT-11' => 'Central Pacific Standard Time',
		'Etc/GMT-12' => 'UTC+12',
		'Etc/GMT-13' => 'UTC+13',
		'Etc/GMT-14' => 'Line Islands Standard Time',
		'Etc/GMT-2' => 'South Africa Standard Time',
		'Etc/GMT-3' => 'E. Africa Standard Time',
		'Etc/GMT-4' => 'Arabian Standard Time',
		'Etc/GMT-5' => 'West Asia Standard Time',
		'Etc/GMT-6' => 'Central Asia Standard Time',
		'Etc/GMT-7' => 'SE Asia Standard Time',
		'Etc/GMT-8' => 'Singapore Standard Time',
		'Etc/GMT-9' => 'Tokyo Standard Time',
		'Etc/GMT+1' => 'Cape Verde Standard Time',
		'Etc/GMT+10' => 'Hawaiian Standard Time',
		'Etc/GMT+11' => 'UTC-11',
		'Etc/GMT+12' => 'Dateline Standard Time',
		'Etc/GMT+2' => 'Mid-Atlantic Standard Time',
		'Etc/GMT+3' => 'SA Eastern Standard Time',
		'Etc/GMT+4' => 'SA Western Standard Time',
		'Etc/GMT+5' => 'SA Pacific Standard Time',
		'Etc/GMT+6' => 'Central America Standard Time',
		'Etc/GMT+7' => 'US Mountain Standard Time',
		'Etc/GMT+8' => 'UTC-08',
		'Etc/GMT+9' => 'UTC-09',
		'Etc/UTC' => 'UTC',
		'UTC' => 'UTC',
		'Z' => 'UTC',
	];

	/**
     * conversion table of EWS (Microsoft/Windows) time zones to IANA time zones
     * @var array $ewstoiana
     */
	private static $ewstoiana = [
		'AUS Central Standard Time' => 'Australia/Darwin',
		// Aus Central W. Standard Time
		'AUS Eastern Standard Time' => 'Australia/Sydney',
		'Afghanistan Standard Time' => 'Asia/Kabul',
		'Alaskan Standard Time' => 'America/Anchorage',
		'Aleutian Standard Time' => 'America/Adak',
		'Altai Standard Time' => 'Asia/Barnaul',
		'Arab Standard Time' => 'Asia/Riyadh',
		'Arabian Standard Time' => 'Asia/Dubai',
		'Arabic Standard Time' => 'Asia/Baghdad',
		'Argentina Standard Time' => 'America/Buenos_Aires',
		'Astrakhan Standard Time' => 'Europe/Astrakhan',
		'Atlantic Standard Time' => 'America/Halifax',
		'Aus Central W. Standard Time' => 'Australia/Eucla',
		'Azerbaijan Standard Time' => 'Asia/Baku',
		'Azores Standard Time' => 'Atlantic/Azores',
		'Bahia Standard Time' => 'America/Bahia',
		'Bangladesh Standard Time' => 'Asia/Dhaka',
		'Belarus Standard Time' => 'Europe/Minsk',
		'Bougainville Standard Time' => 'Pacific/Bougainville',
		'Cape Verde Standard Time' => 'Atlantic/Cape_Verde',
		'Canada Central Standard Time' => 'America/Regina',
		'Caucasus Standard Time' => 'Asia/Yerevan',
		'Cen. Australia Standard Time' => 'Australia/Adelaide',
		'Central America Standard Time' => 'America/Guatemala',
		'Central Asia Standard Time' => 'Asia/Almaty',
		'Central Brazilian Standard Time' => 'America/Cuiaba',
		'Central Europe Standard Time' => 'Europe/Budapest',
		'Central European Standard Time' => 'Europe/Warsaw',
		'Central Pacific Standard Time' => 'Pacific/Guadalcanal',
		'Central Standard Time' => 'America/Chicago',
		'Central Standard Time (Mexico)' => 'America/Mexico_City',
		'Chatham Islands Standard Time' => 'Pacific/Chatham',
		'China Standard Time' => 'Asia/Shanghai',
		'Coordinated Universal Time' => 'UTC',
		'Cuba Standard Time' => 'America/Havana',
		'Dateline Standard Time' => 'Etc/GMT+12',
		'E. Africa Standard Time' => 'Africa/Nairobi',
		'E. Australia Standard Time' => 'Australia/Brisbane',
		'E. Europe Standard Time' => 'Europe/Chisinau',
		'E. South America Standard Time' => 'America/Sao_Paulo',
		'Easter Island Standard Time' => 'Pacific/Easter',
		'Eastern Standard Time' => 'America/Toronto',
		'Eastern Standard Time (Mexico)' => 'America/Cancun',
		'Egypt Standard Time' => 'Africa/Cairo',
		'Ekaterinburg Standard Time' => 'Asia/Yekaterinburg',
		'FLE Standard Time' => 'Europe/Kiev',
		'Fiji Standard Time' => 'Pacific/Fiji',
		'GMT Standard Time' => 'Europe/London',
		'GTB Standard Time' => 'Europe/Bucharest',
		'Georgian Standard Time' => 'Asia/Tbilisi',
		'Greenland Standard Time' => 'America/Godthab',
		'Greenwich Standard Time' => 'Atlantic/Reykjavik',
		'Haiti Standard Time' => 'America/Port-au-Prince',
		'Hawaiian Standard Time' => 'Pacific/Honolulu',
		'India Standard Time' => 'Asia/Calcutta',
		'Iran Standard Time' => 'Asia/Tehran',
		'Israel Standard Time' => 'Asia/Jerusalem',
		'Jordan Standard Time' => 'Asia/Amman',
		'Kaliningrad Standard Time' => 'Europe/Kaliningrad',
		'Kamchatka Standard Time' => 'Asia/Kamchatka',
		'Korea Standard Time' => 'Asia/Seoul',
		'Libya Standard Time' => 'Africa/Tripoli',
		'Line Islands Standard Time' => 'Pacific/Kiritimati',
		'Lord Howe Standard Time' => 'Australia/Lord_Howe',
		'Magadan Standard Time' => 'Asia/Magadan',
		'Magallanes Standard Time' => 'America/Punta_Arenas',
		'Malaysia Standard Time' => 'Asia/Kuala_Lumpur',
		'Marquesas Standard Time' => 'Pacific/Marquesas',
		'Mauritius Standard Time' => 'Indian/Mauritius',
		'Mid-Atlantic Standard Time' => 'Atlantic/South_Georgia',
		'Middle East Standard Time' => 'Asia/Beirut',
		'Montevideo Standard Time' => 'America/Montevideo',
		'Morocco Standard Time' => 'Africa/Casablanca',
		'Mountain Standard Time' => 'America/Denver',
		'Mountain Standard Time (Mexico)' => 'America/Chihuahua',
		'Myanmar Standard Time' => 'Asia/Rangoon',
		'N. Central Asia Standard Time' => 'Asia/Novosibirsk',
		'Namibia Standard Time' => 'Africa/Windhoek',
		'Nepal Standard Time' => 'Asia/Katmandu',
		'New Zealand Standard Time' => 'Pacific/Auckland',
		'Newfoundland Standard Time' => 'America/St_Johns',
		'Norfolk Standard Time' => 'Pacific/Norfolk',
		'North Asia East Standard Time' => 'Asia/Irkutsk',
		'North Asia Standard Time' => 'Asia/Krasnoyarsk',
		'North Korea Standard Time' => 'Asia/Pyongyang',
		'Omsk Standard Time' => 'Asia/Omsk',
		'Pacific SA Standard Time' => 'America/Santiago',
		'Pacific Standard Time' => 'America/Los_Angeles',
		'Pacific Standard Time (Mexico)' => 'America/Tijuana',
		'Pakistan Standard Time' => 'Asia/Karachi',
		'Paraguay Standard Time' => 'America/Asuncion',
		'Qyzylorda Standard Time' => 'Asia/Qyzylorda',
		'Romance Standard Time' => 'Europe/Paris',
		'Russian Standard Time' => 'Europe/Moscow',
		'Russia Time Zone 10' => 'Asia/Srednekolymsk',
		'Kamchatka Standard Time' => 'Asia/Kamchatka',
		'Russia Time Zone 3' => 'Europe/Samara',
		'SA Eastern Standard Time' => 'America/Cayenne',
		'SA Pacific Standard Time' => 'America/Bogota',
		'SA Western Standard Time' => 'America/La_Paz',
		'SE Asia Standard Time' => 'Asia/Bangkok',
		'Saint Pierre Standard Time' => 'America/Miquelon',
		'Sakhalin Standard Time' => 'Asia/Sakhalin',
		'Samoa Standard Time' => 'Pacific/Apia',
		'Sao Tome Standard Time' => 'Africa/Sao_Tome',
		'Saratov Standard Time' => 'Europe/Saratov',
		'Singapore Standard Time' => 'Asia/Singapore',
		'South Africa Standard Time' => 'Africa/Johannesburg',
		'South Sudan Standard Time' => 'Africa/Juba',
		'Sri Lanka Standard Time' => 'Asia/Colombo',
		'Sudan Standard Time' => 'Africa/Khartoum',
		'Syria Standard Time' => 'Asia/Damascus',
		'Taipei Standard Time' => 'Asia/Taipei',
		'Tasmania Standard Time' => 'Australia/Hobart',
		'Tocantins Standard Time' => 'America/Araguaina',
		'Tokyo Standard Time' => 'Asia/Tokyo',
		'Tomsk Standard Time' => 'Asia/Tomsk',
		'Tonga Standard Time' => 'Pacific/Tongatapu',
		'Transbaikal Standard Time' => 'Asia/Chita',
		'Turkey Standard Time' => 'Europe/Istanbul',
		'Turks And Caicos Standard Time' => 'America/Grand_Turk',
		'US Eastern Standard Time' => 'America/Indianapolis',
		'US Mountain Standard Time' => 'America/Phoenix',
		'UTC' => 'Etc/GMT',
		'UTC+13' => 'Etc/GMT-13',
		'UTC+12' => 'Etc/GMT-12',
		'UTC-02' => 'Etc/GMT+2',
		'UTC-09' => 'Etc/GMT+9',
		'UTC-11' => 'Etc/GMT+11',
		'Ulaanbaatar Standard Time' => 'Asia/Ulaanbaatar',
		'Venezuela Standard Time' => 'America/Caracas',
		'Vladivostok Standard Time' => 'Asia/Vladivostok',
		'Volgograd Standard Time' => 'Europe/Volgograd',
		'W. Australia Standard Time' => 'Australia/Perth',
		'W. Central Africa Standard Time' => 'Africa/Lagos',
		'W. Europe Standard Time' => 'Europe/Berlin',
		'W. Mongolia Standard Time' => 'Asia/Hovd',
		'West Asia Standard Time' => 'Asia/Tashkent',
		'West Bank Standard Time' => 'Asia/Hebron',
		'West Pacific Standard Time' => 'Pacific/Port_Moresby',
		'Yakutsk Standard Time' => 'Asia/Yakutsk',
		'Yukon Standard Time' => 'America/Whitehorse',
	];

	/**
     * Retrieves EWS (Microsoft/Windows) time zone information
     * 
     * @since Release 1.0.0
     * 
     * @param string $name  ews time zone name
     * 
     * @return object time zone information object on success, or null on failure
     */ 
    public static function find(?string $name) : ?object {

		$r = array_search($name, array_column(self::$ewszones, 'id'));
		if (isset($r)) {
			return (object) self::$ewszones[$r];
		} else {
			return null;
		}

    }

	/**
     * Converts IANA time zone name to EWS (Microsoft/Windows) time zone name
     * 
     * @since Release 1.0.0
     * 
     * @param string $name  iana time zone name
     * 
     * @return string valid EWS time zone name on success, or null on failure
     */ 
	public static function fromIANA(?string $name): ?string {

		if (isset(self::$ianatoews[$name])) {
			return self::$ianatoews[$name];
		} else {
			return null;
		}

    }

	/**
     * Converts EWS (Microsoft/Windows) time zone name to IANA time zone name
     * 
     * @since Release 1.0.0
     * 
     * @param string $name  ews time zone name
     * 
     * @return string valid IANA time zone name on success, or null on failure
     */ 
	public static function toIANA(?string $name): ?string {

		if (isset(self::$ewstoiana[$name])) {
			return self::$ewstoiana[$name];
		} else {
			return null;
		}

    }

	/**
     * Converts DateTimeZone object to EWS (Microsoft/Windows) time zone name
     * 
     * @since Release 1.0.0
     * 
     * @param DateTimeZone $zone
     * 
     * @return string valid EWS time zone name on success, or null on failure
     */ 
	public static function fromDateTimeZone(DateTimeZone $zone): ?string {

		// convert IANA time zone name to EWS
		$zone = self::fromIANA($zone->getName());
		// evaluate if we recieve a converted name
		// return time zone name if zone was found
		if (!empty($zone)) {
			return $zone;
		}
		else {
			return null;
		}

    }

	/**
     * Converts EWS (Microsoft/Windows) time zone name to DateTimeZone object
     * 
     * @since Release 1.0.0
     * 
     * @param string $name  ews time zone name
     * 
     * @return DateTimeZone valid DateTimeZone object on success, or null on failure
     */ 
	public static function toDateTimeZone(string $name): ?DateTimeZone {

		// evaluate if name exists in conversion table
		if (isset(self::$ewstoiana[$name])) {
			$zone = @timezone_open(self::$ewstoiana[$name]);
		}
		// otherwise attempt to convert time zone name
		else {
			$zone = @timezone_open($name);
		}
		// return time zone object if zone was found
		if ($zone instanceof DateTimeZone) {
			return $zone;
		}
		else {
			return null;
		}

    }
	
}