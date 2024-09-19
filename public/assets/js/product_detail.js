$(document).ready(function () {
    $("#img").on("click", function () {
        let src = $(this).attr("src");
        $(".content").attr("src", src);
        $(".modal-img-zoom").css("display", "block");
    });
    $(".close-modal-zoom").on("click", function () {
        $(".modal-img-zoom").css("display", "none");
    });

    $(".thumb2").on("click", function () {
        console.log("aaa");
        $("#img").attr("src", $(this).attr("src"));
    });

    $(".submit").click(function () {
        let note = $("#product_note").val();
        if ($("#term").is(":checked") === true) {
            if (!note) {
                if (confirm("Mohon untuk di berikan catatan ukuran atau catatan finishing , bila tidak ada catatan akan kami proses cetak sesuai ukuran desain") === true) {
                    $("#formDetail").submit();
                } else {
                    console.log(note);
                }
            } else {
                $("#formDetail").submit();
            }
        } else {
            alert(`Checklist Saya telah meninjau dan menyetujui desain saya`);
        }
    });
    
    $(".tmbl-up").on("click", function () {
        $(this).css("background-color", "#e96b56");
        $(this).css("color", "#fff");
        $("#image").trigger("click");
    });

    $("#link").on("click", function () {
        $(".tmbl-up").css("background-color", "#e96c562d");
        $(".tmbl-up").css("color", "#000000");
    });

    $("#rating").on("click", function () {
        $("html, body").animate(
            {
                scrollTop: $("#ulasan-tab").offset().top,
            },
            500
        );
        $("#ulasan-tab").trigger("click");
    });
    $(".short-desc").on("click", function () {
        $("html, body").animate(
            {
                scrollTop: $("#rincian-produk").offset().top,
            },
            500
        );
        $("#rincian-produk").trigger("click");
    });

    $(".short-desc p").after(" ");
    $(".short-desc ul").after(" ");
    $(".short-desc li").after(" ");
    $(".short-desc ol").after(" ");
    $(".short-desc").find("p").contents().unwrap();
    $(".short-desc").find("ol").contents().unwrap();
    $(".short-desc").find("li").contents().unwrap();
    $(".short-desc").find("ul").contents().unwrap();
    $(".short-desc").find("span").contents().unwrap();

    // ----------------- attribute --------------------
    let harga_atb = [],
        harga = 0,
        size_price = 0,
        bahan = 0,
        qty = 0,
        qty_isi = 1,
        ukuran = 0,
        panjang = 0,
        lebar = 0,
        price = 0,
        m_range = 0,
        m_qty = 0;

    Array.prototype.max = function () {
        return Math.max.apply(null, this);
    };

    Array.prototype.min = function () {
        return Math.min.apply(null, this);
    };

    //konversi format IDR
    const rupiah = new Intl.NumberFormat("id-ID", {
        style: "currency",
        currency: "IDR",
        minimumFractionDigits: 0,
    });

    function getPrice(ranges, prices, qty) {
        let price = 0;

        for (let a = ranges.length; a >= 0; a--) {
            if (qty >= ranges[a - 1]) {
                price = prices[a];
                break;
            } else {
                price = prices[0];
            }
        }

        return price;
    }

    function hargaTotal() {
        harga = harga_atb.reduce((a, b) => a + b, 0);
        if (isNaN(harga)) {
            harga = 0;
        }
        return harga;
    }

    function hargaBahan() {
        if (size_price < 1) {
            size_price = 1;
        }
        size_price = ukuran * parseFloat(qty);
        bahan = getPrice(m_qty, m_range, size_price);
        $(`.bahan-price`).html(rupiah.format(bahan));
        return bahan * size_price;
    }

    function priceRange(r_qty, r_price) {
        let price_range = r_qty;
        let qty_range = r_price;
        let value_range = [];
        value_range.push(
            `<tr><td>1 - ${qty_range[0] - 1}</td><td>${rupiah.format(
                price_range[0]
            )}</td></tr>`
        );
        for (let a = 0; a < 4; a++) {
            value_range.push(
                `<tr><td>${qty_range[a]} - ${
                    qty_range[a + 1] - 1
                }</td><td>${rupiah.format(price_range[a + 1])}</td></tr>`
            );
        }
        value_range.push(
            `<tr><td>${qty_range[4]} - Max</td><td>${rupiah.format(
                price_range[5]
            )}</td></tr>`
        );
        value_range = value_range.join("");
        return value_range;
    }

    $("#saya-setuju").on("click", function () {
        $("#term").prop("checked", true);
    });

    $("#close-modal").on("click", function () {
        $("#term").prop("checked", false);
    });

    $("#image").on("click", function () {
        $("#link-design").val("");
    });

    // ------------------------------------------------------------------------------------------------------------------
    //atribut produk
    // --------------ukuran ATB0-------
    $("#atb0").change(function () {
        let y = $(`#atb0 option:selected`).val();
        // ----------------------------------------------------
        let v_atb = y.split(",,");
        ukuran = parseFloat(v_atb[2]);
        if (ukuran == "undefined" || ukuran == NaN) {
            ukuran = 0;
        }
        harga_atb[1] = hargaBahan();
        $(".total-harga").html(rupiah.format(hargaTotal()));
    });
    //-----------------bahan ATB1--------------------------
    $("#atb1").change(function () {
        $("#pr-bahan").remove();
        $("#title-pr-bahan").remove();
        let y = $(`#atb1 option:selected`).val();
        // -----------------------------------------------------
        let v_atb = y.split(",,");
        m_qty = JSON.parse(v_atb[4]);
        m_range = JSON.parse(v_atb[5]);
        harga_atb[1] = hargaBahan();
        $(".total-harga").html(rupiah.format(hargaTotal()));
        // ----------------table range----------------
        // ------------------------------------------------------
        let price_range = JSON.parse(v_atb[5]);
        let qty_range = JSON.parse(v_atb[4]);
        let value_range = [];
        if (price_range.max() !== price_range.min()) {
            value_range.push(
                `<tr><td>1 - ${qty_range[0] - 1}</td><td>${rupiah.format(
                    price_range[0]
                )}</td></tr>`
            );
            for (let a = 0; a < 4; a++) {
                value_range.push(
                    `<tr><td width="40%">${qty_range[a]} - ${
                        qty_range[a + 1] - 1
                    }</td><td>${rupiah.format(price_range[a + 1])}</td></tr>`
                );
            }
            value_range.push(
                `<tr><td>${qty_range[4]} - Max</td><td>${rupiah.format(
                    price_range[5]
                )}</td></tr>`
            );
            value_range = value_range.join("");
        } else {
            value_range.push(
                `<tr><td>1 - Max</td><td>${rupiah.format(
                    price_range[5]
                )}</td></tr>`
            );
            value_range = value_range.join("");
        }
        if (kategori_produk == "11") {
            $("#table-range").append(
                `<div id="title-pr-bahan" style="font-size:14px">Harga Bahan</div><table class="table shadow rounded" id="pr-bahan"><thead style="background-color: #ffffff;color:#000;text-align: left;"><tr><th>Per Meter<sup>2</sup></th><th>Harga</th></tr></thead><tbody style="background-color: #ffffff;color:#000;">${value_range}</tbody></table>`
            );
        } else {
            $("#table-range").append(
                `<div id="title-pr-bahan" style="font-size:14px">Harga Bahan</div><table class="table shadow rounded" id="pr-bahan"><thead style="background-color: #ffffff;color:#000;text-align: left;"><tr><th>Qty</th><th>Harga</th></tr></thead><tbody style="background-color: #ffffff;color:#000;">${value_range}</tbody></table>`
            );
        }
    });
    // -----------------------------------------------------------------------------------------------------------------------
    $("#panjang").on("keyup click", function () {
        panjang = $(this).val();
        if (panjang == "") {
            panjang = 0;
        }
        ukuran = panjang * lebar;
        harga_atb[1] = hargaBahan();
        $(".panjang-text").html(panjang + ` Meter`);
        $(".total-harga").html(rupiah.format(hargaTotal()));
    });

    $("#lebar").on("keyup click", function () {
        lebar = $(this).val();
        if (lebar == "") {
            lebar = 0;
        }
        ukuran = panjang * lebar;
        harga_atb[1] = hargaBahan();
        $(".lebar-text").html(lebar + ` Meter`);
        $(".total-harga").html(rupiah.format(hargaTotal()));
    });
    // -------------------ATB2-etc------------------------
    $(".atb").change(function () {
        let i = $(this).data("atb");
        $("#table-atb" + i).remove();
        $("#title-pr-atb" + i).remove();
        // let x = $(`#atb${i} option:selected`).text();
        let y = $(`#atb${i} option:selected`).val();
        // -----------------------------------------
        let v_atb = y.split(",,");
        price = getPrice(
            JSON.parse(v_atb[4]),
            JSON.parse(v_atb[5]),
            size_price
        );
        if (v_atb[0] == "Isi") {
            price = price * qty_isi;
        } else {
            price = price;
        }
        harga_atb[i] = parseFloat(price) * parseFloat(size_price);
        $(`.atb-text${i}`).html(rupiah.format(price));
        $(".total-harga").html(rupiah.format(hargaTotal()));
        // -------------------------------------table range -----------------
        let price_range = JSON.parse(v_atb[5]);
        let qty_range = JSON.parse(v_atb[4]);
        let nama_atb = $(`#atb-name${i}`).text();
        let value_range = [];
        if (price_range.max() !== price_range.min()) {
            value_range.push(
                `<tr><td>1 - ${qty_range[0] - 1}</td><td>${rupiah.format(
                    price_range[0]
                )}</td></tr>`
            );
            for (let a = 0; a < 4; a++) {
                value_range.push(
                    `<tr><td>${qty_range[a]} - ${
                        qty_range[a + 1] - 1
                    }</td><td>${rupiah.format(price_range[a + 1])}</td></tr>`
                );
            }
            value_range.push(
                `<tr><td>${qty_range[4]} - Max</td><td>${rupiah.format(
                    price_range[5]
                )}</td></tr>`
            );
            value_range = value_range.join("");
        } else {
            value_range.push(
                `<tr><td>1 - Max</td><td>${rupiah.format(
                    price_range[5]
                )}</td></tr>`
            );
            value_range = value_range.join("");
        }
        $("#range-atb" + i).append(
            `<div id="title-pr-atb${i}" style="font-size:14px">Harga ${nama_atb}</div><table class="table shadow rounded" id="table-atb${i}"><thead style="background-color: #ffffff;color:#000;text-align: left;"><tr><th  width="40%">Qty</th><th>Harga</th></tr></thead><tbody style="background-color: #ffffff;color:#000;">${value_range}</tbody></table>`
        );
    });
    // ------------------------QTY------------------------
    $("#qty_isi").on("keyup click", function () {
        let value = $(this).val();
        qty_isi = value.replace(/^(0*)/, "");
        if (qty_isi == "") {
            qty_isi = 0;
        }
        // -------------------------
        $("#atb0").trigger("change");
        $("#atb1").trigger("change");
        $("#lebar").trigger("keyup");
        $("#panjang").trigger("keyup");
        $(".atb").trigger("change");
        // if (hargaTotal() == NaN) {
        //   hargaTotal() = 0;
        // }
        $(".total-harga").html(rupiah.format(hargaTotal()));
    });
    $("#qty").on("keyup click", function () {
        let value = $(this).val();
        qty = value.replace(/^(0*)/, "");
        if (qty == "") {
            qty = 0;
        }
        $("#qty1").html(qty);
        // -------------------------
        $("#atb0").trigger("change");
        $("#atb1").trigger("change");
        $("#lebar").trigger("keyup");
        $("#panjang").trigger("keyup");
        $(".atb").trigger("change");
        // if (hargaTotal() == NaN) {
        //   hargaTotal() = 0;
        // }
        $(".total-harga").html(rupiah.format(hargaTotal()));
    });
    $("#qty").trigger("keyup");
});
