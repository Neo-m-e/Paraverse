<?php

// Makes the project work both at /lost-and-found and inside /LAF/lost-and-found.
$scriptName = $_SERVER['SCRIPT_NAME'] ?? '';
$adminMarker = '/feu-tech-discipline-unit/lost-and-found';
$publicMarker = '/lost-and-found';
$folderPosition = strpos($scriptName, $adminMarker);

if ($folderPosition === false) {
  $folderPosition = strpos($scriptName, $publicMarker);
}

$projectPrefix = $folderPosition === false ? '' : substr($scriptName, 0, $folderPosition);
$LAF_BASE_URL = $projectPrefix . '/lost-and-found';
$LAF_ADMIN_URL = $projectPrefix . '/feu-tech-discipline-unit/lost-and-found';

$surrenderedItems = [
  ['id' => 1, 'name' => 'Goojodoq (Handfan)', 'category' => 'Accessories', 'floor' => '2nd Floor, Lobby', 'date' => 'May 3, 2026', 'time' => '10:00 AM', 'surrendered_by' => 'Jenny B. Calot', 'claimed_by' => '', 'received_by' => 'Yvette G. Supnet', 'status' => 'Unclaimed', 'image' => $LAF_BASE_URL . '/assets/images/fan.webp'],
  ['id' => 2, 'name' => 'Umbrella', 'category' => 'Personal Essentials', 'floor' => '4th Floor, Study Area', 'date' => 'May 2, 2026', 'time' => '2:00 PM', 'surrendered_by' => 'Marco R. Santos', 'claimed_by' => '', 'received_by' => 'Yvette G. Supnet', 'status' => 'Unclaimed', 'image' => $LAF_BASE_URL . '/assets/images/umbrella.jpg'],
  ['id' => 3, 'name' => 'Calculator', 'category' => 'Academic', 'floor' => '6th Floor, Room 605', 'date' => 'May 4, 2026', 'time' => '8:30 AM', 'surrendered_by' => 'Kristin V. Dy', 'claimed_by' => '', 'received_by' => 'Yvette G. Supnet', 'status' => 'Unclaimed', 'image' => $LAF_BASE_URL . '/assets/images/calculator.jpg'],
  ['id' => 8, 'name' => 'Water Bottle', 'category' => 'Personal Essentials', 'floor' => '7th Floor, Canteen', 'date' => 'April 26, 2026', 'time' => '12:00 PM', 'surrendered_by' => 'Maria S. Lim', 'claimed_by' => '', 'received_by' => 'Yvette G. Supnet', 'status' => 'Unclaimed', 'image' => $LAF_BASE_URL . '/assets/images/bottle.jpg'],
  ['id' => 4, 'name' => 'Blue Backpack', 'category' => 'Bags', 'floor' => '14th Floor, Library', 'date' => 'May 1, 2026', 'time' => '12:30 PM', 'surrendered_by' => 'Marco R. Santos', 'claimed_by' => 'Jenny B. Calot', 'received_by' => 'Yvette G. Supnet', 'status' => 'Claimed', 'image' => $LAF_BASE_URL . '/assets/images/catalina.webp'],
  ['id' => 5, 'name' => 'Keys', 'category' => 'Personal Essentials', 'floor' => '1st Floor, Parking', 'date' => 'April 30, 2026', 'time' => '9:00 AM', 'surrendered_by' => 'Juan D. Cruz', 'claimed_by' => 'Kristin V. Dy', 'received_by' => 'Yvette G. Supnet', 'status' => 'Claimed', 'image' => $LAF_BASE_URL . '/assets/images/watch.webp'],
  ['id' => 6, 'name' => 'Eyeglasses', 'category' => 'Accessories', 'floor' => '3rd Floor, Library', 'date' => 'April 28, 2026', 'time' => '3:00 PM', 'surrendered_by' => 'Ana R. Reyes', 'claimed_by' => 'Roel M. Tan', 'received_by' => 'Yvette G. Supnet', 'status' => 'Claimed', 'image' => $LAF_BASE_URL . '/assets/images/fan.webp']
];

$lostItems = [
  ['id' => 101, 'name' => 'Black Backpack', 'category' => 'Bags', 'floor' => '14th Floor, Library', 'date' => 'May 3, 2026', 'time' => '2:30 PM', 'lost_by' => 'Marco R. Santos', 'course' => 'BSITBA – 2nd Year', 'description' => 'Adidas bag, has a small keychain of a yellow duck attached to the zipper, initials “R.T.” written inside with marker. Black straps, minor scuff on the front pocket.', 'context' => 'I was at the study tables near the window during a group session', 'image' => $LAF_BASE_URL . '/assets/images/bottle.jpg'],
  ['id' => 102, 'name' => 'Casio Calculator (FX-991)', 'category' => 'Academic', 'floor' => '6th Floor, Room 605', 'date' => 'May 2, 2026', 'time' => '10:00 PM', 'lost_by' => 'Dana P. Reyes', 'course' => 'BSCS – 3rd Year', 'description' => 'Has a protective case and a mushroom sticker on the back.', 'context' => '', 'image' => $LAF_BASE_URL . '/assets/images/calculator.jpg'],
  ['id' => 103, 'name' => 'Blue Water Bottle', 'category' => 'Personal Essentials', 'floor' => '5th Floor, Study Area', 'date' => 'May 4, 2026', 'time' => '6:30 AM', 'lost_by' => 'Kristin V. Dy', 'course' => 'BST – 2nd Year', 'description' => 'Blue bottle with an FEU Tech sticker and a dent at the bottom.', 'context' => '', 'image' => $LAF_BASE_URL . '/assets/images/bottle.jpg'],
  ['id' => 104, 'name' => 'AirPods (2nd Gen)', 'category' => 'Electronics', 'floor' => '2nd Floor, Student Plaza', 'date' => 'May 1, 2026', 'time' => '12:30 PM', 'lost_by' => 'Roel M. Tan', 'course' => 'BSECE – 4th Year', 'description' => 'White case with a small crack on the hinge and a black dot drawn on the lid.', 'context' => '', 'image' => $LAF_BASE_URL . '/assets/images/watch.webp']
];

function LAF_FIND_ITEM_BY_ID($items, $id)
{
  foreach ($items as $item) {
    if ((int) $item['id'] === (int) $id) {
      return $item;
    }
  }

  return $items[0];
}
