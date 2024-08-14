if (!$.cookie("userid")) {
  location.replace("/login");
}
if ($.cookie("usertype")) {
  if ($.cookie("usertype") !== "Admin") {
    if ($.cookie("usertype") === "Incharge") {
      location.replace("/incharge/");
    } else if ($.cookie("usertype") === "Visitor") {
      location.replace("/index.html");
    }
  }
}
