<?php
declare(strict_types=1);

namespace Game;

final class TicTacToeBoard
{
    private $game;
    private $fields;

    public function __construct(Game $game)
    {
        $this->game = $game;
        for ($i=0; $i < 3; $i++) { 
            for ($j=0; $j < 3; $j++) { 
                $this->fields[$i][$j] = new TicTacToeField;
            }
        }
    }

    public function getFieldFor(Coordinates $coordinates): TicTacToeField
    {
        $x = $coordinates->getHorizontalCoordinate();
        $y = $coordinates->getVerticalCoordinate();
        return $this->fields[$x][$y];
    }

    public function claimField(Coordinates $coordinates, TicTacToePlayer $player): void
    {
        $this->getFieldFor($coordinates)->claim($player);
        $this->checkBoardState($coordinates, $player);
    }

    public function checkBoardState(Coordinates $coordinates, TicTacToePlayer $player): void
    {
        // is full row claimed by this player?
        $fullRowClaimed = true;
        foreach ($this->getRowFieldsFor($coordinates) as $fieldInRow) {
            if (!$fieldInRow->isClaimedByPlayer($player)) {
                $fullRowClaimed = false;
                break;
            }
        }
        if ($fullRowClaimed) {
            $this->game->setWinner($player);
            $this->game->end();
        }

        // is full column claimed by this player?
        $fullColumnClaimed = true;
        foreach ($this->getColumnFieldsFor($coordinates) as $fieldInColumn) {
            if (!$fieldInColumn->isClaimedByPlayer($player)) {
                $fullColumnClaimed = false;
                break;
            }
        }
        if ($fullColumnClaimed) {
            $this->game->setWinner($player);
            $this->game->end();
        }

        // is descending diagonal claimed by this player?
        $descendingDiagonalClaimed = true;
        try {
            foreach ($this->getDescendingDiagonalFieldsFor($coordinates) as $fieldInDiagonal) {
                if (!$fieldInDiagonal->isClaimedByPlayer($player)) {
                    $descendingDiagonalClaimed = false;
                    break;
                }
            }
            if ($descendingDiagonalClaimed) {
                $this->game->setWinner($player);
                $this->game->end();
            }
        } catch (NotPartOfDiagonalException $e) {}

        // is descending diagonal claimed by this player?
        $ascendingDiagonalClaimed = true;
        try {
            foreach ($this->getAscendingDiagonalFieldsFor($coordinates) as $fieldInDiagonal) {
                if (!$fieldInDiagonal->isClaimedByPlayer($player)) {
                    $ascendingDiagonalClaimed = false;
                    break;
                }
            }
            if ($ascendingDiagonalClaimed) {
                $this->game->setWinner($player);
                $this->game->end();
            }
        } catch (NotPartOfDiagonalException $e) {}

        if ($this->allFieldsAreClaimed()) {
            $this->game->end();
        }
    }

    public function allFieldsAreClaimed(): bool
    {
        $allFieldsAreClaimed = true;
        for ($i=0; $i < 3; $i++) { 
            for ($j=0; $j < 3; $j++) {
                if (!$this->getFieldFor(new Coordinates($i, $j))->isClaimed()) {
                    $allFieldsAreClaimed = false;
                    break;
                }
            }
        }
        return $allFieldsAreClaimed;
    }

    public function getRowFieldsFor(Coordinates $coordinates): array
    {
        $rowFields = [];
        for ($i=0; $i < 3; $i++) { 
            $rowFields[] = $this->getFieldFor(new Coordinates($i, $coordinates->getVerticalCoordinate()));
        }
        return $rowFields;
    }

    public function getColumnFieldsFor(Coordinates $coordinates): array
    {
        $columnFields = [];
        for ($i=0; $i < 3; $i++) { 
            $columnFields[] = $this->getFieldFor(new Coordinates($coordinates->getHorizontalCoordinate(), $i));
        }
        return $columnFields;
    }

    public function getDescendingDiagonalFieldsFor(Coordinates $coordinates): array
    {
        // hacky hard coded solution for this. dynamic logic is quite complex
        $descendingDiagonalFields = [];
        $descendingDiagonalCoordinates = [
            new Coordinates(0,0),
            new Coordinates(1,1),
            new Coordinates(2,2),
        ];
        $isPartOfDiagonal = false;
        foreach ($descendingDiagonalCoordinates as $diagonalCoordinates) {
            if ($diagonalCoordinates->is($coordinates)) {
                $isPartOfDiagonal = true;
                break;
            }
        }
        if (!$isPartOfDiagonal) {
            throw new NotPartOfDiagonalException;
        }
        foreach ($descendingDiagonalCoordinates as $diagonalCoordinates) {
            $descendingDiagonalFields[] = $this->getFieldFor($diagonalCoordinates);
        }
        return $descendingDiagonalFields;
    }

    public function getAscendingDiagonalFieldsFor(Coordinates $coordinates): array
    {
        // hacky hard coded solution for this. dynamic logic is quite complex
        $ascendingDiagonalFields = [];
        $ascendingDiagonalCoordinates = [
            new Coordinates(0,2),
            new Coordinates(1,1),
            new Coordinates(2,0),
        ];
        $isPartOfDiagonal = false;
        foreach ($ascendingDiagonalCoordinates as $diagonalCoordinates) {
            if ($diagonalCoordinates->is($coordinates)) {
                $isPartOfDiagonal = true;
                break;
            }
        }
        if (!$isPartOfDiagonal) {
            throw new NotPartOfDiagonalException;
        }
        foreach ($ascendingDiagonalCoordinates as $diagonalCoordinates) {
            $ascendingDiagonalFields[] = $this->getFieldFor($diagonalCoordinates);
        }
        return $ascendingDiagonalFields;
    }
}