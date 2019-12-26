# game

## run tests
- `vendor\bin\phpunit tests`
- `vendor\bin\phpunit tests --filter specificTest`

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
- exactly 2 players
- game board of 3x3 fields
- players take alternating turns
- starting player is always the first (could be randomized)
- players are claiming fields (by putting "x"s and "o"s)
- fields can be empty or have an "x" or an "o"
- each turn a player claims exactly one field
- game ends when all fields are claimed or a player has completed row/column/diagonal
- if when the game ends a player has completed a row/column/diagonal, that player wins

# TODO
- is there some interface that can make objects comparable?
  - https://github.com/Fleshgrinder/php-comparable, but for now i'll just use `equals()` method
- encapsulate game state/progress(?) into own class
  - Process class
- define a general handle for actions that can only be taken (by players) when game is in progress
- encapsulate board functionality into own class
- distribute classes into folders
- update model diagrams
- check user story completeness
- check test coverage (maybe with a tool)