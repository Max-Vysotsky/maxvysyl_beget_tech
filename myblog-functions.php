<?php

function textToHtmlTechology($text){
  echo '<ul class="project__technolodgi-list">';
  echo "\n";
  $technologyArray = explode (',' , $text);
  foreach ($technologyArray as $key => $value) {
    end($technologyArray);
    if(key($technologyArray) != $key)
    {
      echo "<li class=\"project__technolodgi\"><a href=\"/category?is=$value\">$value</a></li>,\n";
    }
    else
    {
      echo "<li class=\"project__technolodgi\"><a href=\"/category?is=$value\">$value</a></li>\n";
    }
  }
  echo ' </ul>';
}

function jsonInputDataToHtml1($json)
{
  $href = htmlspecialchars($_GET['href']);
  $inputarray = json_decode($json);
  echo '<ul class="project__input-data ">';
  $i = 1;
  foreach ($inputarray as $key => $value) {
    echo "\n";
    echo ' <li class="project__input-data-item"><a href="#attachment-'.$i.'" class="project__attachment-item red">'.$key.'</a></li>';
  $i++;
  }

  echo "\n";
  echo '</ul>';
}

function jsonInputDataToHtml2($json)
{
  $href = htmlspecialchars($_GET['href']);
  $inputarray = json_decode($json);
  echo '<ul class="project__attachment-list">';
  $i = 1;
  foreach ($inputarray as $key => $value) {
    echo "\n";
    echo ' <li id="attachment-'.$i.'" class="project__attachment-item"><a href="/files/'.$href.'/'.$value.'" class="project__attachment-link">'.$value.'</a></li>';
  $i++;
  }

  echo "\n";
  echo '</ul>';
}

function showProjectSlider($count,$projectName)
{
 $count = (int) $count;
 if( !($count == 0) )
 {
  echo ' <li class="project__slider slider">';
  echo "\n";
 for ($i=1; $i <= $count; $i++) { 
   echo '<div class="slider__item">';
   echo '<img src="/static/img/project-slider/'.$projectName.'/0'.$i.'.jpg" alt="sliderNumber'.$i.'">';
   echo '</div>';
   echo "\n";
 }
  echo '</li>';
   echo '<script src="/static/js/jquery.min.js"></script>';
   echo '<script src="/static/js/slick.min.js"></script>';
   echo '<script src="/static/js/slider.js"></script>';
  echo "\n";
 }
}
