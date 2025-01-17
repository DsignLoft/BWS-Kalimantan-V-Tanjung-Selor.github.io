$(document).ready(function () {
  $(".inputfile").each(function () {
    var $input = $(this),
      $label = $input.next("label"),
      labelVal = $label.html(),
      text_file = $(this).data("design");
    console.log($input);

    $input.on("change", function (e) {
      var fileName = "";

      if (this.files && this.files.length > 1) fileName = (this.getAttribute("data-multiple-caption") || "").replace("{count}", this.files.length);
      else if (e.target.value) fileName = e.target.value.split("\\").pop();

      if (fileName) $("#text-file" + text_file).html(fileName);
    });

    // Firefox bug fix
    $input
      .on("focus", function () {
        $input.addClass("has-focus");
      })
      .on("blur", function () {
        $input.removeClass("has-focus");
      });
  });
});
