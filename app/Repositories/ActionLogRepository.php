<?php

namespace App\Repositories;

use App\Models\action_logs;

class ActionLogRepository {
    public static function create(array $request) {
        return action_logs::create($request);
    }

    public static function getByPostId($id) {
        return action_logs::where('post_id', $id) -> get();
    }
}
