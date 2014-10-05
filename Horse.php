<?php
/**
 *                       ~~%%%%%%%%_,_,
 *                    ~~%%%%%%%%%-"/./
 *                  ~~%%%%%%%-'   /  `.
 *               ~~%%%%%%%%'  .     ,__;
 *             ~~%%%%%%%%'   :       \O\
 *           ~~%%%%%%%%'    :          `.
 *        ~~%%%%%%%%'       `. _,        '
 *     ~~%%%%%%%%'          .'`-._        `.
 *  ~~%%%%%%%%%'           :     `-.     (,;
 * ~~%%%%%%%%'             :         `._\_.'
 * ~~%%jgs%%'              ;
 */

namespace Horse;


class Horse {

    const NUM_HORSES = 2;

    private function __construct() {}

    private $horses = [];

    public function giveMeHorses()
    {
        if (count($this->horses) == self::NUM_HORSES) {
            return $this->horses;
        }
        
        for ($i = count($this->horses); $i < self::NUM_HORSES; $i++) {
            $this->horses = new Horse();
        }

        return $this->horses;
    }

    public function horse()
    {
        echo get_class($this) . nl2br("\n");
        $this->neigh();
    }

    protected function neigh()
    {
        $horseThings = get_class_methods('Horse');

        foreach ($horseThings as $horseThing) {
            if ($horseThing == 'neigh') {
                echo $horseThing . nl2br("\n");
            }
        }

        $this->horse();
    }
}
