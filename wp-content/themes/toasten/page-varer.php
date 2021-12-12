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
            <script>

        let elementer;
      let categories;
      let temaer;
      let filterElement = "alle";
     
      const url = "http://asefehzivlaei.com/kea/2-semester/tema10/wordpress/wp-json/wp/v2/vare?per_page=100";
      const catUrl = "http://asefehzivlaei.com/kea/2-semester/tema10/wordpress/wp-json/wp/v2/categories?per_page=100";
      const temUrl = "http://asefehzivlaei.com/kea/2-semester/tema10/wordpress/wp-json/wp/v2/tema?per_page=100";


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

        addEventListenersToButtons () 
      }

 

      function  addEventListenersToButtons () {
        document.querySelectorAll("#filtrering button, button").forEach(elm => {
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
          klon.querySelector("img").src = element.loop_billede.guid;
          klon.querySelector(".kortbeskrivelse").innerHTML = element.kortbeskrivelse;
          klon.querySelector(".klassetrin").innerHTML = "👨‍👦‍👦: " + element.klassetrin;
          klon.querySelector(".fag").innerHTML = "📖: " + element.fag;
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
