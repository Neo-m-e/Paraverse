<?php
function HEAD_ESSENTIALS()
{
  global $META_TITLE;
  global $META_DESC;
  global $META_IMAGE;
  global $identification;

  $META_TITLE = empty($META_TITLE) ? "Educational Innovation and Technology Hub" : htmlspecialchars(
    $META_TITLE,
    ENT_NOQUOTES
  );
  $META_IMAGE = empty($META_IMAGE) ? "https://paraverse.feutech.edu.ph/assets/img/office.jpg" :
    Sanitizer::url($META_IMAGE);
  $META_LINK = "https://" . $_SERVER['HTTP_HOST'] . parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

  $maintenance = isset($_SESSION['loggedins'])
    ? "
<script>
  $(document).ready(function () {
    var alertBox = $('<div class=\"alert bg-light-danger fw-semibold text-center fs-5 py-7 px-lg-20\"></div>')
      .html(`
                        <div class=\"app-container container-xxl\">
                            Some features may be temporarily unavailable as we complete recent updates. 
                            We are working to restore full functionality as quickly as possible. 
                            If you encounter any errors or issues, 
                            <a href='javascript:void(0);' id='reportLink' style='text-decoration:underline; color:blue;'>report here</a>. 
                            Thank you for your patience! ❤️
                        </div>
                    `);

    $('.app-wrapper').prepend(alertBox);

    $(document).on('click', '#reportLink', function () {
      $('#open-modal-feedback')[0].click();
      $('[feedback=\"report\"]')[0].click();
    });
  });
</script>
" : null;

  echo '
<title>' . $META_TITLE . '</title>
<meta charset="UTF-8" />

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="' . $META_DESC . '">

<meta property="og:title" content="' . $META_TITLE . '" />
<meta property="og:url" content="' . $META_LINK . '" />
<meta property="og:image" content="' . $META_IMAGE . '" />
<meta property="og:description" content="' . $META_DESC . '">
<meta property="og:type" content="article" />
<meta property="og:locale" content="en_US" />
<meta property="og:site_name" content="Educational Innovation and Technology Hub" />

<meta name="twitter:title" content="' . $META_TITLE . '">
<meta name="twitter:description" content="' . $META_DESC . '">
<meta name="twitter:image" content="' . $META_IMAGE . '">
<meta name="twitter:card" content="summary_large_image">

<link rel="icon" type="image/x-icon" href="/assets/img/favicon.png">
<link rel="manifest" href="/assets/site.webmanifest?v=2">

<meta name="mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="apple-mobile-web-app-title" content="Paraverse">
<link rel="apple-touch-icon" href="/assets/img/logo/icon-paraverse-192.png">

<link rel="stylesheet" href="/assets/plugins/global/plugins.bundle.css">
<link rel="stylesheet" href="/assets/css/style.keenicons.css">
<link rel="stylesheet" href="/assets/css/style.bundle.v2.full.css?version=1.1028">

<script src="/assets/js/jquery.js"></script>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
  href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&Libre+Franklin:wght@400;600;800&family=News+Cycle:wght@700&display=swap"
  rel="stylesheet">

<script async src="https://www.googletagmanager.com/gtag/js?id=G-SR6Q4GLJJH"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag() { dataLayer.push(arguments); }
  gtag(\'js\', new Date());
                gtag(\'config\', \'G-SR6Q4GLJJH\');
</script>

<script>
            // Frame-busting to prevent site from being loaded within a frame without permission (click-jacking)
            if (window.top != window.self) {
    // window.top.location.replace(window.self.location.href);
  }
</script>
' . $maintenance;
}

function LAF_GET_SURRENDERED_ITEMS() {
  return [
    1 => ['id' => 1, 'name' => 'Goojodoq (Handfan)', 'category' => 'Accessories', 'category_class' => 'badge-accessories', 'cat_key' => 'cat-accessories', 'icon' => '💨', 'floor' => '2nd Floor, Lobby', 'date' => 'May 3, 2026', 'time' => '10:00 AM', 'surrendered_by' => 'Jenny B. Calot', 'claimed_by' => '—', 'released_by' => '—', 'received_by' => '—', 'currently_at' => 'Discipline Unit · 15th Floor, Room 1501', 'status' => 'Unclaimed', 'image' => '/LAF/assets/images/fan.webp'],
    2 => ['id' => 2, 'name' => 'Umbrella', 'category' => 'Personal Essentials', 'category_class' => 'badge-essentials', 'cat_key' => 'cat-essentials', 'icon' => '☂️', 'floor' => '4th Floor, Study Area', 'date' => 'May 2, 2026', 'time' => '2:00 PM', 'surrendered_by' => 'Marco R. Santos', 'claimed_by' => '—', 'released_by' => '—', 'received_by' => '—', 'currently_at' => 'Discipline Unit · 15th Floor, Room 1501', 'status' => 'Unclaimed', 'image' => '/LAF/assets/images/umbrella.jpg'],
    3 => ['id' => 3, 'name' => 'Calculator', 'category' => 'Academic', 'category_class' => 'badge-academic', 'cat_key' => 'cat-academic', 'icon' => '🧮', 'floor' => '6th Floor, Room 605', 'date' => 'May 4, 2026', 'time' => '8:30 AM', 'surrendered_by' => 'Kristin V. Dy', 'claimed_by' => '—', 'released_by' => '—', 'received_by' => '—', 'currently_at' => 'Discipline Unit · 15th Floor, Room 1501', 'status' => 'Unclaimed', 'image' => '/LAF/assets/images/calculator.jpg'],
    4 => ['id' => 4, 'name' => 'Blue Backpack', 'category' => 'Bags', 'category_class' => 'badge-bags', 'cat_key' => 'cat-bags', 'icon' => '🎒', 'floor' => '14th Floor, Library', 'date' => 'May 1, 2026', 'time' => '12:30 PM', 'surrendered_by' => 'Marco R. Santos', 'claimed_by' => 'Jenny B. Calot', 'released_by' => 'Yvette G. Supnet', 'received_by' => 'Yvette G. Supnet', 'currently_at' => 'Discipline Unit · 15th Floor, Room 1501', 'status' => 'Claimed', 'image' => ''],
    5 => ['id' => 5, 'name' => 'Keys', 'category' => 'Personal Essentials', 'category_class' => 'badge-essentials', 'cat_key' => 'cat-essentials', 'icon' => '🔑', 'floor' => '1st Floor, Parking', 'date' => 'Apr 30, 2026', 'time' => '9:00 AM', 'surrendered_by' => 'Juan D. Cruz', 'claimed_by' => 'Kristin V. Dy', 'released_by' => 'Yvette G. Supnet', 'received_by' => 'Yvette G. Supnet', 'currently_at' => 'Discipline Unit · 15th Floor, Room 1501', 'status' => 'Claimed', 'image' => ''],
    6 => ['id' => 6, 'name' => 'Eyeglasses', 'category' => 'Accessories', 'category_class' => 'badge-accessories', 'cat_key' => 'cat-accessories', 'icon' => '🕶️', 'floor' => '3rd Floor, Library', 'date' => 'Apr 28, 2026', 'time' => '3:00 PM', 'surrendered_by' => 'Ana R. Reyes', 'claimed_by' => 'Roel M. Tan', 'released_by' => 'Yvette G. Supnet', 'received_by' => 'Yvette G. Supnet', 'currently_at' => 'Discipline Unit · 15th Floor, Room 1501', 'status' => 'Claimed', 'image' => ''],
    7 => ['id' => 7, 'name' => 'Smartphone', 'category' => 'Electronics', 'category_class' => 'badge-electronics', 'cat_key' => 'cat-electronics', 'icon' => '📱', 'floor' => '5th Floor, Study Area', 'date' => 'Apr 27, 2026', 'time' => '11:00 AM', 'surrendered_by' => 'Luis M. Bautista', 'claimed_by' => 'Dana P. Reyes', 'released_by' => 'Yvette G. Supnet', 'received_by' => 'Yvette G. Supnet', 'currently_at' => 'Discipline Unit · 15th Floor, Room 1501', 'status' => 'Claimed', 'image' => ''],
    8 => ['id' => 8, 'name' => 'Water Bottle', 'category' => 'Personal Essentials', 'category_class' => 'badge-essentials', 'cat_key' => 'cat-essentials', 'icon' => '🍶', 'floor' => '7th Floor, Canteen', 'date' => 'Apr 26, 2026', 'time' => '12:00 PM', 'surrendered_by' => 'Maria S. Lim', 'claimed_by' => '—', 'released_by' => '—', 'received_by' => '—', 'currently_at' => 'Discipline Unit · 15th Floor, Room 1501', 'status' => 'Unclaimed', 'image' => '/LAF/assets/images/bottle.jpg'],
    9 => ['id' => 9, 'name' => 'Papers', 'category' => 'Documents', 'category_class' => 'badge-documents', 'cat_key' => 'cat-documents', 'icon' => '📑', 'floor' => '7th Floor, Canteen', 'date' => 'Apr 26, 2026', 'time' => '12:00 PM', 'surrendered_by' => 'Carlo T. Ong', 'claimed_by' => '—', 'released_by' => '—', 'received_by' => '—', 'currently_at' => 'Discipline Unit · 15th Floor, Room 1501', 'status' => 'Unclaimed', 'image' => ''],
    10 => ['id' => 10, 'name' => 'Wallet', 'category' => 'Wallets', 'category_class' => 'badge-wallets', 'cat_key' => 'cat-wallets', 'icon' => '👛', 'floor' => '7th Floor, Canteen', 'date' => 'Apr 26, 2026', 'time' => '12:00 PM', 'surrendered_by' => 'Pia G. Fernandez', 'claimed_by' => '—', 'released_by' => '—', 'received_by' => '—', 'currently_at' => 'Discipline Unit · 15th Floor, Room 1501', 'status' => 'Unclaimed', 'image' => ''],
    11 => ['id' => 11, 'name' => 'Water Bottle', 'category' => 'Personal Essentials', 'category_class' => 'badge-essentials', 'cat_key' => 'cat-essentials', 'icon' => '🍶', 'floor' => '7th Floor, Canteen', 'date' => 'Apr 26, 2026', 'time' => '12:00 PM', 'surrendered_by' => 'Rico A. Villanueva', 'claimed_by' => '—', 'released_by' => '—', 'received_by' => '—', 'currently_at' => 'Discipline Unit · 15th Floor, Room 1501', 'status' => 'Unclaimed', 'image' => ''],
  ];
}

function LAF_GET_LOST_ITEMS() {
  return [
    101 => ['id' => 101, 'name' => 'Black Backpack', 'category' => 'Bags', 'category_class' => 'badge-bags', 'icon' => '🎒', 'floor' => '14th Floor, Library', 'date' => 'May 3, 2026', 'time' => '2:30 PM', 'status' => 'not-found', 'lost_by' => 'Marco R. Santos', 'course' => 'BSITBA – 2nd Year', 'description' => 'Adidas bag, has a small keychain of a yellow duck attached to the zipper, initials "R.T." written inside with marker. Black straps, minor scuff on the front pocket.', 'additional_context' => 'I was at the study tables near the window during a group session', 'image' => ''],
    102 => ['id' => 102, 'name' => 'Casio Calculator (FX-991)', 'category' => 'Academic', 'category_class' => 'badge-academic', 'icon' => '🧮', 'floor' => '6th Floor, Room 605', 'date' => 'May 2, 2026', 'time' => '10:00 PM', 'status' => 'not-found', 'lost_by' => 'Dana P. Reyes', 'course' => 'BSCS – 3rd Year', 'description' => 'Has protective case, sticker of a mushroom on the back.', 'additional_context' => '', 'image' => ''],
    103 => ['id' => 103, 'name' => 'Blue Water Bottle', 'category' => 'Personal Essentials', 'category_class' => 'badge-essentials', 'icon' => '🍶', 'floor' => '5th Floor, Study Area', 'date' => 'May 4, 2026', 'time' => '6:30 AM', 'status' => 'not-found', 'lost_by' => 'Kristin V. Dy', 'course' => 'BST – 2nd Year', 'description' => 'Hydro Flask, blue, dented on bottom-left, has a FEU Tech sticker.', 'additional_context' => '', 'image' => ''],
    104 => ['id' => 104, 'name' => 'AirPods (2nd Gen)', 'category' => 'Electronics', 'category_class' => 'badge-electronics', 'icon' => '🎧', 'floor' => '2nd Floor, Student Plaza', 'date' => 'May 1, 2026', 'time' => '12:30 PM', 'status' => 'not-found', 'lost_by' => 'Roel M. Tan', 'course' => 'BSECE – 4th Year', 'description' => 'White case with a small crack on the hinge, black dot drawn on the lid.', 'additional_context' => '', 'image' => ''],
    105 => ['id' => 105, 'name' => 'Umbrella', 'category' => 'Personal Essentials', 'category_class' => 'badge-essentials', 'icon' => '☂️', 'floor' => '8th Floor, Corridor', 'date' => 'Apr 30, 2026', 'time' => '4:00 PM', 'status' => 'not-found', 'lost_by' => 'J. Reyes', 'course' => 'BSCS – 1st Year', 'description' => 'Navy blue collapsible umbrella, has a small tag with name "J. Reyes" written.', 'additional_context' => '', 'image' => ''],
    106 => ['id' => 106, 'name' => 'Student ID', 'category' => 'Others', 'category_class' => 'badge-others', 'icon' => '🪪', 'floor' => 'Ground Floor, Entrance', 'date' => 'Apr 28, 2026', 'time' => '8:00 AM', 'status' => 'not-found', 'lost_by' => 'John Doe', 'course' => 'BSCE – 2nd Year', 'description' => 'FEU Tech ID, photo visible, name partially visible. Laminated card.', 'additional_context' => '', 'image' => ''],
  ];
}

function LAF_GET_CLAIMED_ITEMS() {
  return [
    4 => ['id'=>4,'name'=>'Blue Backpack','category'=>'Bags','category_class'=>'badge-bags','floor'=>'14th Floor, Library','claimed_by'=>'Jenny B. Calot','date_claimed'=>'May 5, 2026', 'icon' => '🎒'],
    5 => ['id'=>5,'name'=>'Keys','category'=>'Personal Essentials','category_class'=>'badge-essentials','floor'=>'1st Floor, Parking','claimed_by'=>'Kristin V. Dy','date_claimed'=>'May 4, 2026', 'icon' => '🔑'],
    6 => ['id'=>6,'name'=>'Eyeglasses','category'=>'Accessories','category_class'=>'badge-accessories','floor'=>'3rd Floor, Library','claimed_by'=>'Roel M. Tan','date_claimed'=>'May 3, 2026', 'icon' => '🕶️'],
    7 => ['id'=>7,'name'=>'Smartphone','category'=>'Electronics','category_class'=>'badge-electronics','floor'=>'5th Floor, Study Area','claimed_by'=>'Dana P. Reyes','date_claimed'=>'May 2, 2026', 'icon' => '📱'],
  ];
}

function DIRECT_ACCESS_BLOCKED() {
  // Prevent direct script execution if needed, mocked for frontend compatibility.
}
