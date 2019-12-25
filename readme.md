# game

## run tests
vendor\bin\phpunit tests
vendor\bin\phpunit tests --filter specificTest

## user stories
- a game has players
- players are registered to the game
- there is a minimum/maximum amount of players per game
- players should not be able to do anything outside of the game
- a player can only be registered to the game if it has not yet started
- a player can only make game actions if the game has started
- a game can end
- a game, that has ended, has a result (i.e. a winner)