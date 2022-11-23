<footer>
        <div class="footer_socials">
            <a href="https://youtube.com"><i class="fa-brands fa-whatsapp"></i></a>
            <a href="https://youtube.com"><i class="fa-brands fa-linkedin"></i></a>
            <a href="https://youtube.com"><i class="fa-brands fa-twitter"></i></a>
            <a href="https://youtube.com"><i class="fa-brands fa-instagram"></i></a>
            <a href="https://youtube.com"><i class="fa-brands fa-facebook"></i></a>
        </div>
        <div class="container footer_container">
            <article>
                <h4>Categories</h4>
                <ul>
                <?php
                $sql = "SELECT * FROM categories  LIMIT 6";
                $result = mysqli_query($connection, $sql);
                
                while($row = mysqli_fetch_assoc($result)){
                   echo'<li><a href="">'. $row['title'] .'</a></li>';
                }
            ?>
                </ul>
            </article>
            <article>
                <h4>Support</h4>
                <ul>
                    <li><a href="">Online Support</a></li>
                    <li><a href="">Toll Free Number</a></li>
                    <li><a href="">Email</a></li>
                    <li><a href="">Social Support</a></li>
                    <li><a href="">Location</a></li>
                </ul>
            </article>
            <article>
                <h4>Blog</h4>
                <ul>
                    <li><a href="">Safety</a></li>
                    <li><a href="">Repair</a></li>
                    <li><a href="">Popular</a></li>
                    <li><a href="">Recent</a></li>
                    <li><a href="">Categories</a></li>
                </ul>
            </article>
            <article>
                <h4>Permalinks</h4>
                <ul>
                    <li><a href="">Home</a></li>
                    <li><a href="">Blog</a></li>
                    <li><a href="">About</a></li>
                    <li><a href="">Services</a></li>
                    <li><a href="">Contact</a></li>
                </ul>
            </article>
        </div>
        <div class="footer_copyright">
            <small>@ Copyright &copy; 2022 Trilok yadav</small>
        </div>
    </footer>



    <script src="<?= ROOT_URL ?>js/js.js"></script>


</body>

</html> 