$(document).ready(function () {
    if (window.matchMedia("(max-width: 768px)").matches) {
        $("#lihat_profile").show();
    }

    $(".submit").click(function () {
        $(".myform" + $(this).data("payment")).submit();
    });
    $(".submit_batal").click(function () {
        let r = confirm("Delete invoice ?");
        if (r == true) {
            console.log($(this).data("delete"));
            $(".form_batal" + $(this).data("cancel")).submit();
        } else {
            console.log("CANCEL");
        }
    });
    $(".img-tf").hide();
    $(".toggle-tf").on("click", function () {
        $(".img-tf").slideToggle();
        $(".bukti-tf").toggleClass(
            "fas fa-chevron-up bukti-tf fas fa-chevron-down bukti-tf"
        );
    });

    $(".status_order").on("click", function () {
        $(`#status${$(this).data("order")}`).slideToggle("fast");
    });

    $("#lihat_profile").on("click", function () {
        $(".profile-cust").slideToggle("fast");
    });
});

function copyToClipboard(element) {
    let text = $(element).text().replace(/\D/g, "");
    var $temp = $("<input>");
    $("body").append($temp);
    $temp.val(text).select();
    $temp.focus();
    document.execCommand("copy");
    $temp.remove();
    alert("Teks disalin");
}
