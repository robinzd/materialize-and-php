<?php

session_start();


include("connection.php");
include("function.php");

$user_data = check_login($con);


$initial = getInitialsAttribute($user_data);


function getInitialsAttribute($user_data)
{
  $nameWords = explode(" ", $user_data['user_name']);
  $initials =  $nameWords[0][0];
  if (count($nameWords) > 1) {
    $initials = $initials . $nameWords[1][0];
  }
  return $initials;
}



?>


<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- font awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
  <link rel="stylesheet" href="my project.css">
  <title>Njoy Life</title>
  <link rel="icon" type="image/x-icon" href="favicon.ico">
</head>

<body>

  <!-- navbar -->
  <header>
    <nav class="nav-wraper transparent">
      <div class="container">
        <a href="" class="brand-logo">Njoy Life</a>
        <a href="" class="sidenav-trigger" data-target="mobile-menu">
          <i class="material-icons">menu</i>
        </a>

        <a href="#" data-initials="<?php echo $initial; ?>" class="right hide-on-med-and-down dropdown-trigger" data-target="dropdown1"></a>

        <ul id="dropdown1" class="dropdown-content">
          <li> <a href="table.php"> Service Details</a></li>
          <li><a href="logout.php"><i class="small material-icons">logout</i>Logout</a></li>
        </ul>





        <ul class="right hide-on-med-and-down">
          <li><a href="#photos">Photos</a></li>
          <li><a href="#contacts">contacts</a></li>
          <li><a href="#services">Services</a></li>
          <li><a href="#" class=" tooltipped btn-floating btn-small transparent" data-tooltip="Instagarm">
              <i class="fab fa-instagram pink-text"></i>
            </a></li>
          <li><a href="#" class=" tooltipped btn-floating btn-small transparent" data-tooltip="Facebook">
              <i class="fab fa-facebook blue-text"></i>
            </a></li>
          <li><a href="#" class=" tooltipped btn-floating btn-small transparent" data-tooltip="Telegram">
              <i class="fab fa-telegram light-blue-text"></i>
            </a></li>
          <li>Welcome</li>
        </ul>





        <ul class="sidenav teal accent-4" id="mobile-menu">
          <li><p>welcome,</p><a href="#" data-initials="<?php echo $initial; ?>"></a></li>
          <li><a href="#photos">Photos</a></li>
          <li><a href="#contacts">Contacts</a></li>
          <li><a href="#services">Services</a></li>
          <li><a href="table.php">Manage Services</a></li>
          <li><a href="logout.php">Logout</a></li>
          

        </ul>

      </div>

    </nav>






  </header>

  <!-- photo / grid -->
  <section class="container section scrollspy" id="photos">
    <div class="row">
      <div class="col s12 l4">
        <img src="nature1.jpeg" alt="" class="responsive-img materialboxed">
      </div>
      <div class="col s12 l6 offset-l1">
        <h2 class="indigo-text text-darken-4">Kodaikanal</h2>
        <p>
          Situated at about 7,000ft above sea level, Kodaikanal is famous for its breathtaking views and unsurpassed
          beauty.
          Also known as Princess of Hill Stations, it lies in the hills of Dindigul in Tamil Nadu.
          In Tamil, Kodaikanal means 'Gift of Forest'.
        </p>
      </div>
    </div>
    <div class="row">
      <div class="col s12 l4 push-l7 offset-l1">
        <img src="nature2..jpeg" alt="" class="responsive-img materialboxed">
      </div>
      <div class="col s12 l6 pull-l5 right-align offset-l1">
        <h2 class="indigo-text text-darken-4">Munnar</h2>
        <p>
          Known for its evergreen tea plantations, the hills of Munnar with their rolling beauty and charm can cast a
          magical spell on the visitors!
          While most of the hills are adorned with tea plantations, some are enchanted by mesmerising waterfalls, lush
          vegetation and lot more.
        </p>
      </div>
    </div>
    <div class="row">
      <div class="col s12 l4">
        <img src="nature3.jpeg" alt="" class="responsive-img materialboxed">
      </div>
      <div class="col s12 l6 offset-l1">
        <h2 class="indigo-text text-darken-4">Goa</h2>
        <p>
          Goa is one of the most favorite destination among Indian tourists due to its pristine beaches.
          Dotted with hundreds of impressive beaches in Goa, the incredible coastline of more than 100 km offers
          beautiful views and serenity where tourists enjoy and relax in the Sun.
        </p>
      </div>
    </div>
  </section>


  <!-- parallax -->
  <div class="parallax-container">
    <div class="parallax">
      <img src="nature4.jpeg" alt="" class="responsive-img">
    </div>
  </div>

  <!-- services / tabs -->
  <section class="container section scrollspy" id="services">
    <div class="row">
      <div class="col s12 l4">
        <h2 class="indigo-text text-darken-4">What We Do?</h2>
        <p>We have high range resorts and rooms for stay</p>
        <p>We have our personal guide to guide you to the whole tour</p>
        <p>We also our own photographer to capture your best moment in the tour</p>
        <p>We have our own cook to cook your favorite food and serve to you</p>
      </div>
      <div class='col s12 l6 offset-l2'>
        <ul class="tabs">
          <li class="tab col s6">
            <a href="#Photography" class="indigo-text text-darken-4">Photography</a>
          </li>
          <li class="tab col s6">
            <a href="#Resorts" class="indigo-text text-darken-4">Resorts and Rooms</a>
          </li>
        </ul>
        <div class="col s12" id="Photography">
          <p class="flow-text indigo-text text-darken-4">Photography</p>
          <img src="photo1.jpeg" alt="" class="responsive-img materialboxed">
        </div>
        <div class="col s12" id="Resorts">
          <p class="flow-text indigo-text text-darken-4">Resorts and Rooms</p>
          <img src="photo2.jpeg" alt="" class="responsive-img materialboxed">

        </div>
      </div>
    </div>

  </section>


  <!-- parallax -->
  <div class="parallax-container">
    <div class="parallax">
      <img src="nature5.jpeg" alt="" class="responsive-img">
    </div>
  </div>

  <!-- contact form -->
  <section class="section container scrollspy" id="contacts">
    <div class="row">
      <div class="col s12 l5">
        <h2 class="indigo-text text-darken-4">Get In Touch</h2>
        <p>Contact us on socail medai platforms</p>
        <p>contact us on our own website</p>
        <p>Login this and contact us personally</p>
        <p>We have 24/7 customer support</p>
      </div>
      <div class="col s12 l5 offset-l2">
        <form action="">
          <div class="input-field">
            <i class="material-icons prefix">email</i>
            <input type="email" id="email">
            <label for="email">Your Email</label>
          </div>
          <div class="input-field">
            <i class="material-icons prefix">message</i>
            <textarea id="message" class="materialize-textarea"></textarea>
            <label for="message">Your Message</label>
          </div>
          <div class="input-field">
            <input type="text" id="date" class="datepicker">
            <label for="date">Choose A Date Of Your Journey</label>
          </div>
          <div class="input-field">
            <p>If You Want Photography?</p>
            <p>
              <label>
                <input type="checkbox">
                <span>Yes</span>
              </label>
            </p>
            <p>
              <label>
                <input type="checkbox">
                <span>No</span>
              </label>
            </p>
          </div>
          <div class="input-field center">
            <button class="btn waves-effect waves-dark">Submit</button>
          </div>
      </div>
      </form>

    </div>
    </div>

  </section>


  <!-- footer -->
  <footer class="page-footer teal accent-4">
    <div class="container">
      <div class="row">
        <div class="col s12 l6">
          <h5>About Me</h5>
          <p>Njoy Life is like the Tour guide book we give your dream tour exclusive pack in the lowest budget our
            vision is to happy our customer and satisfy our customer needs.
            If you planned any tour just sit back and relax njoy life will proceed everything in the tour from the start
            to till end.
          </p>
        </div>
        <div class="col s12 l4 offset-l2">
          <h5>Contact us on....</h5>
          <ul>
            <li><a href="#" class="white-text">Facebook</a></li>
            <li><a href="#" class="white-text">Instagram</a></li>
            <li><a href="#" class="white-text">Telegram</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright grey darken-4">
      <div class="container center-align">&copy;2019 Njoy Life</div>
    </div>
  </footer>


  <!-- Compiled and minified JavaScript -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
  <script>
    $(document).ready(function() {
      $('.sidenav').sidenav();
      $('.materialboxed').materialbox();
      $('.parallax').parallax();
      $('.tabs').tabs();
      $('.datepicker').datepicker({

      });
      $('.tooltipped').tooltip();
      $('.scrollspy').scrollSpy();
      $('.dropdown-trigger').dropdown({
        coverTrigger: false
      });
    });
  </script>
</body>

</html>