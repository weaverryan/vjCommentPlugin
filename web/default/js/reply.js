function reply(id, value){
  document.getElementById("comment_reply").value = id;
  document.getElementById("comment_reply_author").value = value;
  document.getElementById("tr_reply_author").style.display = "table-row";
  document.getElementById("tr_reply_author_delete").style.display = "table-row";
  document.location.href = document.location.toString().split("#")[0]+"#top";
}

function deleteReply(){
  document.getElementById("comment_reply").value = "";
  document.getElementById("comment_reply_author").value = "";
  document.getElementById("tr_reply_author").style.display = "none";
  document.getElementById("tr_reply_author_delete").style.display = "none";
}