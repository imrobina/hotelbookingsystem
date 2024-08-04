<!-- Footer -->
<div class="container-fluid bg-white mt-5">
    <div class="row">
        <div class="col-lg-4 p-4">
            <h3 class="h-font fw-4 fs-3 mb-2">RS Hotel</h3>
            <p>
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. 
                Magni expedita, consequatur quasi molestiae cupiditate vitae optio obcaecati,
                modi maxime, fugiat autem aperiam a nulla unde dolores? Ducimus reprehenderit provident ab.
            </p>
        </div>
        <div class="col-lg-4 p-4">
            <h5 class="mb-3">Links</h5>
            <a href="index.php" class="mb-2 text-decoration-none text-dark">Home</a><br>
            <a href="rooms.php" class="mb-2 text-decoration-none text-dark">Rooms</a><br>
            <a href="facilities.php" class="mb-2 text-decoration-none text-dark">Facilities</a><br>
            <a href="contact.php" class="mb-2 text-decoration-none text-dark">Contact us</a><br>
            <a href="about.php" class="mb-2 text-decoration-none text-dark">About</a>
        </div>
        <div class="col-lg-4 p-4">
            <h5 class="mb-3">Follow us</h5>
            <?php
            if($contact_r['tw']!=''){
                echo <<<data
                <a href="$contact_r[tw]" class="d-inline-block mb-2 text-dark text-decoration-none"> 
                    <i class="bi bi-twitter me-1"></i>Twitter
                </a><br>
data;
            }
            ?>
            <a href="<?php echo $contact_r['fb'] ?>" class="d-inline-block mb-2 text-dark text-decoration-none"> 
                <i class="bi bi-facebook me-1"></i>Facebook
            </a><br>
            <a href="<?php echo $contact_r['insta'] ?>" class="d-inline-block text-dark text-decoration-none"> 
                <i class="bi bi-instagram me-1"></i>Instagram
            </a>
        </div>
    </div>
</div>

<h6 class="text-center bg-dark text-white p-3 mg-0">Designed and developed by RS</h6>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script>
    function setActive() {
        let navbar = document.getElementById('nav-bar');
        let a_tags = navbar.getElementsByTagName('a');

        for (let i = 0; i < a_tags.length; i++) {
            let file = a_tags[i].href.split('/').pop();
            let file_name = file.split('.')[0];

            if (document.location.href.indexOf(file_name) >= 0) {
                a_tags[i].classList.add('active');
            }
        }
    }
    setActive();
</script>
