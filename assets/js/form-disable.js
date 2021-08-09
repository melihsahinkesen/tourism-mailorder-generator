function isSiziarayalimFormVal(frm) {
  var telno = frm.siziarayalimTelno.value;
  var btnGonder = document.querySelector("#siziarayalim-btnGonder");


  if ( telno==null || telno=="" || telno.length < 10 )
  {  
    document.getElementById('siziarayalim-tel_hata').style.display = 'inline-block';
    document.getElementById('siziarayalim-telno').focus();
    return false;
  }
  else { 
    document.getElementById('siziarayalim-tel_hata').style.display = 'none';

    document.getElementById('siziarayalim-btnGonder').style.display = 'none';
    document.getElementById('siziarayalim-gonderiliyorInfo').style.display = 'inline-block';
  };
  return true;
}

function isTalepFormVal(frm) {
  var telno = frm.talepTelno.value;
  var btnGonder = document.querySelector("#talep-btnGonder");


  if ( telno==null || telno=="" || telno.length < 10 )
  {  
    document.getElementById('talep-tel_hata').style.display = 'inline-block';
    document.getElementById('talep-telno').focus();
    return false;
  }
  else { 
    document.getElementById('talep-tel_hata').style.display = 'none';

    document.getElementById('talep-btnGonder').style.display = 'none';
    document.getElementById('talep-gonderiliyorInfo').style.display = 'inline-block';
  };
  return true;
}

function isContactFormVal(frm) {
  var telno = frm.contactTelno.value;
  var mail = frm.contactMail.value;
  var btnGonder = document.querySelector("#contact-btnGonder");


  if ( telno==null || telno=="" || telno.length < 13 )
  {  
    document.getElementById('contact-tel_hata').style.display = 'inline-block';
    document.getElementById('contact-telno').focus();
    return false;
  }
  if ( mail==null || mail=="" )
  {
    document.getElementById('contact-tel_hata').style.display = 'none';
    document.getElementById('contact-mail_hata').style.display = 'inline-block';
    document.getElementById('contact-mail').focus();
    return false;
  }
  else { 
    document.getElementById('contact-tel_hata').style.display = 'none';
    document.getElementById('contact-mail_hata').style.display = 'none';
    document.getElementById('contact-btnGonder').style.display = 'none';
    document.getElementById('contact-gonderiliyorInfo').style.display = 'inline-block';
  };
  return true;
}

function isNumberKey(evt) {
  var charCode = (evt.which) ? evt.which : event.keyCode
  if (charCode > 31 && (charCode < 48 || charCode > 57))
    return false;
    return true;
}