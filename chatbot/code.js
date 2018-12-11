var pop = new Audio("sounds/pop.mp3");
var rs;
loadBot("chatbot.txt");

function loadBot(botUrl) {
  rs = new RiveScript()
  rs.loadFile([botUrl], on_load_success);
}

function on_load_success() {
  $("#message").removeAttr("disabled");
  $("#message").attr("placeholder", "Message");
  $("#message").focus();
  rs.sortReplies();
  getReply("start");
}

function on_load_error(err) {
  postReply(
    "There was an error loading this bot. Refresh the page please."
  );
  console.log("Loading error: " + err);
}

function sendMessage() {
  var text = $("#message").val();
  if (text.length === 0) return false;
  $("#message").val("");
  $("#dialogue").append(
    "<div class='user-row'><span class='user'>" +
      escapeHtml(text) +
      "</span></div>"
  );
  $("#dialogue").animate({ scrollTop: $("#dialogue")[0].scrollHeight }, 200);
  getReply (text);
  return false;
}

function getReply (text) {
  try {
    var reply = rs.reply("soandso", text);
    reply = reply.replace(/\n/g, "<br>");
    postReply(reply);
  } catch (e) {
    postReply(e.message + "\n" + e.line);
    console.log(e);
  }
}

function postReply(reply,delay) {
  if (!delay) delay = 800;
  var rand = Math.round(Math.random() * 10000);
  setTimeout(function() {
    $("#dialogue").append(
      "<div class='bot-row' id='" +
        rand +
        "'><span class='bot'>" +
        reply +
        "</span></div>"
    );
    pop.play();
    $("#" + rand).hide().fadeIn(200);
    $("#dialogue").animate({ scrollTop: $("#dialogue")[0].scrollHeight }, 200);
  }, delay);
}

function escapeHtml(text) {
  return text
    .replace(/&/g, "&amp;")
    .replace(/</g, "&lt;")
    .replace(/>/g, "&gt;");
}
