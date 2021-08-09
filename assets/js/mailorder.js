$(document).ready(function () {
 $("#mail_order_ucret").forceNumeric();
});

// forceNumeric() plug-in implementation
jQuery.fn.forceNumeric = function () {
 return this.each(function () {
  $(this).keydown(function (e) {
    var key = e.which || e.keyCode;

    if (!e.shiftKey && !e.altKey && !e.ctrlKey &&
    // numbers   
       key >= 48 && key <= 57 ||
    // Numeric keypad
       key >= 96 && key <= 105 ||
    // comma, period and minus, . on keypad
      key == 190 || key == 188 || key == 109 || key == 110 ||
    // Backspace and Tab and Enter
      key == 8 || key == 9 || key == 13 ||
    // Home and End
      key == 35 || key == 36 ||
    // left and right arrows
      key == 37 || key == 39 ||
    // Del and Ins
      key == 46 || key == 45)
      return true;
      return false;
    });
  });
}

$("#mail_order_ucret").keyup(function(){
  // prevent every character except numbers
  if(!this.value.slice(-1).match(/^[0-9]+\,?[0-9]*$/) ){
    this.value = this.value.slice(0, -1);
    return;
  }
  // remove the dots, split the string and reverse it
  var a = this.value.replace(/\,/g, '').split('').reverse();

  // start from 3 and as long as there's a number 
  // add a dot every three digits.
  var pos = 3;
  while(a[pos] !== undefined){
    a.splice(pos,0,',');
    pos = pos + 4;
  }  
  // reverse, join and reassign the value
  this.value = a.reverse().join('');
});

$(document).ready(function(){
  $("#mail_order_ucret_yazi").keypress(function(event){
    var inputValue = event.which;
    // allow letters and whitespaces only.
    if((inputValue > 47 && inputValue < 58) && (inputValue != 32)){
      event.preventDefault();
    }
  });
});






var mailOrderTarihGiris = document.getElementById('mail_order_tarih_giris');
mailOrderTarihGiris.onchange = function(){
  document.getElementById('mail_order_tarih_giris_box').innerHTML = mailOrderTarihGiris.value;
}
var mailOrderTarihCikis = document.getElementById('mail_order_tarih_cikis');
mailOrderTarihCikis.onchange = function(){
  document.getElementById('mail_order_tarih_cikis_box').innerHTML = mailOrderTarihCikis.value;
}
var mailOrderOtel = document.getElementById('mail_order_otel');
mailOrderOtel.onchange = function(){
  if (mailOrderOtel.value == " ") {
    document.getElementById('mail_order_otel_box').innerHTML = ' ';
  } else {
    document.getElementById('mail_order_otel_box').innerHTML = '<span class="dikkat">'+mailOrderOtel.value+'</span> de/da konaklama';
  }
}
var mailOrderTemsilci = document.getElementById('mail_order_temsilci');
mailOrderTemsilci.onchange = function(){
  document.getElementById('mail_order_temsilci_box').innerHTML = mailOrderTemsilci.value;
}

$("input[name='transfer_ucak']").click(function () {
    $('#transfer_ucak_box').css('display', ($(this).val() === 've uçak bileti') ? 'inline':'none');
});
$("input[name='transfer_otel']").click(function () {
    $('#transfer_otel_box').css('display', ($(this).val() === 've otel transfer') ? 'inline':'none');
});
$("input[name='iptal_sigorta']").click(function () {
    $('#iptal_sigorta_box').css('display', ($(this).val() === 've iptal sigortası') ? 'inline':'none');
});


var mailOrderUcret = document.getElementById('mail_order_ucret');
mailOrderUcret.onkeyup = function(){
  document.getElementById('mail_order_ucret_box1').innerHTML = mailOrderUcret.value;
  document.getElementById('mail_order_ucret_box2').innerHTML = mailOrderUcret.value;
}
var mailOrderUcretYazi = document.getElementById('mail_order_ucret_yazi');
mailOrderUcretYazi.onkeyup = function(){
  document.getElementById('mail_order_ucret_yazi_box').innerHTML = mailOrderUcretYazi.value;
}


$('#mail_order_musteri')
  .bind("paste", function() {
    return false;
  })
  .keypress(function(key) {
    if ( ! key.key.match(/^([A-Z]|\s|Tab)$/) ) {
      return false;
    }

    // Başlangıçta boşluk bırakarak devam ettiremeyiz
    var mail_order_musteri = $('#mail_order_musteri').val();
    if (mail_order_musteri < 2) {
      if((key.charCode < 97 || key.charCode > 122) && (key.charCode < 65 || key.charCode > 90) && (key.charCode != 45)) return false;
    }
});

// Form Disable
function isOrder(frm) {
  var mailOrder_tarih_giris = frm.tarih_giris.value;
  var mailOrder_tarih_cikis = frm.tarih_cikis.value;
  var mailOrder_musteri = frm.musteri_adi.value;
  var mailOrder_temsilci = frm.temsilci.value;
  var mailOrder_otel = frm.otel.value;
  var mailOrder_transfer_ucak = frm.transfer_ucak.value;
  var mailOrder_transfer_otel = frm.transfer_otel.value;
  var mailOrder_iptal_sigorta = frm.iptal_sigorta.value;
  var mailOrder_ucret = frm.ucret.value;
  var mailOrder_ucret_yazi = frm.ucret_yazi.value;

  if ( mailOrder_tarih_giris==null || mailOrder_tarih_giris=="" )
  {
    document.getElementById('mail_order_tarih_giris_hata').style.display = 'inline-block';
    document.getElementById('mail_order_tarih_cikis_hata').style.display = 'none'; 
    document.getElementById('mail_order_musteri_hata').style.display = 'none';
    document.getElementById('mail_order_temsilci_hata').style.display = 'none';
    document.getElementById('mail_order_otel_hata').style.display = 'none'; 
    document.getElementById('mail_order_transfer_ucak_hata').style.display = 'none'; 
    document.getElementById('mail_order_transfer_otel_hata').style.display = 'none';
    document.getElementById('mail_order_iptal_sigorta_hata').style.display = 'none';
    document.getElementById('mail_order_ucret_hata').style.display = 'none'; 
    document.getElementById('mail_order_ucret_yazi_hata').style.display = 'none'; 

    document.getElementById('mail_order_tarih_giris').focus();
    return false;
  } 
  if ( mailOrder_tarih_cikis==null || mailOrder_tarih_cikis=="" )
  {
    document.getElementById('mail_order_tarih_cikis_hata').style.display = 'inline-block';
    document.getElementById('mail_order_tarih_giris_hata').style.display = 'none'; 
    document.getElementById('mail_order_musteri_hata').style.display = 'none';
    document.getElementById('mail_order_temsilci_hata').style.display = 'none';
    document.getElementById('mail_order_otel_hata').style.display = 'none'; 
    document.getElementById('mail_order_transfer_ucak_hata').style.display = 'none'; 
    document.getElementById('mail_order_transfer_otel_hata').style.display = 'none';
    document.getElementById('mail_order_iptal_sigorta_hata').style.display = 'none'; 
    document.getElementById('mail_order_ucret_hata').style.display = 'none'; 
    document.getElementById('mail_order_ucret_yazi_hata').style.display = 'none'; 

    document.getElementById('mail_order_tarih_cikis').focus();
    return false;
  } 
  if ( mailOrder_temsilci==null || mailOrder_temsilci=="" )
  {  
    document.getElementById('mail_order_tarih_giris_hata').style.display = 'none'; 
    document.getElementById('mail_order_tarih_cikis_hata').style.display = 'none'; 
    document.getElementById('mail_order_musteri_hata').style.display = 'none';
    document.getElementById('mail_order_temsilci_hata').style.display = 'inline-block';
    document.getElementById('mail_order_otel_hata').style.display = 'none';
    document.getElementById('mail_order_transfer_ucak_hata').style.display = 'none'; 
    document.getElementById('mail_order_transfer_otel_hata').style.display = 'none';
    document.getElementById('mail_order_iptal_sigorta_hata').style.display = 'none';
    document.getElementById('mail_order_ucret_hata').style.display = 'none'; 
    document.getElementById('mail_order_ucret_yazi_hata').style.display = 'none'; 

    document.getElementById('mail_order_temsilci').focus();
    return false;
  }
  if ( mailOrder_musteri==null || mailOrder_musteri=="" || mailOrder_musteri==" " )
  {  
    document.getElementById('mail_order_tarih_giris_hata').style.display = 'none'; 
    document.getElementById('mail_order_tarih_cikis_hata').style.display = 'none'; 
    document.getElementById('mail_order_musteri_hata').style.display = 'inline-block';
    document.getElementById('mail_order_temsilci_hata').style.display = 'none';
    document.getElementById('mail_order_otel_hata').style.display = 'none';
    document.getElementById('mail_order_transfer_ucak_hata').style.display = 'none'; 
    document.getElementById('mail_order_transfer_otel_hata').style.display = 'none';
    document.getElementById('mail_order_iptal_sigorta_hata').style.display = 'none';
    document.getElementById('mail_order_ucret_hata').style.display = 'none'; 
    document.getElementById('mail_order_ucret_yazi_hata').style.display = 'none'; 

    document.getElementById('mail_order_musteri').focus();
    return false;
  }
  if ( mailOrder_otel==null || mailOrder_otel=="" )
  {  
    document.getElementById('mail_order_tarih_giris_hata').style.display = 'none'; 
    document.getElementById('mail_order_tarih_cikis_hata').style.display = 'none'; 
    document.getElementById('mail_order_musteri_hata').style.display = 'none';
    document.getElementById('mail_order_temsilci_hata').style.display = 'none';
    document.getElementById('mail_order_otel_hata').style.display = 'inline-block';
    document.getElementById('mail_order_transfer_ucak_hata').style.display = 'none'; 
    document.getElementById('mail_order_transfer_otel_hata').style.display = 'none';
    document.getElementById('mail_order_iptal_sigorta_hata').style.display = 'none'; 
    document.getElementById('mail_order_ucret_hata').style.display = 'none'; 
    document.getElementById('mail_order_ucret_yazi_hata').style.display = 'none'; 

    document.getElementById('mail_order_otel').focus();
    return false;
  }
  if ( mailOrder_transfer_ucak==null || mailOrder_transfer_ucak=="")
  {  
    document.getElementById('mail_order_tarih_giris_hata').style.display = 'none'; 
    document.getElementById('mail_order_tarih_cikis_hata').style.display = 'none'; 
    document.getElementById('mail_order_musteri_hata').style.display = 'none';
    document.getElementById('mail_order_temsilci_hata').style.display = 'none';
    document.getElementById('mail_order_otel_hata').style.display = 'none'; 
    document.getElementById('mail_order_transfer_ucak_hata').style.display = 'inline-block';
    document.getElementById('mail_order_transfer_otel_hata').style.display = 'none';
    document.getElementById('mail_order_iptal_sigorta_hata').style.display = 'none';
    document.getElementById('mail_order_ucret_hata').style.display = 'none'; 
    document.getElementById('mail_order_ucret_yazi_hata').style.display = 'none'; 

    document.getElementById('ucakRadio1').focus();
    return false;
  }
  if ( mailOrder_transfer_otel==null || mailOrder_transfer_otel=="")
  {  
    document.getElementById('mail_order_tarih_giris_hata').style.display = 'none'; 
    document.getElementById('mail_order_tarih_cikis_hata').style.display = 'none'; 
    document.getElementById('mail_order_musteri_hata').style.display = 'none';
    document.getElementById('mail_order_temsilci_hata').style.display = 'none';
    document.getElementById('mail_order_otel_hata').style.display = 'none'; 
    document.getElementById('mail_order_transfer_otel_hata').style.display = 'inline-block';
    document.getElementById('mail_order_transfer_ucak_hata').style.display = 'none';
    document.getElementById('mail_order_iptal_sigorta_hata').style.display = 'none';
    document.getElementById('mail_order_ucret_hata').style.display = 'none'; 
    document.getElementById('mail_order_ucret_yazi_hata').style.display = 'none'; 

    document.getElementById('otelRadio1').focus();
    return false;
  }
  if ( mailOrder_iptal_sigorta==null || mailOrder_iptal_sigorta=="")
  {  
    document.getElementById('mail_order_tarih_giris_hata').style.display = 'none'; 
    document.getElementById('mail_order_tarih_cikis_hata').style.display = 'none'; 
    document.getElementById('mail_order_musteri_hata').style.display = 'none';
    document.getElementById('mail_order_temsilci_hata').style.display = 'none';
    document.getElementById('mail_order_otel_hata').style.display = 'none'; 
    document.getElementById('mail_order_transfer_otel_hata').style.display = 'none';
    document.getElementById('mail_order_transfer_ucak_hata').style.display = 'none'; 
    document.getElementById('mail_order_iptal_sigorta_hata').style.display = 'inline-block';
    document.getElementById('mail_order_ucret_hata').style.display = 'none'; 
    document.getElementById('mail_order_ucret_yazi_hata').style.display = 'none'; 

    document.getElementById('sigortaRadio1').focus();
    return false;
  }
  if ( mailOrder_ucret==null || mailOrder_ucret=="" )
  {  
    document.getElementById('mail_order_tarih_giris_hata').style.display = 'none'; 
    document.getElementById('mail_order_tarih_cikis_hata').style.display = 'none'; 
    document.getElementById('mail_order_musteri_hata').style.display = 'none';
    document.getElementById('mail_order_temsilci_hata').style.display = 'none';
    document.getElementById('mail_order_otel_hata').style.display = 'none'; 
    document.getElementById('mail_order_transfer_ucak_hata').style.display = 'none'; 
    document.getElementById('mail_order_transfer_otel_hata').style.display = 'none';
    document.getElementById('mail_order_iptal_sigorta_hata').style.display = 'none';
    document.getElementById('mail_order_ucret_hata').style.display = 'inline-block';
    document.getElementById('mail_order_ucret_yazi_hata').style.display = 'none'; 

    document.getElementById('mail_order_ucret').focus();
    return false;
  }
  if ( mailOrder_ucret_yazi==null || mailOrder_ucret_yazi=="" )
  {  
    document.getElementById('mail_order_tarih_giris_hata').style.display = 'none'; 
    document.getElementById('mail_order_tarih_cikis_hata').style.display = 'none'; 
    document.getElementById('mail_order_musteri_hata').style.display = 'none';
    document.getElementById('mail_order_temsilci_hata').style.display = 'none';
    document.getElementById('mail_order_otel_hata').style.display = 'none'; 
    document.getElementById('mail_order_transfer_ucak_hata').style.display = 'none'; 
    document.getElementById('mail_order_transfer_otel_hata').style.display = 'none';
    document.getElementById('mail_order_iptal_sigorta_hata').style.display = 'none';
    document.getElementById('mail_order_ucret_yazi_hata').style.display = 'inline-block';
    document.getElementById('mail_order_ucret_hata').style.display = 'none'; 

    document.getElementById('mail_order_ucret_yazi').focus();
    return false;
  }
  else { 
    document.getElementById('mail_order_tarih_giris_hata').style.display = 'none'; 
    document.getElementById('mail_order_tarih_cikis_hata').style.display = 'none'; 
    document.getElementById('mail_order_otel_hata').style.display = 'none'; 
    document.getElementById('mail_order_musteri_hata').style.display = 'none';
    document.getElementById('mail_order_temsilci_hata').style.display = 'none';
    document.getElementById('mail_order_transfer_ucak_hata').style.display = 'none'; 
    document.getElementById('mail_order_transfer_otel_hata').style.display = 'none';
    document.getElementById('mail_order_iptal_sigorta_hata').style.display = 'none';
    document.getElementById('mail_order_ucret_hata').style.display = 'none'; 
    document.getElementById('mail_order_ucret_yazi_hata').style.display = 'none'; 
    frm.submit.disabled = true;
    document.getElementById("Order-btnGonder").innerHTML = "Kaydediliyor";
  };
  return true;
}