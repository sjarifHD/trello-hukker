<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use Trello\Client;

use App\Repository\Trello;

class TrelloController extends Controller
{
    private $api_key;
    private $token;
    private $username;
    private $client;
    private $now;

    public function __construct()
    {
        $this->now = Carbon::now('utc')->toDateTimeString();

        $this->api_key = '020b36f507f380bf32cb073f29fdca8f';
        $this->token = '516d658a11e4dafafdba5ebab2ac9409f6ac532681328526ee1ac6b54d31bddc';
        $this->username = 'sjarifhd';

        $this->client = new Client();
        $this->client->authenticate($this->api_key, $this->token, Client::AUTH_URL_CLIENT_ID);
    }

    public function index()
    {
        return $this->getListsByBoard();
        // return $this->saveBoard();
    }

    public function getListsByBoard()
    {
        $boardId = '57afc59dfd062df71d0c9100';

        $lists = $this->client->api('boards')->lists()->all($boardId);

        return $lists;
    }

    public function saveBoard()
    {
        $boards = $this->client->api('member')->boards()->all($this->username);

        $data = [];

        foreach ($boards as $board) {
            $temp = array(
                'name' => $board['name'],
                'boardId' => $board['id'],
                'shortUrl' => $board['shortUrl'],
                'created_at'=> $this->now,
                'updated_at'=> $this->now
            );

            $data[] = $temp;
        }


        $trello = new Trello();
        if ($trello->storeBoard($data)) {
            return "SUKSES";
        } else {
            return "GAGAL";
        }
    }

    public function boards()
    {
        $trello = new Trello();
        $boards = $trello->getAllBoards();
        return $boards;
    }
}
