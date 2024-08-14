if (!$.cookie("userid")) {
  location.replace("/login");
}
if ($.cookie("usertype")) {
  if ($.cookie("usertype") !== "Incharge") {
    if ($.cookie("usertype") === "Admin") {
      location.replace("/admin/");
    } else if ($.cookie("usertype") === "Visitor") {
      location.replace("/index.html");
    }
  }
}
