<?php

use App\Models\Group;
use Illuminate\Support\Facades\Broadcast;

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
Broadcast::channel('chat', function ($mess, $user) {
    return true;
});

Broadcast::channel('public', function ($mess, $user) {
    return true;
});

Broadcast::channel('private-channel.1', function () {
    return true;
    return (int) $user->id === (int) $id;
});

Broadcast::channel('room.{id}', function () {
    return true;
});
//Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
//    return (int) $user->id === (int) $id;
//});

