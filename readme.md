# game

## run tests
vendor\bin\phpunit tests

## user stories
- a game has players
- players are registered to the game
- players should not be able to do anything outside of the game
- a player can only be registered to the game if it has not yet started
- a player can only make game actions if the game has started. game actions:
  - buy product
- a game can end
- a game, that has ended, has a winner(s)
- if a game has started or ended, i will call game state
- the winner(s) is the player with the most product