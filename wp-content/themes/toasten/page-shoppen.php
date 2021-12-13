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

    

<!-- 
<main class="site-main"> -->



</div>

<div id="shoppen">
<h1>SHOPPEN</h1>
</div>
<nav class="shoppen_nav">
<button data-kategori="alle" class="valgt">Alle items</button>
        <button data-kategori="merchandise">Merchandise</button>
        <button data-kategori="swag">Swag</button>
        <button data-kategori="toast-kit">Toast kit</button>
</nav>

<section class="elementcontainer"></section>
</main>

</div>
            <script>

        let elementer;
      let categories;
      let temaer;
      let filterElement = "alle";

      document.addEventListener("DOMContentLoaded", start);
      function start() {
      const filterKnapper = document.querySelectorAll(".shoppen_nav");
        filterKnapper.forEach((knap) =>
          knap.addEventListener("click", filtrerVarer)
        );
      }

        function filtrerVarer() {
        filterElementer = this.dataset.kategori;
        document.querySelector(".valgt").classList.remove("valgt");
        this.classList.add("valgt");

        visElementer();
      }
     
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

      // function opretknapper () {

      //   categories.forEach(cat => {
      //     document.querySelector(".shoppen_nav").innerHTML += `<button class="filter" data-element="${cat.id}">${cat.name}</button>`
      //   })

      //   addEventListenersToButtons () 
      // }

 

      // function  addEventListenersToButtons () {
      //   document.querySelectorAll("button").forEach(elm => {
      //     elm.addEventListener("click", filtrering);
      //   })

       
      // };
      // function filtrering() {
      //   filterElement = this.dataset.element;
      //   console.log(filterElement);

      //   visElementer();

      // }

    


      function visElementer() {
        let temp = document.querySelector("template");
        let container = document.querySelector(".elementcontainer");
        container.innerHTML = "";
        elementer.forEach(element => {
        if ( filterElement == "alle" || element.categories.includes(parseInt(filterElement))){
          let klon = temp.cloneNode(true).content;
          klon.querySelector("h2").innerHTML = element.title.rendered;
          klon.querySelector("img").src = element.billede.guid;
          klon.querySelector(".pris").textContent = element.pris;
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
