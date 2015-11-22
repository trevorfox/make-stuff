var Square = function(row,col,game){  
  this.game = game;
  var square = this;
  this.face = $('<div class="square bg"><div class="content"></div></div>');
  this.face.square = square;
  this.rowN = row;
  this.colN = col;
  this.mark = '';
  this.face.data({
    col:this.colN,
    row:this.rowN,
    mark: this.mark,
    square: square
  });

  this.clear = function(){ this.face.text(""); };
  this.mark = function(){
    if ( this.mark !== ""){
      this.mark = this.game.mark.state;
      this.face.children(".content").text(this.mark);
      this.face.data("mark",this.mark);
      this.game.mark.switch();
    }
  };  
  
  this.face.click(function(){
    $(this).data().square.mark();
  });

};

var Mark = function(){
  this.reset = function(){ this.state = Math.random() > 0.5 ? "x" : "o"; };
  this.switch = function(){ this.state = this.state === "x" ?  "o" : "x"; };
  this.reset();
};

var Row = function(rowN){};

var Column = function(colN,game){
  this.game = game;
  this.number = colN;
  this.squares = this.game.board.map(function(row){
    return row[this.number]
  });
};

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
};

$(document).ready(function(){
  var game = new Game();
  console.log(game);
  var two = new Column(2,game);
})