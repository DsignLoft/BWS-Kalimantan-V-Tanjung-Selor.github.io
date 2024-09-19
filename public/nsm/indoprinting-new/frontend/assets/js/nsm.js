// Dropdown Products
var showProducts = document.getElementById("show-products");
var hiddenProducts = document.getElementById("hidden-products");
var dropdownProduct = document.getElementById("dropdown-products");
showProducts.onclick = function(){
    dropdownProduct.style.display = "block";
    hiddenProducts.style.display = "block";
    showProducts.style.display = "none";
}
hiddenProducts.onclick = function(){
    dropdownProduct.style.display = "none";
    hiddenProducts.style.display = "none";
    showProducts.style.display = "block";
}

// Dropdown Templates
var showTemplates = document.getElementById("show-templates");
var hiddenTemplates = document.getElementById("hidden-templates");
var dropdownTemplates = document.getElementById("dropdown-templates");
showTemplates.onclick = function(){
    dropdownTemplates.style.display = "block";
    hiddenTemplates.style.display = "block";
    showTemplates.style.display = "none";
}
hiddenTemplates.onclick = function(){
    dropdownTemplates.style.display = "none";
    hiddenTemplates.style.display = "none";
    showTemplates.style.display = "block";
}

// Dropdown Join
var showJoin = document.getElementById("show-join");
var hiddenJoin = document.getElementById("hidden-join");
var dropdownJoin = document.getElementById("dropdown-join");
showJoin.onclick = function(){
    dropdownJoin.style.display = "block";
    hiddenJoin.style.display = "block";
    showJoin.style.display = "none";
}
hiddenJoin.onclick = function(){
    dropdownJoin.style.display = "none";
    hiddenJoin.style.display = "none";
    showJoin.style.display = "block";
}