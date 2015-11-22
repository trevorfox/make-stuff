<?php include "header.php";
  $title = "The Ifinite Internet with Recursive iframes";
  $desc = "Recursion is basically self referencing instructions of definition. For instance, if you asked me &ldquo;How do you make a peanut butter and jelly sandwich and I gave you the following instructions:</p>";
  echo writeMetaData($title, $desc , "10/18/2015");
 ?>

<!-- THIS IS WHERE THE MAGIC HAPPENS -->
<script>
var game;

function threeOfAKind(squares){
  for (var i = 0; i < squares.length; i++){
    if( squares[i].value === "" || squares[i].value !== squares[0].value)
      return false;
    } 
  return true;
}

function blink() {
    var elem = $(this);
    var colors = ["aquamarine","blue","pink"];
    setInterval(function() {
        if (elem.css('visibility') === 'hidden') {
            elem.css('visibility', 'visible');
            elem.css('color', colors[Math.floor(Math.random() * colors.length)])
        } else {
            elem.css('visibility', 'hidden');
        }    
    }, 100);
};

var Mark = function(){
  this.color = 'gold'
  this.reset = function(){ this.state = Math.random() > 0.5 ? "x" : "o"; };
  this.switch = function(){
    this.state = this.state === "x" ?  "o" : "x";
    this.color = this.color === "gold" ? "white" : "gold";
  };
  this.reset();
};

var Square = function(row,col,game){  
  var square = this;
  this.game = game;
  this.face = $('<div class="square bg"><div class="content"></div></div>');
  this.face.square = square;
  this.rowN = row;
  this.colN = col;
  this.value = '';
  this.face.data({ square: square });
  this.face.addClass("row" + this.rowN);
  this.face.addClass("col" + this.colN);

  this.clear = function(){ this.face.text(""); };

  this.mark = function(){
      this.value = this.game.mark.state;
      this.face.children(".content").text(this.value).css('color', this.game.mark.color);
      this.face.data("mark",this.value);
  };  
  
  this.face.click(function(){
    if ( $(this).data().square.value === "" ){
      $(this).data().square.mark();
      $(this).data().square.game.check();
      $(this).data().square.game.mark.switch();
    }
  });

};

var Row = function(rowN,game){
  this.number = rowN;
  this.game = game;
  this.squares = this.game.board[rowN];
  this.same = function(){
    if( threeOfAKind(this.squares)){
      $(".row" + rowN + " .content").each(blink);
      return true;
    }
  };
};

var Column = function(colN,game){
  this.number = colN;
  this.game = game;
  this.squares = this.game.board.map(function(row){ return row[colN] });
  this.same = function(){
    console.log(threeOfAKind(this.squares))
    if( threeOfAKind(this.squares)){
      $(".col" + colN + " .content").each(blink);
      return true;
    }
  };
};

var Diagonal = function(diagN, squares,game){
  this.game = game;
  this.squares = squares;  
  for (var i = 0; i < squares.length; i++){
    squares[i].face.addClass("diag" + diagN)
  }
  this.same = function(){
    console.log(threeOfAKind(this.squares))
    if( threeOfAKind(this.squares)){
      $(".diag" + diagN + " .content").each(blink);
      return true;
    }
  };
}

var Game = function(){
  var game = this;
  this.mark = new Mark();
  this.board = (function(){
    var square, row, grid = [];
    var gameFace = $("#gameboard");
    for (var r = 0; r < 3; r++){
      row = [];
      for (var c = 0; c < 3; c++){
        square = new Square(r,c,game);
        row.push(square);
        gameFace.append(square.face);
      }
      grid.push(row);
    }
    return grid;
  }());

  this.columns = [new Column(0,game), new Column(1,game), new Column(2,game)];
  this.rows = [new Row(0,game), new Row(1,game), new Row(2,game)];
  this.diagonals = [ 
    new Diagonal( 0, [this.board[0][0], this.board[1][1], this.board[2][2]], game ),
    new Diagonal( 1, [this.board[0][2], this.board[1][1], this.board[2][0]], game )
  ];
  this.lines = this.columns.concat(this.rows).concat(this.diagonals);

  this.check = function(){
    for (var i = 0; i < this.lines.length; i++){
      if(this.lines[i].same()){
        if (this.winner === undefined){
          this.winner = this.mark.state;
          $("#winner h3").text(this.mark.state.toUpperCase() + " is the Winner!");
        }
      };
    }
  }
};

$(document).ready(function(){
  game = new Game();
  console.log(game)
});

</script>

<link href="./css/game.css" rel="stylesheet">
<!-- <script type="text/javascript" src="./js/game.js"></script>
 -->
<div class="container">
  <div class="row">
    <div class="col-md-12 col-centered">
      <div id="gameboard"></div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <div id="winner"><h3></h3></div>
    </div>
  </div>
</div>

<!-- END MAGIC -->
<?php include "footer.php"; ?>



