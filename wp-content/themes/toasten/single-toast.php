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

    
   
  
        <img class="billede" src="" alt="her er et billede af en toast" />
     
    <section class="toast-text">
        <h2 class="h2"></h2>
        <p class="beskrivelse"></p>
        <p class="ingredienser"></p>
        <p class="pris"></p>
        <button class="book-knap">Køb toast-kit</button>
    </section>

  
  
</article>

<div class="tilbageknap"><a href="http://asefehzivlaei.com/kea/2-semester/tema10/wordpress/menu/" class="tilbage">Tilbage →</a></div>
    <script>

let element;

const url = "http://asefehzivlaei.com/kea/2-semester/tema10/wordpress/wp-json/wp/v2/toast/"+<?php echo get_the_ID() ?>;

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
//   document.querySelector(".overskrift1").innerHTML = element.overskrift1;
//   document.querySelector(".infobox1").src = element.infobox1.guid;
//   document.querySelector(".infobox2").src = element.infobox2.guid;
document.querySelector(".beskrivelse").innerHTML = element.beskrivelse;
document.querySelector(".ingredienser").innerHTML = element.ingredienser;
//   document.querySelector(".billede3").src = element.billede3.guid;
document.querySelector(".pris").innerHTML = element.pris + "kr";
//   document.querySelector(".video").src = element.video.guid;
}

getJson();

</script>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
