<?php

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('notification', function ($user)
{
    return true;
});

Broadcast::channel('notification-{id}', function ($user, $id)
{
    return ['id' => $user->id];
});
