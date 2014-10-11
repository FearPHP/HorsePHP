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


class HorseClass {

    public function __construct() {}

    public function horseMethod($horse = '')
    {
        $horseThings = get_class_methods('\Horse\HorseClass');
        $this->findNewHorse($horseThings, $horse);

        $newHorseThing = str_replace('HORSE', $horse, self::$newHorseDoingThingTemplate);
        $newHorseThing .= "\n}";

        $this->addNewHorseThing($newHorseThing);
        exit;
    }

    public function horseVariable($horse = '')
    {
        $horseThings = get_class_vars('\Horse\HorseClass');
        $this->findNewHorse($horseThings, $horse);

        $newHorseThing = str_replace('HORSE', $horse, self::$newHorseThingTemplate);
        $newHorseThing .= "\n}";

        $this->addNewHorseThing($newHorseThing);
        exit;
    }

    private function addNewHorseThing($newHorseThing)
    {
        $horseFile = fopen('HorseClass.php', 'r+');
        $trot = -1;
        do {
            fseek($horseFile, $trot, SEEK_END);
            $horsePart = fgetc($horseFile);
            $trot--;
        } while ($horsePart != "}");
        fseek($horseFile, $trot, SEEK_END);

        fwrite($horseFile, $newHorseThing, strlen($newHorseThing));
    }

    private function findNewHorse($horseThings, &$horse)
    {
        $easyLookupHorseThings = [];
        foreach ($horseThings as $horseThing) {
            $easyLookupHorseThings[strtoupper($horseThing)] = 1;
        }

        if (empty($horse)) {
            $this->lengthenHorse($horse);
        }

        while (isset($easyLookupHorseThings[strtoupper($horse)])) {
            $this->lengthenHorse($horse);
        }
    }

    private function lengthenHorse(&$horse)
    {
        $longerHorse = rand(65, 116);
        if ($longerHorse > 90) {
            $longerHorse += 6;
        }

        $horse .= chr($longerHorse);
    }

    private static $newHorseThingTemplate = "
    public \$HORSE = \"HORSE\";\n";

    private static $newHorseDoingThingTemplate = "
    public function HORSE()
    {
        echo strtoupper(\"HORSE\");
    }\n";

}