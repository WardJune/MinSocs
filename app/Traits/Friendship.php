<?php

namespace App\Traits;

use App\Models\Friendship as ModelsFriendship;
use App\Models\User;

/**
 * Friendship traits
 */
trait Friendship
{
  public function request(User $user)
  {
    ModelsFriendship::create([
      'requested_id' => $user->id,
      'requester_id' => $this->id,
      'status' => 0
    ]);
  }

  public function accept(User $user)
  {
    $friendship = ModelsFriendship::where([
      'requester_id' => $user->id,
      'requested_id' => $this->id,
    ]);

    if ($friendship) {
      $friendship->update([
        'status' => 1
      ]);

      return true;
    }

    return false;
  }

  public function remove(User $user, bool $status)
  {
    $friendship = ModelsFriendship::where([
      'requester_id' => $user->id,
      'requested_id' => $this->id,
      'status' => $status
    ])->first();

    if ($friendship) {
      $friendship->delete();
      return true;
    }

    $friendship = ModelsFriendship::where([
      'requester_id' => $this->id,
      'requested_id' => $user->id,
      'status' => $status
    ])->first();

    if ($friendship) {
      $friendship->delete();
      return true;
    }

    return false;
  }

  public function friends()
  {
    $approvedFriends = ModelsFriendship::where([
      'requested_id' => $this->id,
      'status' => 1
    ])
      ->get()
      ->pluck(['requester_id'])
      ->toArray();

    $requestedFriends = ModelsFriendship::where([
      'requester_id' => $this->id,
      'status' => 1
    ])
      ->get()
      ->pluck(['requested_id'])
      ->toArray();

    $friends = array_merge($approvedFriends, $requestedFriends);

    $users = User::whereIn('id', $friends)
      ->orderBy('name', 'asc')
      ->get();

    return $users;
  }

  public function pendingFriendRequest()
  {
    $peoples = ModelsFriendship::where([
      'requested_id' => $this->id,
      'status' => 0
    ])
      ->get()
      ->pluck(['requester_id']);

    $user = User::whereIn('id', $peoples)
      ->orderBy('name', 'asc')
      ->get();

    return $user;
  }

  public function sentFriendRequest()
  {
    $peoples = ModelsFriendship::where([
      'requester_id' => $this->id,
      'status' => 0
    ])
      ->get()
      ->pluck(['requested_id']);

    $users = User::whereIn('id', $peoples)
      ->orderBy('name', 'asc')
      ->get();

    return $users;
  }

  public function suggestPeople()
  {
    $friends = $this->friends()->pluck(['id'])->toArray();
    $pending = $this->pendingFriendRequest()->pluck(['id'])->toArray();
    $sent = $this->sentFriendRequest()->pluck(['id'])->toArray();

    $all = array_merge($friends, $pending,  $sent);
    $all[] = $this->id;

    $peoples = User::whereNotIn('id', $all)
      ->orderBy('name', 'asc')
      ->get();

    return $peoples;
  }

  public function isFriendWith(User $user)
  {
    $friendship = ModelsFriendship::where([
      'requested_id' => $this->id,
      'requester_id' => $user->id,
      'status' => 1
    ])->first();

    if ($friendship) {
      return !!$friendship;
    }

    $friendship = ModelsFriendship::where([
      'requester_id' => $this->id,
      'requested_id' => $user->id,
      'status' => 1
    ])->first();

    if ($friendship) {
      return !!$friendship;
    }
  }

  public function hasRequestAsFriend(User $user)
  {
    $friendship = ModelsFriendship::where([
      'requester_id' => $this->id,
      'requested_id' => $user->id,
      'status' => 0
    ])->first();

    return !!$friendship;
  }
}
