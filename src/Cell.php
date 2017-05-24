<?php

namespace DeBandai;

class Cell
{
    const X = 1;
    const O = 2;

    /** @var int */
    protected $x;

    /** @var int */
    protected $y;

    /** @var string */
    protected $value;

    /**
     * Cell constructor.
     *
     * @param int $x
     * @param int $y
     */
    public function __construct(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;
        $this->value = null;
    }

    public static function init(int $x, int $y, int $value): Cell
    {
        $cell = new Cell($x, $y);
        $cell->value = $value;

        return $cell;
    }

    public function isEmpty(): bool
    {
        return is_null($this->value);
    }

    public function setValue(string $value): Cell
    {   
        if($this->isEmpty()){
            $this->value = $value;
        }

        return $this;
    }

    public function isCellType($value): bool
    {
        return $value == $this->value;
    }

}