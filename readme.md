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
# tic tac toe game

## user stories
- like the game above
- exactly 2 players, one places "x", the other places "o"
- game board of 3x3 fields
- fields can be empty or have an "x" or an "o"
- players take alternating turns
- each turn a player may place their sign in ecactly one field
- game ends when no field is empty or one player has a horizontal row, vertical or diagonal column filled with their sign
- if when the game ends a player has a horizontal row, vertical or diagonal column filled with their sign, that player wins
