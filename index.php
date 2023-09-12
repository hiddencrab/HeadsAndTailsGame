<?php

class Player {
    public $name;
    public $coins;
    public function __construct($name, $coins)
    {
        $this->name = $name;
        $this->coins = $coins;
    }
}
class Game {
    protected $player1;
    protected $player2;
    protected $flips = 0;

    public function __construct(Player $player1, Player $player2,)
    {
        $this->player1 = $player1;
        $this->player2 = $player2;
    }
    public function start()
    {
        while(true) {
            $flip = rand(0,1) ? "орел" : "решка";
        if($flip == "орел") {
            $this->player1->coins++;
            $this->player2->coins--;
        } else {
            $this->player1->coins--;
            $this->player2->coins++;
        }
        if($this->player1->coins == 0 || $this->player2->coins == 0 ) {
            return $this->end();
        }
        $this->flips++;
        }
    }
    public function winner()
    {
        if($this->player1->coins > $this->player2->coins){
            return $this->player1;
        } else {
            return $this->player2;
        }
    }
    public function end()
    {
        echo <<<EOT
            Game over.
            Победил {$this->winner()->name}
            Количестов подбрасываний: $this->flips
        EOT;

    }
}
$game = new Game(
    new Player("Nikita", 1000),
    new Player("Dima", 1000)
);

$game->start();
