var a = ['','One ','Two ','Three ','Four ', 'Five ','Six ','Seven ','Eight ','Nine ','Ten ','Eleven ','Twelve ','Thirteen ','Fourteen ','Fifteen ','Sixteen ','Seventeen ','Eighteen ','Nineteen '];
var b = ['', '', 'Twenty','Thirty','Forty','Fifty', 'Sixty','Seventy','Eighty','Ninety'];

function inWords (num1,num2) {
    if ((num1 = num1.toString()).length > 9) return 'overflow';
    n = ('000000000' + num1).substr(-9).match(/^(\d{2})(\d{2})(\d{2})(\d{1})(\d{2})$/);
    if (!n) return; var str = '';
    str += (n[1] != 0) ? (a[Number(n[1])] || b[n[1][0]] + ' ' + a[n[1][1]]) + 'Billon ' : '';
    str += (n[2] != 0) ? (a[Number(n[2])] || b[n[2][0]] + ' ' + a[n[2][1]]) + 'Million ' : '';
    str += (n[3] != 0) ? (a[Number(n[3])] || b[n[3][0]] + ' ' + a[n[3][1]]) + 'Thousand ' : '';
    str += (n[4] != 0) ? (a[Number(n[4])] || b[n[4][0]] + ' ' + a[n[4][1]]) + 'Hundred ' : '';
    str += (n[5] != 0) ? ((str != '') ? ' ' : '') + (a[Number(n[5])] || b[n[5][0]] + ' ' + a[n[5][1]]) + '' : '';
    
    console.log("Mao ni: "+str);
    if (num1!=0) {
        if (num2 != null) {
            if (num1<=0) {
                return inWordsCents(num1,num2);
            }else
            if (num1==1) {
                return str+"Peso "+inWordsCents(num1,num2); 
            }else{
                return str+"Pesos "+inWordsCents(num1,num2); 
            }
        }else{
            if (num1==1) {
                return str+"Peso Only"; 
            }else{
                return str+"Pesos Only";
            }
        }
    }
}

function inWordsCents(num1,num2) {
    if ((num2 = num2.toString()).length > 9) return 'overflow';
    n = ('000000000' + num2).substr(-9).match(/^(\d{2})(\d{2})(\d{2})(\d{1})(\d{2})$/);
    if (!n) return; var str = '';
    str += (n[1] != 0) ? (a[Number(n[1])] || b[n[1][0]] + ' ' + a[n[1][1]]) + 'Billon ' : '';
    str += (n[2] != 0) ? (a[Number(n[2])] || b[n[2][0]] + ' ' + a[n[2][1]]) + 'Million ' : '';
    str += (n[3] != 0) ? (a[Number(n[3])] || b[n[3][0]] + ' ' + a[n[3][1]]) + 'Thousand ' : '';
    str += (n[4] != 0) ? (a[Number(n[4])] || b[n[4][0]] + ' ' + a[n[4][1]]) + 'Hundred ' : '';
    str += (n[5] != 0) ? ((str != '') ? ' ' : '') + (a[Number(n[5])] || b[n[5][0]] + ' ' + a[n[5][1]]) + '' : '';

    console.log(str);
    if (num1!=0) {
        if (num2<=0) {
            return "";
        }else
        if (num2==1) {
            return "and "+str+"Centavo Only";
        }else{
            return "and "+str+"Centavos Only";
        }
    }else{
        if (num2<=0) {
            return "";
        }else
        if (num2==1) {
            return str+"Centavo Only";
        }else{
            return str+"Centavos Only";
        }
    }
}

// document.getElementById('sub_g_amount_digits').onkeyup = function () {
//     $('sub_g_amount_words').value(inWords(document.getElementById('sub_g_amount_digits').value));
// };

// 
// $(document).on('change || keyup', 'input[id="sub_g_address"]', function() {
//     console.log($('#sub_g_amount_digits').val());
//     // stud_year=  $('#year option[value="'+$('#student_year').val()+'"]').data('id');
//     // console.log(stud_year);
//     // var $initvalue = parseFloat(document.getElementById('sub_g_amount_digits').value.replace(/,/g,''));
//     // console.log($initvalue);
//     // var $toeval = $initvalue.toString().split(".");
//     // console.log($toeval);
//     // var $result = "One: "+$toeval[0];
//     // console.log($result);
//     // $result = "Two: "+$toeval[1];
//     // console.log($result);
//     // $('#sub_g_amount_words').val(inWords($toeval[0],$toeval[1])).trigger('focus');
//     // $('#sub_g_amount_digits').trigger('focus');
//     // $('input.number').number( true, 2 )
//     // console.log($.number($('#sub_g_amount_digits').value, 2 ));
// });

// // 
// $(document).on('click', 'input[id="stud_pn_amount_promised"]', function() {
//     // stud_year=  $('#year option[value="'+$('#student_year').val()+'"]').data('id');
//     // console.log(stud_year);
//     var $initvalue = parseFloat(document.getElementById('stud_pn_amount_promised').value.replace(/,/g,''));
//     console.log($initvalue);
//     var $toeval = $initvalue.toString().split(".");
//     console.log($toeval);
//     var $result = "One: "+$toeval[0];
//     console.log($result);
//     $result = "Two: "+$toeval[1];
//     console.log($result);
//     $('#stud_pn_amount_promised_words').val(inWords($toeval[0],$toeval[1])).trigger('focus');
//     $('#stud_pn_amount_promised').trigger('focus');
//     // $('input.number').number( true, 2 )
//     // console.log($.number($('#stud_pn_amount_promised').value, 2 ));
// });