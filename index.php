<?php
include("variables/general.php");

$page="mailorder";
$page_title= "Tourism Mailorder Generator | ".ucwords($companyName);
$page_desc="A PHP-based PDF mail order form generator tailored for the tourism industry. Allows service selection, auto-calculates pricing, and generates ready-to-send printable forms.";
$page_keywords="";
$page_robots="noindex, nofollow, nosnippet";
$page_abstract="";

$pageFacebookOgImage="assets/img/regular/og/og-main";
include("header.php");
?>

<section id="form-part" class="container-fluid">
  <div class="row">
    <div class="col-xl-4 col-lg-6 col-md-7">
      <h1>Tourism Mailorder Generator</h1>
      <form action="html-to-pdf/mailorder-pdf.php" method="post" id="print" onsubmit="return isOrder(this)">
        <div class="form-row">
          <div class="form-group col-sm-4 col-6">
            <label for="tarih">Başlangıç Tarihi</label>
            <div class="input-group datepicker date" data-date-format="dd-mm-yyyy">
              <input id="mail_order_tarih_giris" name="tarih_giris" class="form-control" type="text" readonly />
              <span class="input-group-addon"></span>
              <div class="input-group-append" style="display: inherit;">
                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
              </div>
            </div>
            <small id="mail_order_tarih_giris_hata" class="form-text alt-text warning"><i class="fas fa-exclamation-circle"></i> Lütfen Giriş Tarih Seçimini Yapınız.</small>
          </div>

          <div class="form-group col-sm-4 col-6">
            <label for="tarih">Bitiş Tarihi</label>
            <div class="input-group datepicker date" data-date-format="dd-mm-yyyy">
              <input id="mail_order_tarih_cikis" name="tarih_cikis" class="form-control" type="text" readonly />
              <span class="input-group-addon"></span>
              <div class="input-group-append" style="display: inherit;">
                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
              </div>
            </div>
            <small id="mail_order_tarih_cikis_hata" class="form-text alt-text warning"><i class="fas fa-exclamation-circle"></i> Lütfen Çıkış Tarih Seçimini Yapınız.</small>
          </div>

          <div class="form-group col-sm-4 col-12">
            <label for="mail_order_temsilci">Müşteri Temsilcisi</label>
            <select name="temsilci" class="form-control" id="mail_order_temsilci">
              <option value="">Seçiniz</option>
              <?php foreach ($generalsJson["users"] as $user): ?>
              <option value="<?= ucwords($user) ?>"><?= ucwords($user) ?></option>
              <?php endforeach ?>
            </select>
            <small id="mail_order_temsilci_hata" class="form-text alt-text warning"><i class="fas fa-exclamation-circle"></i> Lütfen Adınızı Seçiniz.</small>
          </div>

          <div class="form-group col-sm-6 col-12">
            <label for="tarih">Müşteri Adı</label>
            <input id="mail_order_musteri" type="text" name="musteri_adi" class="form-control">
            <small id="mail_order_musteri_hata" class="form-text alt-text warning"><i class="fas fa-exclamation-circle"></i> Lütfen Müşteri Adı Giriniz.</small>
          </div>

          <div class="form-group col-sm-6 col-12">
            <label for="exampleSelect1">Otel ismi</label>
            <select type="otel" name="otel" class="form-control" id="mail_order_otel">
              <option value="">Seçiniz</option>
              <option value=" ">Boş</option>
              <?php foreach ($generalsJson["hotels"] as $hotel): ?>
              <option value="<?= $hotel ?>"><?= $hotel ?></option>
              <?php endforeach ?>
            </select>
            <small id="mail_order_otel_hata" class="form-text alt-text warning"><i class="fas fa-exclamation-circle"></i> Lütfen Otel Seçimini Yapınız.</small>
          </div>

          <div class="form-group col-sm-4 col-12">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="transfer_ucak" id="ucakRadio1" value="ve uçak bileti">
              <label class="form-check-label" for="ucakRadio1">
                Uçak bileti var.
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="transfer_ucak" id="ucakRadio2" value="&zwnj;">
              <label class="form-check-label" for="ucakRadio2">
                Uçak bileti yok.
              </label>
            </div>
            <small id="mail_order_transfer_ucak_hata" class="form-text alt-text warning"><i class="fas fa-exclamation-circle"></i> Uçakbileti Seçimini Yapınız.</small>
          </div>

          <div class="form-group col-sm-4 col-12">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="transfer_otel" id="otelRadio1" value="ve otel transfer">
              <label class="form-check-label" for="otelRadio1">
                Otel transferi var.
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="transfer_otel" id="otelRadio2" value="&zwnj;">
              <label class="form-check-label" for="otelRadio2">
                Otel transferi yok.
              </label>
            </div>
            <small id="mail_order_transfer_otel_hata" class="form-text alt-text warning"><i class="fas fa-exclamation-circle"></i> Transfer Seçimini Yapınız.</small>
          </div>

          <div class="form-group col-sm-4 col-12">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="iptal_sigorta" id="sigortaRadio1" value="ve iptal sigortası">
              <label class="form-check-label" for="sigortaRadio1">
                İptal sigortası var.
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="iptal_sigorta" id="sigortaRadio2" value="&zwnj;">
              <label class="form-check-label" for="sigortaRadio2">
                İptal sigortası yok.
              </label>
            </div>
            <small id="mail_order_iptal_sigorta_hata" class="form-text alt-text warning"><i class="fas fa-exclamation-circle"></i> İptal Sigortası Seçimini Yapınız.</small>
          </div>

          <div class="form-group col-sm-6 col-12">
            <label for="ucret">Ücret</label>
            <input type="text" name="ucret" class="form-control" id="mail_order_ucret" placeholder="1.200" />
            <small class="text-muted">*Lütfen sadece rakam olarak, küsüratsız yazınız.</small>
            <small id="mail_order_ucret_hata" class="form-text alt-text warning"><i class="fas fa-exclamation-circle"></i> Ücreti Rakam Olarak Giriniz.</small>
          </div>

          <div class="form-group col-sm-6 col-12">
            <label for="ucret_yazi">Ücret (Yazıyla)</label>
            <input type="text" name="ucret_yazi" class="form-control" id="mail_order_ucret_yazi" placeholder="Bin İkiyüz" />
            <small class="text-muted">*Lütfen baş harfleri büyük olarak yazınız.</small>
            <small id="mail_order_ucret_yazi_hata" class="form-text alt-text warning"><i class="fas fa-exclamation-circle"></i> Ücreti Harf Olarak Giriniz.</small>
          </div>
          <button type="submit" class="btn btn-primary" id="Order-btnGonder" name="submit" value="Submit" style="margin-bottom: 10px;" title="Lütfen gerekli alanları giriniz.">Kaydet</button>
        </div>
      </form>
    </div>

    <div class="col-xl-8 col-lg-6 col-md-5" id="form-prew">
      <div class="content bg-2">
        <h6><i class="fa fa-eye" aria-hidden="true"></i> önizleme</h6> 
        <div id="adort">
          <div class="pdf-logo"><img src="html-to-pdf/assets/img/logos/logoipsum.png"></div>
          <div class="text-1">Aşağıda adı ve soyadı yazılı olan kişi ve/veya kişilerin <span class="dikkat" id="mail_order_tarih_giris_box"></span> – <span class="dikkat" id="mail_order_tarih_cikis_box"></span> tarihleri arasında <span id="mail_order_otel_box"></span> <span id="rentacar_box" class="dikkat" style="display: none;">ve rentacar</span> <span id="transfer_ucak_box" class="dikkat" style="display: none;">ve uçak bileti</span> <span id="transfer_otel_box" class="dikkat" style="display: none;">ve otel transfer</span> <span id="iptal_sigorta_box" class="dikkat" style="display: none;">ve iptal sigortası</span> hizmet bedeli olan <span class="dikkat" id="mail_order_ucret_box1"></span><strong>.00TL</strong> nin yukarıdaki kredi kartından LOGOIPSUM TURİZM SAN. TİC. LTD. ŞTİ. adına tahsil edilmesini rica ederim/ederiz. </div>
          <div class="text-2">
            <div class="part">
              <div class="left-col">KREDİ KARTI SAHİBİ:</div>
              <div class="right-col">..........................................................</div>
            </div>
            <div class="part">
              <div class="left-col">TELEFON GSM:</div>
              <div class="right-col">..........................................................</div>
            </div>
            <div class="part">
              <div class="left-col">TELEFON İŞ:</div>
              <div class="right-col">..........................................................</div>
            </div>
            <div class="part">
              <div class="left-col">TUTAR (RAKAM İLE):</div>
              <div class="right-col"><strong>#</strong><span class="dikkat" id="mail_order_ucret_box2"></span><strong>.00#TL</strong></div>
            </div>
            <div class="part">
              <div class="left-col">TUTAR (YAZI İLE):</div>
              <div class="right-col"><span class="dikkat" id="mail_order_ucret_yazi_box"></span><strong> Türk Lirası.</strong></div>
            </div>
            <div class="part">
              <div class="left-col">KREDI KARTININ<br>AIT OLDUGU BANKA:</div>
              <div class="right-col">&nbsp;<br>..........................................................</div>
            </div>
            <div class="part">
              <div class="left-col">KREDİ KARTI TÜRÜ:</div>
              <div class="right-col cards"><img src="html-to-pdf/assets/img/cards.png"></div>
            </div>
            <div class="part">
              <div class="left-col">KREDİ KARTI NUMARASI:</div>
              <div class="right-col card-num"><img src="html-to-pdf/assets/img/card_num.png"></div>
            </div>
            <div class="part">
              <div class="left-col">SON KULLANMA TARİHİ:</div>
              <div class="right-col card-date"><img src="html-to-pdf/assets/img/card_date.png"></div>
            </div>
            <div class="part">
              <div class="left-col">GÜVENLİK NO (CCV):</div>
              <div class="right-col card-ccv"><img src="html-to-pdf/assets/img/card_ccv.png"></div>
            </div>
          </div>
          <div class="text-3">
            <div class="title">ADINA REZERVASYON YAPTIRILAN KISI VE / VEYA KISILER</div>
            <div class="part">Sn. ........................ .............................. TC.No: .................................... TelefonNo: ....................................</div>
            <div class="part">Sn. ........................ .............................. TC.No: .................................... TelefonNo: ....................................</div>
            <div class="part">Sn. ........................ .............................. TC.No: .................................... TelefonNo: ....................................</div>
            <div class="part">Sn. ........................ .............................. TC.No: .................................... TelefonNo: ....................................</div>
            <div class="part">Sn. ........................ .............................. TC.No: .................................... TelefonNo: ....................................</div>
            <div class="title">AD - SOYAD - KASE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;İMZA</div>
          </div>
          <div class="footer">
            <div class="text-part">Size özel müşteri temsilciniz: <span class="dikkat" id="mail_order_temsilci_box"></span></div>
            <div class="text-part">Telefon: +90 212 555 00 55</div>
            <div class="text-part">E-Mail: info@logoipsum.com</div>
            <div class="text-part">Adres: Balmumcu Mahallesi Barbaros Bulvarı, No:115, K:4, D:18, Beşiktaş, İstanbul / Turkey</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
include("footer.php");
?>