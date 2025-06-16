<?php

/*
 * This file is part of the FOSHttpCache package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FOS\HttpCache\SymfonyCache;

/**
 * Events used in the customized Symfony built-in reverse proxy HttpCache.
 */
final class Events
{
    public const PRE_HANDLE = 'fos_http_cache.pre_handle';

    public const POST_HANDLE = 'fos_http_cache.post_handle';

    public const PRE_FORWARD = 'fos_http_cache.pre_forward';

    public const POST_FORWARD = 'fos_http_cache.post_forward';

    public const PRE_INVALIDATE = 'fos_http_cache.pre_invalidate';

    public const PRE_STORE = 'fos_http_cache.pre_store';
}
