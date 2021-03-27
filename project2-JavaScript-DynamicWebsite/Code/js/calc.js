function input(sum) {
    var x = document.getElementById("result");
    var y = document.getElementById("Previous");
    x.value += sum;
    y.innerHTML += sum;
  }
  function factorial(fact) {
    if (Number.isInteger(fact)) {
      if (fact < 2) return 1;
      return fact * factorial(fact - 1);
    }
  }
  function leftParen() {
    var x = document.getElementById("result");
    var y = document.getElementById("Previous");
    x.value += "(";
    y.innerHTML += (/[\d)IE]/.test(y.innerHTML.slice(-1))) ?
      " * (" : "(";
  }
  function multOrDiv(Num) {
    var x = document.getElementById("result");
    var y = document.getElementById("Previous");
    if (Num == "mult") {
      x.value += "\u00D7";
      y.innerHTML += "*";
    } else {
      x.value += "\u00F7";
      y.innerHTML += "/"
    }
  }
 
  function ac() {
    var x = document.getElementById("result");
    var y = document.getElementById("Previous");
    x.value = y.innerHTML = "  ";
  }
  function equal() {
    var x = document.getElementById("result");
    var y = document.getElementById("Previous");
    var z = document.getElementById("Current");
    for (var i = 0; i < x.value.split("(").length - x.value.split(")").length; i++) {
      y.innerHTML += ")";
    }
    if (y.innerHTML != "") {
      x.value = y.innerHTML = z.innerHTML = eval(y.innerHTML
        .replace(/(\d+\.?\d*)\!/g, "factorial($1)")
        .replace(/(\(?[^(]*\)?)\^(\(?.*\)?)/, "Math.pow($1, $2)")
      );
    }
    if (!isFinite(x.value)) x.value = "Error!";
  }
  function absolute() {
    var x = document.getElementById("result");
    x.value = Math.abs(x.value)
  }

