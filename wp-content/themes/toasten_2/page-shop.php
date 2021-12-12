<?php
/**
 * The main template file.
 * @author  	 DeoThemes
 * @copyright  (c) Copyright by DeoThemes
 * @link       https://deothemes.com
 * @package 	 Nokke
 * @since 		 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

get_header();
?>

<div class="blog-section pb-56">

	<?php if ( ! is_home() && ! is_front_page() ) : ?>
		<?php get_template_part( 'template-parts/page-title/page-title' ); ?>
	<?php endif; ?>

	<?php nokke_primary_content_markup_top(); ?>

		<?php nokke_primary_content_top(); ?>

		<!-- blog content -->
		<div id="primary" class="content blog__content col-lg mb-32">

<template>
  <article id="liste">
    <img src="" alt="" />
    <h2 class="liste-titel"></h2>
    <p class="kortbeskrivelse"></p>
    <div class="placer-elementer">
    <p class="klassetrin"></p>
    <p class="fag"></p>
    </div>
    <button class="læs-mere-knap">Læs mere</button>
  </article>
</template>   


<main class="site-main">

<div class="kursus-billede">

</div>

<div id="kursus-text">
<h1>Shop</h1>
<p></p>
</div>

<div id="dropdown" class="dropdown">
  <button class="dropbtn" class="valgt">Målgruppe ▼</button>
  <div class="dropdown-content">
  <nav id="filtrering">
  </nav>
  </div>
</div>

<div id="dropdown" class="dropdown">
  <button class="dropbtn" class="filter2">Temaer ▼</button>
  <div class="dropdown-content">
  <nav id="filtrering2">
  </nav>
  </div>
</div>

<section class="elementcontainer"></section>

</main>

</div>
<script>

 

  //    let elementer = [];
  //       let categories = [];
  //       let temaer = [];
  //       const liste = document.querySelector(".elementcontainer");
  //       const skabelon = document.querySelector("template");
  //       let filterRet = "alle";
  //       let filterIndhold = "alle";
  //       document.addEventListener("DOMContentLoaded", start);
        
  //       function start() {
            

  //           console.log(url);
            
  //           getJson();
    
  //       }

       


  //             async function getJson() {
  //           //hent alle custom posttypes retter
  //           const url = "skuret.eu/kea/ungdomsbyen/wp-json/wp/v2/kurser?per_page=100";
  //           //hent basis categories
  //           const catUrl = "https://skuret.eu/kea/ungdomsbyen/wp-json/wp/v2/categories?per_page=100";
  //            //hent custom category: indhold
  //           const contUrl = "https://skuret.eu/kea/ungdomsbyen/wp-json/wp/v2/tema?per_page=100";
  //           let response = await fetch(url);
  //           let catResponse = await fetch(catUrl);
  //           let contResponse = await fetch(contUrl);
  //           retter = await response.json();
  //           categories = await catResponse.json();
  //           indhold = await contResponse.json();
  //           visRetter();
  //           opretKnapper();
  //       }

  //      <

  //             function opretKnapper(){
            
  //           categories.forEach(cat=>{
  //              //console.log(cat.id);
  //               if(cat.name != "Uncategorized"){
  //               document.querySelector("#filtrering").innerHTML += `<button class="filter" data-ret="${cat.id}">${cat.name}</button>`
  //               }
  //           })
  //             indhold.forEach(cont=>{
  //              //console.log(cont.id);
  //               document.querySelector("#indhold-filtrering").innerHTML += `<button class="filter" data-cont="${cont.id}">${cont.name}</button>`
             
  //           })
  //           addEventListenersToButtons();
  //       }

  //            function visRetter() {
  //           console.log(retter);
  //           liste.innerHTML = "";
  //           console.log({filterRet});
  //           console.log({filterIndhold});
  //           retter.forEach(ret => {
  //               //tjek filterRet og filterIndhold til filtrering
  //               if ((filterRet == "alle"  || ret.categories.includes(parseInt(filterRet))) && (filterIndhold == "alle"  || ret.indhold.includes(parseInt(filterIndhold)))) {
  //                   const klon = skabelon.cloneNode(true).content;
  //                    klon.querySelector("h2").innerHTML = element.title.rendered;
  //         klon.querySelector("img").src = element.loop_billede.guid;
  //         klon.querySelector(".kortbeskrivelse").innerHTML = element.kortbeskrivelse;
  //         klon.querySelector(".klassetrin").innerHTML = "👨‍👦‍👦: " + element.klassetrin;
  //         klon.querySelector(".fag").innerHTML = "📖: " + element.fag;
  //                   klon.querySelector("article").addEventListener("click", () => {
  //                       location.href = ret.link;
  //                   })
  //                   liste.appendChild(klon);
  //               }
  //           })

  //       }

  //        function addEventListenersToButtons() {
  //           document.querySelectorAll("#filtrering button").forEach(elm => {
  //               elm.addEventListener("click", filtrering);
  //           })
  //            document.querySelectorAll("#indhold-filtrering button").forEach(elm => {
  //               elm.addEventListener("click", filtreringIndhold);
  //           })
  //       }
        
  //       function filtrering() {
  //           filterRet = this.dataset.ret;
  //           document.querySelector("h1").textContent = this.textContent;
  //           //fjern .valgt fra alle
  //           document.querySelectorAll("#filtrering .filter").forEach(elm => {
  //               elm.classList.remove("valgt");
  //           });
          
  //           //tilføj .valgt til den valgte
  //           this.classList.add("valgt");
  //           visRetter();
  //       }
  //        function filtreringIndhold() {
  //           filterIndhold = this.dataset.cont;
  //           document.querySelector("h1").textContent = this.textContent;
  //            //fjern .valgt fra alle
  //           document.querySelectorAll("#indhold-filtrering .filter").forEach(elm => {
  //               elm.classList.remove("valgt");
  //           });
  //           //tilføj .valgt til den valgte
  //           this.classList.add("valgt");
  //           visRetter();
  //       }



      let elementer;
      let categories;
      let temaer;
      let filterElement = "alle";
     
      const url = "https://skuret.eu/kea/ungdomsbyen/wp-json/wp/v2/kursus?per_page=100";
      const catUrl = "https://skuret.eu/kea/ungdomsbyen/wp-json/wp/v2/categories?per_page=100";
      const temUrl = "https://skuret.eu/kea/ungdomsbyen/wp-json/wp/v2/tema?per_page=100";


      async function getJson() {
        const data = await fetch(url);
        const catdata = await fetch(catUrl);
        const temdata = await fetch(temUrl);
        elementer = await data.json();
        categories = await catdata.json();
        temaer = await temdata.json();
        console.log(categories);
        console.log(temaer);
        visElementer();
        opretknapper();

      }

      function opretknapper () {

        categories.forEach(cat => {
          document.querySelector("#filtrering").innerHTML += `<button class="filter" data-element="${cat.id}">${cat.name}</button>`
        })

          temaer.forEach(tem => {
          document.querySelector("#filtrering2").innerHTML += `<button class="filter2" data-element="${tem.id}">${tem.name}</button>`
        })

        addEventListenersToButtons () 
      }

 

      function  addEventListenersToButtons () {
        document.querySelectorAll("#filtrering button, #filtrering2 button").forEach(elm => {
          elm.addEventListener("click", filtrering);
        })

        // document.querySelectorAll("#filtrering2 button").forEach(elm => {
        //  elm.addEventListener("click", filtrering2);
        // })
      };

  

      
      function filtrering() {
        filterElement = this.dataset.element;
        console.log(filterElement);

        visElementer();

      }

      // function filtrering2() {
      // filterElement2 = this.dataset.element;
      // console.log(filterElement2);

      // visElementer2();
      // }


      function visElementer() {
        let temp = document.querySelector("template");
        let container = document.querySelector(".elementcontainer");
        container.innerHTML = "";
        elementer.forEach(element => {
        if ( filterElement == "alle" || element.categories.includes(parseInt(filterElement))){
          let klon = temp.cloneNode(true).content;
          klon.querySelector("h2").innerHTML = element.title.rendered;
          klon.querySelector("img").src = element.loop_billede.guid;
          klon.querySelector(".kortbeskrivelse").innerHTML = element.kortbeskrivelse;
          klon.querySelector(".klassetrin").innerHTML = "👨‍👦‍👦: " + element.klassetrin;
          klon.querySelector(".fag").innerHTML = "📖: " + element.fag;
          klon.querySelector(".læs-mere-knap").addEventListener("click", () => { location.href = element.link; })
          container.appendChild(klon);
           }
          })
        }


  //  function visElementer2() {
  //       let temp = document.querySelector("template");
  //       let container = document.querySelector(".elementcontainer");
  //       container.innerHTML = "";
  //       elementer.forEach(element => {
  //       if ( filterElement == "alle" || element.tema.includes(parseInt(filterElement))){
  //         let klon = temp.cloneNode(true).content;
  //         klon.querySelector("h2").innerHTML = element.title.rendered;
  //         klon.querySelector("img").src = element.loop_billede.guid;
  //         klon.querySelector(".kortbeskrivelse").innerHTML = element.kortbeskrivelse;
  //         klon.querySelector(".klassetrin").innerHTML = "👨‍👦‍👦: " + element.klassetrin;
  //         klon.querySelector(".fag").innerHTML = "📖: " + element.fag;
  //         klon.querySelector(".læs-mere-knap").addEventListener("click", () => { location.href = element.link; })
  //         container.appendChild(klon);
  //          }
  //         })
  //       }

getJson();


</script>


		</div> <!-- .blog__content -->

		<?php
			if ( nokke_is_active_sidebar( 'blog', 'blog', 'right-sidebar' ) ) {
				nokke_sidebar( 'nokke-blog-sidebar' );
			}
		?>

		<?php nokke_primary_content_bottom(); ?>

	<?php nokke_primary_content_markup_bottom(); ?>

</div> <!-- .blog-section -->

<?php get_footer(); ?>
<?php the_content(); ?>
