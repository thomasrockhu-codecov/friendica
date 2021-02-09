<?php
/**
 * @copyright Copyright (C) 2020, Friendica
 *
 * @license GNU AGPL version 3 or any later version
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
 * along with this program.  If not, see <https://www.gnu.org/licenses/>.
 *
 */

use Friendica\Core\Protocol;
use Friendica\Model\Contact;
use Friendica\Model\Item;
use Friendica\Model\Notification;

return [
	// Empty these tables
	'cache',
	'conversation',
	'pconfig',
	'photo',
	'workerqueue',
	'mail',
	'post-delivery-data',
	// Base test config to avoid notice messages
	'config'  => [
		[
			'cat' => 'system',
			'k'   => 'url',
			'v'   => 'http://localhost',
		],
		[
			'cat' => 'config',
			'k'   => 'hostname',
			'v'   => 'localhost',
		],
		[
			'cat' => 'system',
			'k'   => 'worker_dont_fork',
			'v'   => '1',
		],
	],
	'user'    => [
		[
			'uid'      => 42,
			'username' => 'Test user',
			'nickname' => 'selfcontact',
			'verified' => 1,
			'password' => '$2y$10$DLRNTRmJgKe1cSrFJ5Jb0edCqvXlA9sh/RHdSnfxjbR.04yZRm4Qm',
			'theme'    => 'frio',
		],
	],
	'contact' => [
		[
			'id'      => 42,
			'uid'     => 42,
			'name'    => 'Self contact',
			'nick'    => 'selfcontact',
			'self'    => 1,
			'nurl'    => 'http://localhost/profile/selfcontact',
			'url'     => 'http://localhost/profile/selfcontact',
			'about'   => 'User used in tests',
			'pending' => 0,
			'blocked' => 0,
			'rel'     => Contact::FOLLOWER,
			'network' => Protocol::DFRN,
			'location' => 'DFRN',
		],
		// Having the same name and nick allows us to test
		// the fallback to api_get_nick() in api_get_user()
		[
			'id'      => 43,
			'uid'     => 0,
			'name'    => 'othercontact',
			'nick'    => 'othercontact',
			'self'    => 0,
			'nurl'    => 'http://localhost/profile/othercontact',
			'url'     => 'http://localhost/profile/othercontact',
			'pending' => 0,
			'blocked' => 0,
			'rel'     => Contact::NOTHING,
			'network' => Protocol::DFRN, 
			'location' => 'DFRN',
		],
		[
			'id'      => 44,
			'uid'     => 42,
			'name'    => 'Friend contact',
			'nick'    => 'friendcontact',
			'self'    => 0,
			'nurl'    => 'http://localhost/profile/friendcontact',
			'url'     => 'http://localhost/profile/friendcontact',
			'pending' => 0,
			'blocked' => 0,
			'rel'     => Contact::SHARING,
			'network' => Protocol::DFRN,
			'location' => 'DFRN',
		],
		[
			'id'      => 45,
			'uid'     => 0,
			'name'    => 'Friend contact',
			'nick'    => 'friendcontact',
			'self'    => 0,
			'nurl'    => 'http://localhost/profile/friendcontact',
			'url'     => 'http://localhost/profile/friendcontact',
			'pending' => 0,
			'blocked' => 0,
			'rel'     => Contact::SHARING,
			'network' => Protocol::DFRN,
			'location' => 'DFRN',
		],
		[
			'id'      => 46,
			'uid'     => 42,
			'name'    => 'Mutual contact',
			'nick'    => 'mutualcontact',
			'self'    => 0,
			'nurl'    => 'http://localhost/profile/mutualcontact',
			'url'     => 'http://localhost/profile/mutualcontact',
			'pending' => 0,
			'blocked' => 0,
			'rel'     => Contact::FRIEND,
			'network' => Protocol::DFRN,
			'location' => 'DFRN',
		],
		[
			'id'      => 47,
			'uid'     => 0,
			'name'    => 'Mutual contact',
			'nick'    => 'mutualcontact',
			'self'    => 0,
			'nurl'    => 'http://localhost/profile/mutualcontact',
			'url'     => 'http://localhost/profile/mutualcontact',
			'pending' => 0,
			'blocked' => 0,
			'rel'     => Contact::SHARING,
			'network' => Protocol::DFRN,
			'location' => 'DFRN',
		],
	],
	'item-uri'    => [
		[
			'id'   => 1,
			'uri'  => '1',
			'guid' => '1',
		],
		[
			'id'   => 2,
			'uri'  => '2',
			'guid' => '2',
		],
		[
			'id'   => 3,
			'uri'  => '3',
			'guid' => '3',
		],
		[
			'id'   => 4,
			'uri'  => '4',
			'guid' => '4',
		],
		[
			'id'   => 5,
			'uri'  => '5',
			'guid' => '5',
		],
		[
			'id'   => 6,
			'uri'  => '6',
			'guid' => '6',
		],
	],
	'post-content' => [
		[
			'uri-id' => 1,
			'body'   => 'Parent status',
			'plink'  => 'http://localhost/display/1',
		],
		[
			'uri-id' => 2,
			'body'   => 'Reply',
			'plink'  => 'http://localhost/display/2',
		],
		[
			'uri-id' => 3,
			'body'   => 'Other user status',
			'plink'  => 'http://localhost/display/3',
		],
		[
			'uri-id' => 4,
			'body'   => 'Friend user reply',
			'plink'  => 'http://localhost/display/4',
		],
		[
			'uri-id' => 5,
			'body'   => '[share]Shared status[/share]',
			'plink'  => 'http://localhost/display/5',
		],
		[
			'uri-id' => 6,
			'body'   => 'Friend user status',
			'plink'  => 'http://localhost/display/6',
		],
	],
	'post-thread'  => [
		[
			'uri-id'     => 1,
			'author-id'  => 42,
			'owner-id'   => 42,
			'causer-id'  => 42,
			'network'    => Protocol::DFRN,
		],
		[
			'uri-id'     => 3,
			'author-id'  => 43,
			'owner-id'   => 43,
			'causer-id'  => 43,
			'network'    => Protocol::DFRN,
		],
		[
			'uri-id'     => 6,
			'author-id'  => 44,
			'owner-id'   => 44,
			'causer-id'  => 44,
			'network'    => Protocol::DFRN,
		],
	],
	'post-user' => [
		[
			'id'          => 1,
			'uri-id'      => 1,
			'uid'         => 42,
			'contact-id'  => 42,
			'unseen'      => 1,
			'origin'      => 1,
		],
		[
			'id'          => 2,
			'uri-id'      => 2,
			'uid'         => 42,
			'contact-id'  => 42,
			'unseen'      => 0,
			'origin'      => 1,
		],
		[
			'id'          => 3,
			'uri-id'      => 3,
			'uid'         => 42,
			'contact-id'  => 43,
			'unseen'      => 0,
			'origin'      => 1,
		],
		[
			'id'          => 4,
			'uri-id'      => 4,
			'uid'         => 42,
			'contact-id'  => 44,
			'unseen'      => 0,
			'origin'      => 1,
		],
		[
			'id'          => 5,
			'uri-id'      => 5,
			'uid'         => 42,
			'contact-id'  => 42,
			'unseen'      => 0,
			'origin'      => 1,
		],
		[
			'id'          => 6,
			'uri-id'      => 6,
			'uid'         => 42,
			'contact-id'  => 44,
			'unseen'      => 0,
			'origin'      => 1,
		],
		[
			'id'          => 7,
			'uri-id'      => 1,
			'uid'         => 0,
			'contact-id'  => 42,
			'unseen'      => 1,
			'origin'      => 0,
		],
		[
			'id'          => 8,
			'uri-id'      => 2,
			'uid'         => 0,
			'contact-id'  => 42,
			'unseen'      => 0,
			'origin'      => 0,
		],
		[
			'id'          => 9,
			'uri-id'      => 3,
			'uid'         => 0,
			'contact-id'  => 43,
			'unseen'      => 0,
			'origin'      => 0,
		],
		[
			'id'          => 10,
			'uri-id'      => 4,
			'uid'         => 0,
			'contact-id'  => 44,
			'unseen'      => 0,
			'origin'      => 0,
		],
		[
			'id'          => 11,
			'uri-id'      => 5,
			'uid'         => 0,
			'contact-id'  => 42,
			'unseen'      => 0,
			'origin'      => 0,
		],
		[
			'id'          => 12,
			'uri-id'      => 6,
			'uid'         => 0,
			'contact-id'  => 44,
			'unseen'      => 0,
			'origin'      => 0,
		],
	],
	'post-thread-user'  => [
		[
			'uri-id'     => 1,
			'uid'        => 42,
			'wall'       => 1,
			'post-user-id' => 1,
		],
		[
			'uri-id'     => 3,
			'uid'        => 42,
			'wall'       => 1,
			'post-user-id' => 3,
		],
		[
			'uri-id'     => 6,
			'uid'        => 42,
			'wall'       => 1,
			'post-user-id' => 6,
		],
		[
			'uri-id'     => 1,
			'uid'        => 0,
			'wall'       => 0,
			'post-user-id' => 7,
		],
		[
			'uri-id'     => 3,
			'uid'        => 0,
			'wall'       => 0,
			'post-user-id' => 9,
		],
		[
			'uri-id'     => 6,
			'uid'        => 0,
			'wall'       => 0,
			'post-user-id' => 12,
		],
	],
	'item'    => [
		[
			'id'          => 1,
			'uri-id'      => 1,
			'uri'         => '1',
			'visible'     => 1,
			'contact-id'  => 42,
			'author-id'   => 42,
			'owner-id'    => 42,
			'causer-id'   => 42,
			'uid'         => 42,
			'verb'        => 'http://activitystrea.ms/schema/1.0/post',
			'unseen'      => 1,
			'parent'      => 1,
			'parent-uri-id' => 1,
			'parent-uri'  => '1',
			'thr-parent-id' => 1,
			'thr-parent'  => '1',
			'private'     => Item::PUBLIC,
			'gravity'     => GRAVITY_PARENT,
			'author-link' => 'http://localhost/profile/selfcontact',
			'wall'        => 1,
			'starred'     => 1,
			'origin'      => 1,
			'allow_cid'   => '',
			'allow_gid'   => '',
			'deny_cid'    => '',
			'deny_gid'    => '',
			'guid'        => '1',
		],
		[
			'id'          => 2,
			'uri-id'      => 2,
			'uri'         => '2',
			'visible'     => 1,
			'contact-id'  => 42,
			'author-id'   => 42,
			'owner-id'    => 42,
			'causer-id'   => 42,
			'uid'         => 42,
			'verb'        => 'http://activitystrea.ms/schema/1.0/post',
			'unseen'      => 0,
			'parent'      => 1,
			'parent-uri-id' => 1,
			'parent-uri'  => '1',
			'thr-parent-id' => 1,
			'thr-parent'  => '1',
			'private'     => Item::PUBLIC,
			'gravity'     => GRAVITY_COMMENT,
			'author-link' => 'http://localhost/profile/selfcontact',
			'wall'        => 1,
			'starred'     => 0,
			'origin'      => 1,
			'guid'        => '2',
		],
		[
			'id'          => 3,
			'uri-id'      => 3,
			'uri'         => '3',
			'visible'     => 1,
			'contact-id'  => 43,
			'author-id'   => 43,
			'owner-id'    => 42,
			'causer-id'   => 43,
			'uid'         => 42,
			'verb'        => 'http://activitystrea.ms/schema/1.0/post',
			'unseen'      => 0,
			'parent'      => 3,
			'parent-uri-id' => 3,
			'parent-uri'  => '3',
			'thr-parent-id' => 3,
			'thr-parent'  => '3',
			'private'     => Item::PUBLIC,
			'gravity'     => GRAVITY_PARENT,
			'author-link' => 'http://localhost/profile/othercontact',
			'wall'        => 1,
			'starred'     => 0,
			'origin'      => 1,
			'guid'        => '3',
		],
		[
			'id'          => 4,
			'uri-id'      => 4,
			'uri'         => '4',
			'visible'     => 1,
			'contact-id'  => 44,
			'author-id'   => 44,
			'owner-id'    => 42,
			'causer-id'   => 44,
			'uid'         => 42,
			'verb'        => 'http://activitystrea.ms/schema/1.0/post',
			'unseen'      => 0,
			'body'        => 'Friend user reply',
			'parent'      => 1,
			'parent-uri-id' => 1,
			'parent-uri'  => '1',
			'thr-parent-id' => 1,
			'thr-parent'  => '1',
			'private'     => Item::PUBLIC,
			'gravity'     => GRAVITY_COMMENT,
			'author-link' => 'http://localhost/profile/othercontact',
			'wall'        => 1,
			'starred'     => 0,
			'origin'      => 1,
			'guid'        => '4',
		],
		[

			'id'          => 5,
			'uri-id'      => 5,
			'uri'         => '5',
			'visible'     => 1,
			'contact-id'  => 42,
			'author-id'   => 42,
			'owner-id'    => 42,
			'causer-id'   => 42,
			'uid'         => 42,
			'verb'        => 'http://activitystrea.ms/schema/1.0/post',
			'unseen'      => 0,
			'parent'      => 1,
			'parent-uri-id' => 1,
			'parent-uri'  => '1',
			'thr-parent-id' => 1,
			'thr-parent'  => '1',
			'private'     => Item::PUBLIC,
			'gravity'     => GRAVITY_COMMENT,
			'author-link' => 'http://localhost/profile/othercontact',
			'wall'        => 1,
			'starred'     => 0,
			'origin'      => 1,
			'allow_cid'   => '',
			'allow_gid'   => '',
			'deny_cid'    => '',
			'deny_gid'    => '',
			'guid'        => '5',
		],
		[
			'id'          => 6,
			'uri-id'      => 6,
			'uri'         => '6',
			'visible'     => 1,
			'contact-id'  => 44,
			'author-id'   => 44,
			'owner-id'    => 42,
			'causer-id'   => 44,
			'uid'         => 42,
			'verb'        => 'http://activitystrea.ms/schema/1.0/post',
			'unseen'      => 0,
			'parent'      => 6,
			'parent-uri-id' => 6,
			'parent-uri'  => '6',
			'thr-parent-id' => 6,
			'thr-parent'  => '6',
			'private'     => Item::PUBLIC,
			'gravity'     => GRAVITY_PARENT,
			'author-link' => 'http://localhost/profile/othercontact',
			'wall'        => 1,
			'starred'     => 0,
			'origin'      => 1,
			'guid'        => '6',
		],
		[
			'id'          => 7,
			'uri-id'      => 1,
			'uri'         => '1',
			'visible'     => 1,
			'contact-id'  => 42,
			'author-id'   => 42,
			'owner-id'    => 42,
			'causer-id'   => 42,
			'uid'         => 0,
			'verb'        => 'http://activitystrea.ms/schema/1.0/post',
			'unseen'      => 1,
			'parent'      => 7,
			'parent-uri-id' => 1,
			'parent-uri'  => '1',
			'thr-parent-id' => 1,
			'thr-parent'  => '1',
			'private'     => Item::PUBLIC,
			'gravity'     => GRAVITY_PARENT,
			'author-link' => 'http://localhost/profile/selfcontact',
			'wall'        => 0,
			'starred'     => 1,
			'origin'      => 0,
			'allow_cid'   => '',
			'allow_gid'   => '',
			'deny_cid'    => '',
			'deny_gid'    => '',
			'guid'        => '1',
		],
		[
			'id'          => 8,
			'uri-id'      => 2,
			'uri'         => '2',
			'visible'     => 1,
			'contact-id'  => 42,
			'author-id'   => 42,
			'owner-id'    => 42,
			'causer-id'   => 42,
			'uid'         => 0,
			'verb'        => 'http://activitystrea.ms/schema/1.0/post',
			'unseen'      => 0,
			'parent'      => 7,
			'parent-uri-id' => 1,
			'parent-uri'  => '1',
			'thr-parent-id' => 1,
			'thr-parent'  => '1',
			'private'     => Item::PUBLIC,
			'gravity'     => GRAVITY_COMMENT,
			'author-link' => 'http://localhost/profile/selfcontact',
			'wall'        => 0,
			'starred'     => 0,
			'origin'      => 0,
			'guid'        => '2',
		],
		[
			'id'          => 9,
			'uri-id'      => 3,
			'uri'         => '3',
			'visible'     => 1,
			'contact-id'  => 43,
			'author-id'   => 43,
			'owner-id'    => 42,
			'causer-id'   => 43,
			'uid'         => 0,
			'verb'        => 'http://activitystrea.ms/schema/1.0/post',
			'unseen'      => 0,
			'parent'      => 9,
			'parent-uri-id' => 3,
			'parent-uri'  => '3',
			'thr-parent-id' => 3,
			'thr-parent'  => '3',
			'private'     => Item::PUBLIC,
			'gravity'     => GRAVITY_PARENT,
			'author-link' => 'http://localhost/profile/othercontact',
			'wall'        => 0,
			'starred'     => 0,
			'origin'      => 0,
			'guid'        => '3',
		],
		[
			'id'          => 10,
			'uri-id'      => 4,
			'uri'         => '4',
			'visible'     => 1,
			'contact-id'  => 44,
			'author-id'   => 44,
			'owner-id'    => 42,
			'causer-id'   => 44,
			'uid'         => 0,
			'verb'        => 'http://activitystrea.ms/schema/1.0/post',
			'unseen'      => 0,
			'body'        => 'Friend user reply',
			'parent'      => 7,
			'parent-uri-id' => 1,
			'parent-uri'  => '1',
			'thr-parent-id' => 1,
			'thr-parent'  => '1',
			'private'     => Item::PUBLIC,
			'gravity'     => GRAVITY_COMMENT,
			'author-link' => 'http://localhost/profile/othercontact',
			'wall'        => 0,
			'starred'     => 0,
			'origin'      => 0,
			'guid'        => '4',
		],
		[

			'id'          => 11,
			'uri-id'      => 5,
			'uri'         => '5',
			'visible'     => 1,
			'contact-id'  => 42,
			'author-id'   => 42,
			'owner-id'    => 42,
			'causer-id'   => 42,
			'uid'         => 0,
			'verb'        => 'http://activitystrea.ms/schema/1.0/post',
			'unseen'      => 0,
			'parent'      => 7,
			'parent-uri-id' => 1,
			'parent-uri'  => '1',
			'thr-parent-id' => 1,
			'thr-parent'  => '1',
			'private'     => Item::PUBLIC,
			'gravity'     => GRAVITY_COMMENT,
			'author-link' => 'http://localhost/profile/othercontact',
			'wall'        => 0,
			'starred'     => 0,
			'origin'      => 1,
			'allow_cid'   => '',
			'allow_gid'   => '',
			'deny_cid'    => '',
			'deny_gid'    => '',
			'guid'        => '5',
		],
		[
			'id'          => 12,
			'uri-id'      => 6,
			'uri'         => '6',
			'visible'     => 1,
			'contact-id'  => 44,
			'author-id'   => 44,
			'owner-id'    => 42,
			'causer-id'   => 44,
			'uid'         => 0,
			'verb'        => 'http://activitystrea.ms/schema/1.0/post',
			'unseen'      => 0,
			'parent'      => 12,
			'parent-uri-id' => 6,
			'parent-uri'  => '6',
			'thr-parent-id' => 6,
			'thr-parent'  => '6',
			'private'     => Item::PUBLIC,
			'gravity'     => GRAVITY_PARENT,
			'author-link' => 'http://localhost/profile/othercontact',
			'wall'        => 0,
			'starred'     => 0,
			'origin'      => 0,
			'guid'        => '6',
		],
	],
	'notify' => [
		[
			'id' => 1,
			'type' => 8,
			'name' => 'Reply to',
			'url' => 'http://localhost/display/1',
			'photo' => 'http://localhost/',
			'date' => '2020-01-01 12:12:02',
			'msg' => 'A test reply from an item',
			'uid' => 42,
			'link' => 'http://localhost/notification/1',
			'iid' => 4,
			'seen' => 0,
			'verb' => '',
			'otype' => Notification\ObjectType::ITEM,
			'name_cache' => 'Reply to',
			'msg_cache' => 'A test reply from an item',
		],
	],
	'profile' => [
		[
			'id' => 1,
			'uid' => 42,
		],
	],
	'group'   => [
		[
			'id'      => 1,
			'uid'     => 42,
			'visible' => 1,
			'name'    => 'Visible list',
		],
		[
			'id'      => 2,
			'uid'     => 42,
			'visible' => 0,
			'name'    => 'Private list',
		],
	],
	'search'  => [
		[
			'id'   => 1,
			'term' => 'Saved search',
			'uid'  => 42,
		],
	],
];