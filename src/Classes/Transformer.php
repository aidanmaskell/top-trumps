<?php

namespace Transformers\Classes;

class Transformer 
{
    public $id;
    private $name;
    private $size;
    private $speed;
    private $power;
    private $disguise;
    private $top_trumps_rating;
    private $type;
    private $img_url;
    private $winner;
    private $chosen;

    public function getWinRate() 
    {
        if($this->chosen == 0 || $this->winner == 0){
            return 0;
        } else {
            return round(($this->winner / $this->chosen)*100);
        }
    }

    public function getId(): int
    {
        return $this->id;
    }
    public function getName() {return $this->name;}
    public function getSize() {return $this->size;}
    public function getSpeed() {return $this->speed;}
    public function getPower() {return $this->power;}
    public function getDisguise() {return $this->disguise;}
    public function getRating() {return $this->top_trumps_rating;}
    public function getType() {return $this->type;}
    public function getImg() {return $this->img_url;}
    public function getWinner() {return $this->winner;}
    public function getChosen() {return $this->chosen;}
}