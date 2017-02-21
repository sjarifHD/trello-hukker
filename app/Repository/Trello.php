<?php

namespace App\Repository;

use App\Board;

class Trello
{
    public function getAllBoards()
    {
        $boards = Board::all();

        return $boards;
    }

    public function storeBoard($data)
    {
        try {
            Board::insert($data);
            return true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
