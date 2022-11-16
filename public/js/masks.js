var element_1 = document.getElementById("num-phone");
var maskOptions_1 = {
    mask: '+{7}(000)000-00-00'
};
var mask_1 = IMask(element_1, maskOptions_1);

var element_2 = document.getElementById("num-certif");
var maskOptions_2 = {
    mask: '00000000000000'
};
var mask_2 = IMask(element_2, maskOptions_2);

var element_3 = document.getElementById("passport-num");
var maskOptions_3 = {
    mask: '000000'
};
var mask_3 = IMask(element_3, maskOptions_3);

var element_4 = document.getElementById("passport-series");
var maskOptions_4 = {
    mask: '0000'
};
var mask_4 = IMask(element_4, maskOptions_4);