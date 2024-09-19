let rupiah = new Intl.NumberFormat("id-ID", {
    style: "currency",
    currency: "IDR",
    minimumFractionDigits: 0,
});

let subtotal = $("#total_temp").val();
$(".alamat-outlet").hide();
$(".kurir").hide();
$("#pickup_method").val("").change();

$("#pickup_method").on("change", function () {
    console.log($(this).val());
    let val = $(this).val();
    if (val == "Self-pickup") {
        $(".alamat-outlet").show();
        $(".kurir").hide();
        $("#ongkos-kirim").val("").change();
        $("#harga_ongkir").html(rupiah.format(0));
        $("#biaya").html(rupiah.format(subtotal));
    } else {
        $("#alamat-outlet").val("").change();
        $(".alamat-outlet").hide();
        $(".kurir").show();
    }
});

$("#alamat-outlet").on("change", function () {
    let val = $(this).val();
    console.log(val);
    if (val == "Indoprinting Durian") {
        $("#payment_method").append(
            $("<option>", {
                value: "Cash",
                text: "Cash",
            })
        );
    } else {
        $("#payment_method option[value='Cash']").remove();
    }
});

$("#alamat-outlet2").on("change", function () {
    let id_outlet = $(this).val();
    console.log(id_outlet);
    window.location.replace("/change-address-from/" + id_outlet);
});

$("#ongkos-kirim").change(function () {
    let val = $(`#ongkos-kirim option:selected`).val();
    // ----------------------------------------------------
    let value = val.split(",,");
    if (value[3] == "Gosend") {
        $("#confirmAlamat").modal("show");
    }
    let ongkir = parseFloat(value[1]);
    if (ongkir == "undefined" || isNaN(ongkir)) {
        ongkir = 0;
    }
    let total = parseFloat(ongkir) + parseFloat(subtotal);
    $("#harga_ongkir").html(rupiah.format(ongkir));
    $("#biaya").html(rupiah.format(total));
});

$("#submit").on("click", function () {
    $("#form-checkout").submit();
});
