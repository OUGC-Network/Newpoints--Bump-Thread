<?php

/***************************************************************************
 *
 *    Newpoints Bump Thread plugin (/inc/plugins/newpoints/plugins/ougc/BumpThread/hooks/shared.php)
 *    Author: Omar Gonzalez
 *    Copyright: © 2012 Omar Gonzalez
 *
 *    Website: https://ougc.network
 *
 *    Allows users to bump their own threads without posting on exchange of points.
 *
 ***************************************************************************
 ****************************************************************************
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 ****************************************************************************/

declare(strict_types=1);

namespace Newpoints\BumpThread\Hooks\Shared;

function datahandler_post_insert_post(\postDataHandler &$data_handler): \postDataHandler
{
    global $db;

    $db->update_query('threads', ['lastpostbump' => TIME_NOW], 'tid=' . (int)$data_handler->data['tid']);

    return $data_handler;
}

function datahandler_post_insert_thread(\postDataHandler &$data_handler): \postDataHandler
{
    $data_handler->thread_insert_data['lastpostbump'] = (int)$data_handler->data['dateline'];

    return $data_handler;
}
