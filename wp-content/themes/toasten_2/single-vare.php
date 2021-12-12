<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ScapeShot
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
		
	<article id="vare">


<div class="splash">
  <img class="billede" src="" alt="" />
  <h2 class="titel"></h2>
  </div>

  
  <div class="button-grid">
  <button class="book-knap">Book nu</button>
  </div>
  <h2 class="overskrift1"></h2>
  <div class="single-infobox-grid">
  <img class="infobox1" src="" alt="" />
  <img class="infobox2" src="" alt="" />
  </div>

  <p class="beskrivelse1"></p>

  <p class="overskrift1"></p>
  <div class="billede-grid">
  <img class="billede2" src="" alt="" />
  <img class="billede3" src="" alt="" />
  </div>

  <div class="video-grid">
  <p class="beskrivelse2"></p>
  <img class="video" src="" alt=""/>
  </div>

  
  
</article>


<div class="tilbageknap"><a href="https://skuret.eu/kea/ungdomsbyen/kurser/" class="tilbage">← Tilbage</a></div>

</main>


<script>

let element;

const url = "https://skuret.eu/kea/ungdomsbyen/wp-json/wp/v2/kursus/"+<?php echo get_the_ID() ?>;

async function getJson() {
const data = await fetch(url);
element = await data.json();
console.log(element);
visElementer();
}

function visElementer() {
console.log(element.billede.guid);
document.querySelector(".titel").innerHTML = element.title.rendered;
document.querySelector(".billede").src = element.billede.guid;
document.querySelector(".overskrift1").innerHTML = element.overskrift1;
document.querySelector(".infobox1").src = element.infobox1.guid;
document.querySelector(".infobox2").src = element.infobox2.guid;
document.querySelector(".beskrivelse1").innerHTML = element.beskrivelse1;
document.querySelector(".overskrift1").innerHTML = element.overskrift1;
document.querySelector(".billede2").src = element.billede2.guid;
document.querySelector(".billede3").src = element.billede3.guid;
document.querySelector(".beskrivelse2").innerHTML = element.beskrivelse2;
document.querySelector(".video").src = element.video.guid;
}

getJson();

</script>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar();
get_footer();
