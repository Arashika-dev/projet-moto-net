<?php 
require_once __DIR__ ."/layout/header.php";
?>

<main>
    <section class="container-fluid mt-4"> 
        <h1 class="text-center">Le journal moto du net</h1>

        
    </section>


    <section class="container mt-5">
        <h2>Nos dernières actualités</h2>
        <div class="row  p-2 my-5">
            <div class="col-lg-4">
                <div class="border">
                    <img class='img-fluid' src='http://unsplash.it/500/400?random&gravity=center' alt=''/>
                </div>
            </div>
            <div class="col-lg-8 d-flex align-items-center">
                <div class="h-75 d-flex flex-column justify-content-between">
                    <h3 class="text-center">Titre Article</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt suscipit facere voluptate, consequatur nam impedit quaerat autem nisi rem, reprehenderit necessitatibus cum unde blanditiis sed maiores vel porro quisquam libero? Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus voluptas id ipsam, architecto laboriosam perspiciatis esse dolore magnam consectetur ratione ab cumque quas fuga expedita corrupti at exercitationem, error repellat?
                    </p>
                    <a href="#" class="btn btn-primary w-25 align-self-end">En savoir plus</a>
                </div>
            </div>
        </div>
        <div class="row p-2 my-5">
            <div class="col-lg-8 d-flex align-items-center">
                <div class="h-75 d-flex flex-column justify-content-between">
                    <h3 class="text-center">Titre Article</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt suscipit facere voluptate, consequatur nam impedit quaerat autem nisi rem, reprehenderit necessitatibus cum unde blanditiis sed maiores vel porro quisquam libero? Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus voluptas id ipsam, architecto laboriosam perspiciatis esse dolore magnam consectetur ratione ab cumque quas fuga expedita corrupti at exercitationem, error repellat?
                    </p>
                    <a href="#" class="btn btn-primary w-25 align-self-start">En savoir plus</a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="border">
                    <img class='img-fluid' src='http://unsplash.it/500/400?random&gravity=center' alt=''/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2 offset-lg-10">
                <div class="text-end">
                    <a href="article.php">Plus d'articles</a>
                </div>
            </div>
        </div>
    </section>

    <section class="container">
        <div class="row">
            <div class="col-lg-8">
                <div>

                </div>
            </div>
        </div>
    </section>
</main>

<?php
require_once __DIR__ ."/layout/footer.php";