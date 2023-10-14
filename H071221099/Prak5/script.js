// let balance = document.querySelector("#yourBalance");
let balance = 1000;
let getBet = document.getElementById("bet");

// const getBet = document.getElementById("bet");
// let balanceInformation = "<p>Balance: " + balance + "<p>";
// console.log(balance-bet)

let dealerSum = 0;
let yourSum = 0;

let dealerAceCount = 0;
let yourAceCount = 0;

let hidden;
let deck;

let canHit = true; //allows the player (you) to draw while yourSum <= 21

// const mySumsElement = document.getElementsById("your-sum")[0];
// const botSumsElement = document.getElementsById("dealer-sum")[0];

window.onload = function () {
  //memuat website
  // let yourBalance = document.getElementById("yourBalance");
  // yourBalance.innerText = balance;
  console.log(getBet);
  let gethitButton = document.getElementById("hit");
  gethitButton.style.display = "none";
  let getStayButton = document.getElementById("stay");
  getStayButton.style.display = "none";

  document.getElementById("start").addEventListener("click", start);
};

function start() {
  let getBet = document.getElementById("bet");
  console.log(getBet.value);

  if (getBet.value === "") {
    alert("Judi ki dulu");
    return;
  }

  let getStartButton = document.getElementById("start");
  getStartButton.style.display = "none";

  getBet.style.display = "none";
  let getBetLabel = document.getElementById("betLabel");
  getBetLabel.style.display = "none";

  let gethitButton = document.getElementById("hit");
  gethitButton.style.display = "flex";

  let getStayButton = document.getElementById("stay");
  getStayButton.style.display = "flex";

  buildDeck();
  shuffleDeck();
  startGame();
}

function buildDeck() {
  let values = [
    "A",
    "2",
    "3",
    "4",
    "5",
    "6",
    "7",
    "8",
    "9",
    "10",
    "J",
    "Q",
    "K",
  ];
  let types = ["C", "D", "H", "S"];
  deck = [];

  for (let i = 0; i < types.length; i++) {
    for (let j = 0; j < values.length; j++) {
      //1x perulangan pada types dia melakukan sebanyak value
      deck.push(values[j] + "-" + types[i]); //A-C -> K-C, A-D -> K-D
    }
  }
  // console.log(deck);
}

function shuffleDeck() {
  for (let i = 0; i < deck.length; i++) {
    let j = Math.floor(Math.random() * deck.length); // (0-1) * 52 => (0-51.9999)
    let temp = deck[i];
    deck[i] = deck[j];
    deck[j] = temp;
  }
  console.log(deck);
}

function startGame() {
  for (let i = 0; i < 2; i++) {
    let cardImg = document.createElement("img");
    let card = deck.pop();
    cardImg.src = "./cards/" + card + ".png";
    dealerSum += getValue(card);
    dealerAceCount += checkAce(card);
    document.getElementById("dealer-cards").append(cardImg);
    console.log(dealerSum);
  }
  // let cardImg = document.createElement("img");
  // let card = deck.pop();
  // cardImg.src = "./cards/" + card + ".png";
  // dealerSum += getValue(card);
  // dealerAceCount += checkAce(card);
  // document.getElementById("dealer-cards").append(cardImg);
  // console.log(dealerSum);

  for (let i = 0; i < 2; i++) {
    let cardImg = document.createElement("img");
    let card = deck.pop();
    cardImg.src = "./cards/" + card + ".png";
    yourSum += getValue(card);
    yourAceCount += checkAce(card);
    document.getElementById("your-cards").append(cardImg);
  }

  console.log(yourSum);
  document.getElementById("dealer-sum").innerText = dealerSum;
  document.getElementById("your-sum").innerText = yourSum;
  document.getElementById("hit").addEventListener("click", hit);
  document.getElementById("stay").addEventListener("click", stay);
}

function hit() {
  if (!canHit) {
    return;
  }

  let cardImg = document.createElement("img");
  let card = deck.pop();
  cardImg.src = "./cards/" + card + ".png";
  yourSum += getValue(card);
  yourAceCount += checkAce(card);
  document.getElementById("your-cards").append(cardImg);

  if (reduceAce(yourSum, yourAceCount) > 21) {
    //A, J, 8 -> 1 + 10 + 8
    canHit = false;
  }
  // document.getElementById("dealer-sum").innerText = dealerSum;
  document.getElementById("your-sum").innerText = yourSum;
}

function stay() {
  while (dealerSum < 17) {
    //<img src="./cards/4-C.png">
    let cardImg = document.createElement("img");
    let card = deck.pop();
    cardImg.src = "./cards/" + card + ".png";
    dealerSum += getValue(card);
    dealerAceCount += checkAce(card);
    document.getElementById("dealer-cards").append(cardImg);
  }
  dealerSum = reduceAce(dealerSum, dealerAceCount);
  yourSum = reduceAce(yourSum, yourAceCount);

  let getBet = document.getElementById("bet");
  let betvalue = parseInt(getBet.value);

  canHit = false;
  let message = "";

  console.log(dealerSum);

  if (yourSum > 21) {
    message = "You Lose!";
    balance = balance - betvalue;
  } else if (dealerSum > 21) {
    message = "You win!";
    balance = balance + betvalue;
  } else if (yourSum == dealerSum) {
    message = "Tie!";
  } else if (yourSum > dealerSum) {
    message = "You Win!";
    balance = balance + betvalue;
  } else if (yourSum < dealerSum) {
    message = "You Lose!";
    balance = balance - betvalue;
  }
  console.log(balance);

  // let yourBalance = document.getElementById("yourBalance");
  let getTryagainButton = document.getElementById("tryAgain");
  getTryagainButton.removeAttribute("style");

  let getHitButton = document.getElementById("hit");
  getHitButton.style.display = "none";

  let getStayButton = document.getElementById("stay");
  getStayButton.style.display = "none";

  let betInput = document.getElementById("bet");
  betInput.removeAttribute("style");

  document.getElementById("yourBalance").innerText = balance;
  document.getElementById("dealer-sum").innerText = dealerSum;
  document.getElementById("your-sum").innerText = yourSum;
  document.getElementById("results").innerText = message;

  document.getElementById("tryAgain").addEventListener("click", tryAgain);
}

function tryAgain() {
  let getDealercards = document.getElementById("dealer-cards");
  let getDealercards_img = getDealercards.getElementsByTagName("img");

  for (let i = getDealercards_img.length - 1; i >= 0; i--) {
    getDealercards_img[i].remove();
  }

  getDealercards.innerHTML = '<img id="hidden" src="./cards/BACK.png">';

  let getYourcards = document.getElementById("your-cards");
  let getYourcards_img = getYourcards.getElementsByTagName("img");
  for (let i = getYourcards_img.length - 1; i >= 0; i--) {
    getYourcards_img[i].remove();
  }

  let getHitButton = document.getElementById("hit");
  getHitButton.removeAttribute("style");

  let getStayButton = document.getElementById("stay");
  getStayButton.removeAttribute("style");

  let getTryagainButton = document.getElementById("tryAgain");
  getTryagainButton.style.display = "none";

  let betInput = document.getElementById("bet");
  betInput.style.display = "none";

  let getResults = document.getElementById("results");
  getResults.innerText = "";

  // document.getElementsById("your-sum")[0];
  // document.getElementsById("dealer-sum")[0];
  document.getElementById("dealer-sum").innerText = "";
  document.getElementById("your-sum").innerText = "";

  dealerSum = 0;
  dealerAceCount = 0;
  yourSum = 0;
  yourAceCount = 0;
  canHit = true;

  buildDeck();
  shuffleDeck();
  startGame();
}

function getValue(card) {
  let data = card.split("-"); // "4-C" -> ["4", "C"]
  let value = data[0];

  if (isNaN(value)) {
    //A J Q K
    if (value == "A") {
      return 11;
    }
    return 10;
  }
  return parseInt(value);
}

function checkAce(card) {
  if (card[0] == "A") {
    return 1;
  }
  return 0;
}

function reduceAce(playerSum, playerAceCount) {
  while (playerSum > 21 && playerAceCount > 0) {
    playerSum -= 10;
    playerAceCount -= 1;
  }
  return playerSum;
}
