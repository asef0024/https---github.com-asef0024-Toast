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
<template>
  <article id="liste">
    <img src="" alt="" />
    <h2 class="liste-titel"></h2>
    <div class="placer-elementer">
    <p class="pris"></p>
    </div>
    <button class="læs-mere-knap">Læs mere</button>
  </article>
</template>   

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

    


<main class="site-main">



</div>

<div id="shoppen">
<h1>WADERS TIL NÅR DU STÅR I OST TIL KNÆENE</h1>

<nav class="shoppen_nav"></nav>

<section class="elementcontainer"></section>
</main>

</div>
            <script>

      //Lav variabler 
      let elementer;
      let categories;
      let temaer;
      let filterElement = "alle";

      const url = "http://asefehzivlaei.com/kea/2-semester/tema10/wordpress/wp-json/wp/v2/vare?per_page=100";
      const catUrl = "http://asefehzivlaei.com/kea/2-semester/tema10/wordpress/wp-json/wp/v2/categories?per_page=100";


      async function getJson() {
        const data = await fetch(url);
        const catdata = await fetch(catUrl);
      
        elementer = await data.json();
        categories = await catdata.json();
        visElementer();
        opretknapper();

      }

      function opretknapper () {
        categories.forEach(cat => {
          document.querySelector(".shoppen_nav").innerHTML += `<button class="filter" data-element="${cat.id}">${cat.name}</button>`
        })

        addEventListenersToButtons () 
      }

 

      function  addEventListenersToButtons () {
        document.querySelectorAll("button").forEach(elm => {
          elm.addEventListener("click", filtrering);
        })
      };

      function filtrering() {
        filterElement = this.dataset.element;
        console.log(filterElement);
        visElementer();
      }

    


      function visElementer() {
        let temp = document.querySelector("template");
        let container = document.querySelector(".elementcontainer");
        container.innerHTML = "";
        elementer.forEach(element => {
        if ( filterElement == "alle" || element.categories.includes(parseInt(filterElement))){
          let klon = temp.cloneNode(true).content;
          klon.querySelector("h2").innerHTML = element.title.rendered;
          klon.querySelector("img").src = element.billede.guid;
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
