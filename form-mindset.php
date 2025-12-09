<?php
require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Corsidea | Mindset </title>
  <link rel="stylesheet" href="./css/form.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">

  <!-- Font Awesome 4.7.0 -->
  <link rel="stylesheet" href="css/font-awesome.min.css">

  <!-- Owl carousel -->
  <link rel="stylesheet" href="css/owl.carousel.min.css">

  <!-- Main style -->
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/slider.css">


  <link rel="shortcut icon" href="./assets/images/logo.png">


</head>

<body>
  <div class="wrapp-content">

    <header class="wrapp-header">
      <div class="info-box-01">
        <div class="container">
          <div class="row">
            <div class="col-sm-4 col-md-4 col-lg-4 text-sm-center">
              <ul class="social-list-01">
                <li>
                  <a href="#">
                    <i class="fa fa-facebook" aria-hidden="true"></i>
                  </a>
                </li>

                <li>
                  <a href="#">
                    <i class="fa fa-instagram" aria-hidden="true"></i>
                  </a>
                </li>

              </ul>
            </div>

          </div>
        </div>
      </div>
      <div class="main-nav">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <a href="./" class="logo">
                <img src="img/logo_corsidea.png" alt="">
              </a>
              <div class="main-nav__btn">
                <div class="icon-left"></div>
                <div class="icon-right"></div>
              </div>

              <ul class="main-nav__list">
                <li class="active">
                  <a href="index.php">Home</a>

                </li>
                <li>
                  <a href="form-laurea.php">Laurea e Recupero</a>

                </li>

                <li>
                  <a href="form-corsi.php">Corsi Professionali</a>

                </li>
                <li class="active">
                  <a href="form-mindset.php">Mindset</a>
                </li>
                <li>
                  <a href="contact.html">Contatti</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>

    </header>

    <div class="form-container">
      <form id="quote-form" action="send-form.php" method="post">
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['token']; ?>" />
        <input type="hidden" name="form_type" value="mindset" />
        <input type="hidden" value="internet" name="service" />
        <h2 style="text-align: center;">Potenzia la tua leadership e crescita sia personale che professionale
          con corsi di mindset e business avanzati!</h2>
        <div class="form-step ">
          <label for="course-level-mindset">Seleziona il corso a cui sei interessato</label><br>
          <select id="course-level-mindset" required>
            <option value="" disabled selected>Seleziona un corso</option>
            <option value="Crescitapersonale">Crescita personale</option>
            <option value="GestioneTempo">Gestione Tempo</option>
            <option value="Leadership">Leadership</option>
            <option value="TeamManagement">Team Management</option>
            <option value="Vendita">Vendita</option>


          </select>
        </div>
        <div class="form-step ">
          <label for="privatoazienda">Sei un privato oppure un'azienda?</label><br>
          <select id="privatoazienda" required>
            <option value="" disabled selected>Seleziona</option>
            <option value="Privato">Privato</option>
            <option value="Azienda">Azienda</option>



          </select>
        </div>


        <div class="form-step ">
          <label for="range">Quanto sei disposto a spendere? </label>
          <br>
          <input name="range" type="range" id="range" max="8000" min="1000" step="500">
          <label for="range">4500</label>
        </div>

        <div class="form-step ">
          <label for="luogocorso">Vuoi studiare in aula oppure online? </label>
          <br>
          <select name="luogocorso" id="luogocorso" placeholder="Selezione" required>
            <option value="">Seleziona</option>
            <option value="Inaula">In Aula</option>
            <option value="Online">Online</option>


          </select>
        </div>

        <div class="form-step">

          <label for="name">Nome</label>
          <br>
          <input type="text" name="nome" id="nome" placeholder="Inserisci il tuo nome" required>
          <div class="error" id="nameError" style="display: none;">Inserisci il tuo nome.</div>
        </div>
        <div class="form-step">
          <label for="surname">Cognome</label>
          <br>
          <input type="text" name="cognome" id="cognome" placeholder="Inserisci il cognome" required>
          <div class="error" id="surnameError" style="display: none;">Inserisci il tuo cognome.</div>
        </div>
        <div class="form-step">
          <label for="email">Email</label><br>
          <input type="email" name="email" id="email" placeholder="Inserisci l'email" required>
          <div class="error" id="emailError" style="display: none;">Inserisci un'email valida.</div>
        </div>
        <div class="form-step">
          <label for="phone">Numero di telefono</label><br>
          <input type="text" name="telefono" id="telefono" placeholder="Numero di telefono" required>
          <div class="error" id="phoneError" style="display: none;">Inserisci il numero di telefono.</div>
        </div>
        <div class="form-step">
          <label for="provincia">Provincia</label><br>

          <select name="provincia">
            <option value="" disabled selected>Seleziona</option>

            <option value="AG">Agrigento</option>
            <option value="AL">Alessandria</option>
            <option value="AN">Ancona</option>
            <option value="AO">Aosta</option>
            <option value="AR">Arezzo</option>
            <option value="AP">Ascoli Piceno</option>
            <option value="AT">Asti</option>
            <option value="AV">Avellino</option>
            <option value="BA">Bari</option>
            <option value="BT">Barletta-Andria-Trani</option>
            <option value="BL">Belluno</option>
            <option value="BN">Benevento</option>
            <option value="BG">Bergamo</option>
            <option value="BI">Biella</option>
            <option value="BO">Bologna</option>
            <option value="BZ">Bolzano</option>
            <option value="BS">Brescia</option>
            <option value="BR">Brindisi</option>
            <option value="CA">Cagliari</option>
            <option value="CL">Caltanissetta</option>
            <option value="CB">Campobasso</option>
            <option value="CE">Caserta</option>
            <option value="CT">Catania</option>
            <option value="CZ">Catanzaro</option>
            <option value="CH">Chieti</option>
            <option value="CO">Como</option>
            <option value="CS">Cosenza</option>
            <option value="CR">Cremona</option>
            <option value="KR">Crotone</option>
            <option value="CN">Cuneo</option>
            <option value="EN">Enna</option>
            <option value="FM">Fermo</option>
            <option value="FE">Ferrara</option>
            <option value="FI">Firenze</option>
            <option value="FG">Foggia</option>
            <option value="FC">Forl&igrave;-Cesena</option>
            <option value="FR">Frosinone</option>
            <option value="GE">Genova</option>
            <option value="GO">Gorizia</option>
            <option value="GR">Grosseto</option>
            <option value="IM">Imperia</option>
            <option value="IS">Isernia</option>
            <option value="AQ">L'aquila</option>
            <option value="SP">La spezia</option>
            <option value="LT">Latina</option>
            <option value="LE">Lecce</option>
            <option value="LC">Lecco</option>
            <option value="LI">Livorno</option>
            <option value="LO">Lodi</option>
            <option value="LU">Lucca</option>
            <option value="MC">Macerata</option>
            <option value="MN">Mantova</option>
            <option value="MS">Massa-Carrara</option>
            <option value="MT">Matera</option>
            <option value="ME">Messina</option>
            <option value="MI">Milano</option>
            <option value="MO">Modena</option>
            <option value="MB">Monza e Brianza</option>
            <option value="NA">Napoli</option>
            <option value="NO">Novara</option>
            <option value="NU">Nuoro</option>
            <option value="OR">Oristano</option>
            <option value="PD">Padova</option>
            <option value="PA">Palermo</option>
            <option value="PR">Parma</option>
            <option value="PV">Pavia</option>
            <option value="PG">Perugia</option>
            <option value="PU">Pesaro e Urbino</option>
            <option value="PE">Pescara</option>
            <option value="PC">Piacenza</option>
            <option value="PI">Pisa</option>
            <option value="PT">Pistoia</option>
            <option value="PN">Pordenone</option>
            <option value="PZ">Potenza</option>
            <option value="PO">Prato</option>
            <option value="RG">Ragusa</option>
            <option value="RA">Ravenna</option>
            <option value="RC">Reggio Calabria</option>
            <option value="RE">Reggio Emilia</option>
            <option value="RI">Rieti</option>
            <option value="RN">Rimini</option>
            <option value="RM">Roma</option>
            <option value="RO">Rovigo</option>
            <option value="SA">Salerno</option>
            <option value="SS">Sassari</option>
            <option value="SV">Savona</option>
            <option value="SI">Siena</option>
            <option value="SR">Siracusa</option>
            <option value="SO">Sondrio</option>
            <option value="SU">Sud Sardegna</option>
            <option value="TA">Taranto</option>
            <option value="TE">Teramo</option>
            <option value="TR">Terni</option>
            <option value="TO">Torino</option>
            <option value="TP">Trapani</option>
            <option value="TN">Trento</option>
            <option value="TV">Treviso</option>
            <option value="TS">Trieste</option>
            <option value="UD">Udine</option>
            <option value="VA">Varese</option>
            <option value="VE">Venezia</option>
            <option value="VB">Verbano-Cusio-Ossola</option>
            <option value="VC">Vercelli</option>
            <option value="VR">Verona</option>
            <option value="VV">Vibo valentia</option>
            <option value="VI">Vicenza</option>
            <option value="VT">Viterbo</option>
          </select>
        </div>
        <div class="form-step">
          <label for="citta">Città</label><br>
          <input type="text" name="citta" id="citta" placeholder="Città">
        </div>
        <div class="form-step">

          <div class="policy-group">
            <input type="checkbox" name="privacy-policy" id="privacy-policy" required>
            <label for="privacy-policy">Fornisco il consenso al trattamento dei miei dati personali per essere
              ricontattato in merito alle informazioni richieste con la compilazione del form.
            </label>

            <div class="error" id="policyError" style="display: none;">Accetta la privacy policy. </div>
          </div>


          <div class="policy-group">
            <input type="checkbox" name="newsletter" id="newsletter">
            <label for="newsletter"> Fornisco il consenso ad Adextra Italia S.r.l.s. al trattamento dei miei dati
              personali per
              l’invio di comunicazioni
              promozionali, newsletter, materiale pubblicitario, per mezzo di sistemi tradizionali di contatto e sistemi
              informatici
              automatizzati, ivi incluse comunicazioni commerciali o promozionali a mezzo e-mail o tramite social
              network,
              ovvero per
              ricerche ed analisi di mercato sulle seguenti categorie merceologiche, <a href="merceologiche.html">Clicca
                qui.
            </label>
          </div>
           <div class="policy-group">
            <input type="checkbox" name="newsletter" id="newsletter">
            <label for="newsletter"> Fornisco il consenso ad Adextra Italia S.r.l.s. al trattamento dei miei dati
              personali per
              l’invio di comunicazioni
              promozionali, newsletter, materiale pubblicitario, per mezzo di sistemi tradizionali di contatto e sistemi
              informatici
              automatizzati, ivi incluse comunicazioni commerciali o promozionali a mezzo e-mail o tramite social
              network,
              ovvero per
              ricerche ed analisi di mercato sulle seguenti categorie merceologiche, <a href="merceologiche.html">Clicca
                qui.
            </label>
          </div>
          <div>
            <br>
            <label for="categorie">Seleziona le categorie merceologiche di tuo interesse: ( Tenere premuto CTRL o CMD
              per usare
              la
              selezione multipla ) </label><br />
            <select id="categorie" name="categorie[]" multiple size="30" style="height:200px;width: 100%;">
              <option value="Telecomunicazioni">Telecomunicazioni</option>
              <option value="Finanziario">Finanziario</option>
              <option value="Assicurazioni">Assicurazioni</option>
              <option value="Energia">Energia, acqua e gas</option>
              <option value="ONG">ONG</option>
              <option value="Servizi legali">Servizi legali</option>
              <option value="Tempo libero">Tempo libero</option>
              <option value="Lotterie">Lotterie</option>
              <option value="Consumi">Consumi di massa:</option>
              <option value="Automotive">Automotive</option>
              <option value="Gioielli">Gioielli e Pietre preziose</option>
              <option value="Istruzione">Istruzione</option>
              <option value="Agenzie">Agenzie pubblicitarie</option>
            </select>
          </div>
          <div class="policy-group">
            <p>Compilando questo modulo di richiesta dichiaro di essere maggiorenne e di accettare i
              Termini
              e
              <a href="privacy-mindset.pdf">Privacy Policy</a> di Corsidea.

            </p>
          </div>
        </div>
        <div class="form-step">

          <button class="btn">Richiedi Informazioni</button>

        </div>
      </form>
    </div>
    <footer class="wrapp-footer">
      <div class="footer-box-01">
        <div class="container">
          <div class="row">
            <div class="col-sm-3 col-md-3 col-lg-3">
              <a href="./" class="footer-logo">
                <img src="img/logo_corsidea.png" alt="">
              </a>

            </div>
            <div class="col-sm-3 col-md-3 col-lg-3">
              <div class="widget-link">
                <h3 class="widget-title">Link</h3>
                <ul class="widget-list">
                  <li>
                    <a href="index.php">Home</a>
                  </li>
                  <li>
                    <a href="form-laurea.php">Laurea & Recupero Scuola</a>
                  </li>
                  <li>
                    <a href="form-corsi.php">Corsi Professionali</a>
                  </li>
                  <li>
                    <a href="form-mindset.php">Mindset</a>
                  </li>
                  <li>
                    <a href="contact.html">Contattaci</a>
                  </li>

                </ul>
              </div>
            </div>


          </div>
        </div>
      </div>
      <div class="footer-box-02">
        <div class="container">
          <div class="row">
            <div class="col-sm-4 col-md-4 col-lg-4">
              <p class="copy-info">&copy; 2024 Corsidea. All Rights Reserved</p>
            </div>
            <div class="col-sm-4 col-md-4 col-lg-4 text-center">
              <ul class="social-list-01">
                <li>
                  <a href="#">
                    <i class="fa fa-facebook" aria-hidden="true"></i>
                  </a>
                </li>

                <li>
                  <a href="#">
                    <i class="fa fa-instagram" aria-hidden="true"></i>
                  </a>
                </li>

              </ul>
            </div>
            <div class="col-sm-4 col-md-4 col-lg-4">
              <div class="footer-info">
                <a class="footer-info__01" href="privacy-policy-corsidea.pdf">Privacy Policy</a>
                <a class="footer-info__02" href="cookie-policy.pdf">Cookie Policy</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <a href="#" class="back2top" title="Back to Top">Back to Top</a>
    </footer>
  </div>


</body>
<script src="js/jquery/jquery-2.2.4.min.js"></script>

<!-- Superfish v1.7.9 -->
<script src="js/plugins/jquery.superfish.min.js"></script>

<!-- Owl carousel v2.2.1 -->
<script src="js/plugins/jquery.owl.carousel.min.js"></script>

<!-- Parallax v1.4.2  -->
<script src="js/plugins/jquery.parallax.min.js"></script>

<!-- Main script -->
<script src="js/main.js"></script>
<script src="/js/slider.js"></script>


</html>