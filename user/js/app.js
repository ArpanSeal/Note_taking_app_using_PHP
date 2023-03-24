$(document).ready(function () {
  let addTxt = document.getElementById("addTxt");
  let charLimit = document.getElementById("charLimit");
  let limit = 200;
  let addTitle = document.getElementById("addTitle");
  let charLimitTitle = document.getElementById("charLimitTitle");
  let limitTitle = 15;
  charLimit.textContent = 0 + "/" + limit;
  charLimitTitle.textContent = 0 + "/" + limitTitle;

  addTxt.addEventListener("input", function () {
    let txtLength = addTxt.value.length;
    let titleLength = addTitle.value.length;
    charLimit.textContent = txtLength + "/" + limit;
  });

  addTitle.addEventListener("input", function () {
    let txtLength = addTxt.value.length;
    let titleLength = addTitle.value.length;
    charLimitTitle.textContent = titleLength + "/" + limitTitle;
  });

  let search = document.getElementById("search");
  search.addEventListener("input", function (e) {
    let inputVal = search.value.toLowerCase();
    let noteCards = document.getElementsByClassName("noteCard");
    Array.from(noteCards).forEach(function (element) {
      let cardTitle = element.getElementsByClassName("card-title")[0].innerText;
      let cardText = element.getElementsByClassName("card-text")[0].innerText;
      if (
        cardTitle.toLowerCase().includes(inputVal) ||
        cardText.toLowerCase().includes(inputVal)
      ) {
        element.style.display = "block";
      } else {
        element.style.display = "none";
      }
    });
  });

  $("#addBtn").click(function () {
    let text = $("#addTxt").val();
    if (text == "") {
      swal({
        title: "Ooops!",
        text: "Note section cannot be empty!",
        icon: "error",
        buttons: true,
      });
    } else {
      let title = $("#addTitle").val();
      $.ajax({
        type: "POST",
        url: "code.php",
        data: {
          title: title,
          text: text,
        },
        success: function (response) {
          if (response == "success") {
            swal({
              title: "Hurray!",
              text: "Your Note has been saved successfully.",
              icon: "success",
              button: false,
              timer: 2000,
            }).then((value) => {
              addTitle.value = "";
              addTxt.value = "";
              charLimit.textContent = 0 + "/" + limit;
              charLimitTitle.textContent = 0 + "/" + limitTitle;
              location.reload();
            });
          } else {
            swal({
              title: "Heyy!",
              text: response,
              icon: "error",
              button: true,
            });
          }
        },
      });
    }
  });
});
