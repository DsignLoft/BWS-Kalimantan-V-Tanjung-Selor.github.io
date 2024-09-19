$(document).ready(function () {
  // pembulatan
  (function () {
    /**
     * Decimal adjustment of a number.
     *
     * @param {String}  type  The type of adjustment.
     * @param {Number}  value The number.
     * @param {Integer} exp   The exponent (the 10 logarithm of the adjustment base).
     * @returns {Number} The adjusted value.
     */
    function decimalAdjust(type, value, exp) {
      // If the exp is undefined or zero...
      if (typeof exp === "undefined" || +exp === 0) {
        return Math[type](value);
      }
      value = +value;
      exp = +exp;
      // If the value is not a number or the exp is not an integer...
      if (isNaN(value) || !(typeof exp === "number" && exp % 1 === 0)) {
        return NaN;
      }
      // Shift
      value = value.toString().split("e");
      value = Math[type](+(value[0] + "e" + (value[1] ? +value[1] - exp : -exp)));
      // Shift back
      value = value.toString().split("e");
      return +(value[0] + "e" + (value[1] ? +value[1] + exp : exp));
    }

    // Decimal ceil
    if (!Math.ceil10) {
      Math.ceil10 = function (value, exp) {
        return decimalAdjust("ceil", value, exp);
      };
    }
  })();

  // switch bahasa
  $("#language").change(function () {
    let lang = $("#language option:selected").val();
    // console.log(lang);
    switch (lang) {
      case "id":
        $(location).attr("href", "lang/id");
        break;
      case "en":
        $(location).attr("href", "lang/en");
        break;
    }
  });

  $(".select2").select2({
    theme: "bootstrap4",
  });

  let min_ukuran;
  if (typeof kategori != "undefined") {
    min_ukuran = kategori;
  } else {
    min_ukuran = 0;
  }
  // preview image for thumbnail
  $(document).on("change", ".upload", function () {
    let index = $(this).data("design");
    if ($(this)[0].files) {
      function output(msg) {
        // Response
        var m = document.getElementById("messages" + index);
        m.innerHTML = msg;
      }
      var check_ext = $(this).val().split(".").pop().toLowerCase();
      var file = $("#file-upload" + index)[0].files[0];
      output("<strong>" + file.name + "</strong>");
      console.log(file.size);
      document.getElementById("start" + index).classList.add("hidden");
      document.getElementById("response" + index).classList.remove("hidden");
      document.getElementById("notimage" + index).classList.add("hidden");
      document.getElementById("file-image" + index).classList.remove("hidden");
      if (check_ext == "jpg" || check_ext == "jpeg" || check_ext == "png") {
        var reader = new FileReader();

        reader.onload = (e) => {
          $("#file-image" + index).attr("src", e.target.result);
        };

        reader.readAsDataURL($(this)[0].files[0]);
      } else if (check_ext == "tif") {
        $("#file-image" + index).attr("src", "/files/tiff.png");
      } else if (check_ext == "pdf") {
        $("#file-image" + index).attr("src", "/files/pdf.png");
      } else if (check_ext == "zip" || check_ext == "rar") {
        $("#file-image" + index).attr("src", "/files/logo_rar.png");
      } else {
        document.getElementById("start" + index).classList.remove("hidden");
        document.getElementById("response" + index).classList.add("hidden");
        document.getElementById("notimage" + index).classList.remove("hidden");
        document.getElementById("file-image" + index).classList.add("hidden");
        return alert("File harus berekstensi .jpg, .jpeg, .png, .pdf, .tif (Bisa berupa file kompres .zip atau .rar)");
      }
    }
  });

  // tooltip dan preview bukti tf
  $('[data-toggle="tooltip"]').tooltip({
    delay: {
      show: 0,
      hide: 0,
    },
  });
  $("#unggah").on("change", function () {
    if ($(this)[0].files[0]) {
      var check_ext = $(this).val().split(".").pop().toLowerCase();
      if (check_ext == "jpg" || check_ext == "jpeg" || check_ext == "png") {
        var reader = new FileReader();

        reader.onload = (e) => {
          $("#upload-preview").attr("src", e.target.result);
        };

        reader.readAsDataURL($(this)[0].files[0]);
      } else {
        $("#unggah").val("");
        return alert("File harus gambar berekstensi .jpg, .jpeg dan .png");
      }
    }
  });
  $(".inputfile").on("change", function () {
    let design = $(this).data("design");
    if ($(this)[0].files[0]) {
      var reader = new FileReader();
      reader.onload = (e) => {
        $("#upload-preview" + design).attr("src", e.target.result);
      };
      reader.readAsDataURL($(this)[0].files[0]);
    }
  });
  
      // Loaded via <script> tag, create shortcut to access PDF.js exports.
    var pdfjsLib = window["pdfjs-dist/build/pdf"];
    // The workerSrc property shall be specified.
    
    if (typeof pdfjsLib !== 'undefined') {
        pdfjsLib.GlobalWorkerOptions.workerSrc =
            "https://mozilla.github.io/pdf.js/build/pdf.worker.js";
    } else {
        console.error("pdfjsLib is undefined. What's wrong?");
    }

    $(".inputfile").on("change", function (e) {
        let design = $(this).data("design");
        var file = e.target.files[0];
        if (file.type == "application/pdf") {
            var fileReader = new FileReader();
            fileReader.onload = function () {
                var pdfData = new Uint8Array(this.result);
                // Using DocumentInitParameters object to load binary data.
                var loadingTask = pdfjsLib.getDocument({ data: pdfData });
                loadingTask.promise.then(
                    function (pdf) {
                        console.log("PDF loaded");

                        // Fetch the first page
                        var pageNumber = 1;
                        pdf.getPage(pageNumber).then(function (page) {
                            console.log("Page loaded");

                            var scale = 1;
                            var viewport = page.getViewport({ scale: scale });

                            // Prepare canvas using PDF page dimensions
                            var canvas = $("#pdfViewer" + design)[0];
                            var context = canvas.getContext("2d");
                            canvas.height = viewport.height;
                            canvas.width = viewport.width;

                            // Render PDF page into canvas context
                            var renderContext = {
                                canvasContext: context,
                                viewport: viewport,
                            };
                            var renderTask = page.render(renderContext);
                            renderTask.promise.then(function () {
                                console.log("Page rendered");
                            });
                        });
                    },
                    function (reason) {
                        // PDF loading error
                        console.error(reason);
                    }
                );
            };
            fileReader.readAsArrayBuffer(file);
        }
    });
});
