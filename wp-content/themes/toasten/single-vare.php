<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ScapeShot
 */

get_header(); ?>

<div id="primary" class="content-area">
		<main id="main" class="site-main">


<article class="vare">

  <div class="splash">
    <img class="billede" src="" alt="" />
  </div>

  <section class="vare-text">
    <h1 class="h2"></h1>
    <p class="beskrivelse"></p>
    <p class="pris"></p>
    <button class="book-knap">Køb</button>
</section>
  
</article>

<div class="tilbageknap"><a href="http://asefehzivlaei.com/kea/2-semester/tema10/wordpress/shoppen/" class="tilbage">← Tilbage</a></div>


<script>

let element;

const url = "http://asefehzivlaei.com/kea/2-semester/tema10/wordpress/wp-json/wp/v2/vare/"+<?php echo get_the_ID() ?>;

async function getJson() {
const data = await fetch(url);
element = await data.json();
console.log(element);
visElementer();
}

function visElementer() {
console.log(element.billede.guid);
document.querySelector(".h2").innerHTML = element.title.rendered;
document.querySelector(".billede").src = element.billede.guid;
document.querySelector(".beskrivelse").innerHTML = element.beskrivelse;
document.querySelector(".pris").innerHTML = element.pris + "kr";
}

getJson();

</script>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
