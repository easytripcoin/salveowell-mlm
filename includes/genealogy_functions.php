<?php
require_once __DIR__ . '/../config/referral_config.php';

function generateUsername($fullName): string
{
    $slug = strtolower(str_replace(' ', '', $fullName));
    $slug .= rand(1000, 9999);
    return substr($slug, 0, 20);
}

function findPlacement(int $sponsorId): array
{
    $db = db();
    // simple powerleg: left → right
    $sponsor = user_by('id', $sponsorId);
    if (!$sponsor['left_leg_id']) {
        return ['sponsor_id' => $sponsorId, 'placement' => 'left'];
    }
    if (!$sponsor['right_leg_id']) {
        return ['sponsor_id' => $sponsorId, 'placement' => 'right'];
    }

    // both legs taken → place under next available left
    $queue = [$sponsor['left_leg_id'], $sponsor['right_leg_id']];
    while ($queue) {
        $childId = array_shift($queue);
        $child = user_by('id', $childId);
        if (!$child['left_leg_id']) {
            return ['sponsor_id' => $childId, 'placement' => 'left'];
        }
        if (!$child['right_leg_id']) {
            return ['sponsor_id' => $childId, 'placement' => 'right'];
        }
        $queue[] = $child['left_leg_id'];
        $queue[] = $child['right_leg_id'];
    }
    return ['sponsor_id' => 1, 'placement' => 'left']; // fallback
}

function buildTree(int $rootId, int $depth = 3): array
{
    $root = user_by('id', $rootId);
    if (!$root)
        return [];

    $tree = [
        'id' => $root['id'],
        'name' => $root['full_name'],
        'username' => $root['username'],
        'left' => null,
        'right' => null,
    ];

    if ($depth > 0) {
        if ($root['left_leg_id']) {
            $tree['left'] = buildTree($root['left_leg_id'], $depth - 1);
        }
        if ($root['right_leg_id']) {
            $tree['right'] = buildTree($root['right_leg_id'], $depth - 1);
        }
    }
    return $tree;
}