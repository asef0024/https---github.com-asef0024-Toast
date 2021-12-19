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

</div>

<article class="menuen">

<div id="menu-intro">
<h1>TA' EN TOAST</h1>
<P> Alle Toasts er ristet til perfektion i brunet smør og serveres gloende varme.</P>
</div>
<!-- <img src="ost.jpg" alt=""> -->
<template>
  <article id="liste">
      <img src="" alt="" />
      <div class="placer-elementer">
        <h2 class="liste-titel"></h2>
        <p class="ingredienser"></p>
        <p class="pris"></p>
      <button class="læs-mere-knap">Læs mere</button>
      </div>
  </article>
</template>   

<section class="elementcontainer"></section>

</article>

 <script>

        let elementer;
      let categories;
      let filterElement = "alle";

     
      const url = "http://asefehzivlaei.com/kea/2-semester/tema10/wordpress/wp-json/wp/v2/toast?per_page=100";
      const catUrl = "http://asefehzivlaei.com/kea/2-semester/tema10/wordpress/wp-json/wp/v2/categories?per_page=100";

      async function getJson() {
        const data = await fetch(url);
        const catdata = await fetch(catUrl);
      
        elementer = await data.json();
        categories = await catdata.json();
        visElementer();
      }


      function visElementer() {
        let temp = document.querySelector("template");
        let container = document.querySelector(".elementcontainer");
        container.innerHTML = "";
        elementer.forEach(element => {
        if ( filterElement == "alle" || element.categories.includes(parseInt(filterElement))){
          let klon = temp.cloneNode(true).content;
          klon.querySelector("img").src = element.billede.guid;
          klon.querySelector("h2").innerHTML = element.title.rendered;
          klon.querySelector(".ingredienser").innerHTML = element.ingredienser;
          klon.querySelector(".pris").textContent = element.pris + "kr";
          klon.querySelector(".læs-mere-knap").addEventListener("click", () => { location.href = element.link; })
          container.appendChild(klon);
           }
          })
        }

getJson();


</script>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar();
get_footer();
